<?php  namespace App\PaymentProcessor\Gateways;
use App\PaymentProcessor\Interfaces\GatewayInterface;
use App\PaymentProcessor\Interfaces\PaymentableInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use SoapClient;

/**
 * MellatBankGateway
 */
class AsanPardakhtGateway implements GatewayInterface
{

    /**
     * @var mixed configs
     */
    protected $configs;


    protected $serverUrl = 'https://services.asanpardakht.net/paygate/merchantservices.asmx?wsdl';

    protected $merchantId = '768327';

    protected $merchantConfigId = '608';

    protected $key = 'u/S3A0LyRCrKsCTKoAWgwB0/SSKlgqqG7IFdk3z7MvM=';

    protected $iv = 'UF7YFMSB36wj8Vd0ZJv3Ic0IC+idtwlz9utybJYlWoA=';

    protected $username = 'MABNA768327';

    protected $password = 'Q5r4UYi8poW2Ey';

    protected $callbackUrl = 'http://localhost:8180';


    /**
     * @var client
     */
    private $client = null;
    
    /**
	 * Reference id
	 *
	 * @var string
	 */
	protected $refId;

    /**
     * @var mixed resnumber
     */
    protected $resnumber;

    	/**
	 * Tracking code payment
	 *
	 * @var string
	 */
	protected $trackingCode;

        
    /**
     * @var PaymentableInterface paymentable
     */
    protected PaymentableInterface $paymentable;

    
    /**
     * @var Request request
     */
    protected Request $request;


    

    public function __construct()
    {
        $this->getSoapClient();
    }
    
     /**
     * Get the value of paymentable
     */ 
    public function getPaymentable()
    {
        return $this->paymentable;
    }

    /**
     * Set the value of paymentable
     *
     * @return  self
     */ 
    public function setPaymentable($paymentable)
    {
        $this->paymentable = $paymentable;

        return $this;
    }

    /**
     * Get the value of request
     */ 
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Set the value of request
     *
     * @return  self
     */ 
    public function setRequest($request)
    {
        $this->request = $request;

        return $this;
    }

   
    /**
     * Get the value of resnumber
     */ 
    public function getResnumber()
    {
        return $this->resnumber;
    }

    /**
     * Set the value of resnumber
     *
     * @return  self
     */ 
    public function setResnumber($resnumber)
    {
        $this->resnumber = $resnumber;

        return $this;
    }
   
     /**
     * Get mellat soap client
     * @return \SoapClient
     * @throws \Exception
     */
    protected function getSoapClient()
    {
        try {
            return $this->client = new \SoapClient($this->serverUrl);
        } catch (\SoapFault $e) {
            return false;
        }
    }

    private function getResponse($result)
    {
        if ( !isset($result->return) ) {
            return false;
        }
        return explode(',', $result->return);
    }


    public function redirect() 
    {
        $url = $this->serverUrl;

        $inputs = [
            'RefId' => $this->getResnumber()
        ];

        return $url . http_build_query($inputs);
    }

    public function request()
    {
        $client = $this->getSoapClient();

        $username = $this->username;
        $password = $this->password;
        $orderId = $this->paymentable->id;
        $price = $this->paymentable->getAmountPay();
        $localDate = date("Ymd His");
        $additionalData = "";
        $callBackUrl = $this->callbackUrl;
        $req = "1,{$username},{$password},{$orderId},{$price},{$localDate},{$additionalData},{$callBackUrl},0";

        $encryptedRequest = $this->encrypt($req);
        $params = array(
            'merchantConfigurationID' => $this->merchantConfigId,
            'encryptedRequest' => $encryptedRequest
        );
        \Log::debug($params);
        try {
            $response = $client->RequestOperation($params);
            \Log::debug($response);
        } catch (\SoapFault $e) {
            return false;
        }
        \Log::debug($response);
        $response = $response->RequestOperationResult;
        $responseCode = explode(",", $response)[0];
        if ($responseCode != '0') {
            return false;
        }

        $refId = substr($response, 2);
        $this->setResnumber($refId);
        return true;
    }

     /**
     * Check user payment
     *
     * @return bool
     *
     * @throws AsanpardakhtException
     */
    protected function userPayment()
    {
        $ReturningParams = $this->request->ReturningParams;
        $ReturningParams = $this->decrypt($ReturningParams);

        $paramsArray = explode(",", $ReturningParams);
        $Amount = $paramsArray[0];
        $SaleOrderId = $paramsArray[1];
        $RefId = $paramsArray[2];
        $ResCode = $paramsArray[3];
        $ResMessage = $paramsArray[4];
        $PayGateTranID = $paramsArray[5];
        $RRN = $paramsArray[6];
        $LastFourDigitOfPAN = $paramsArray[7];


        $this->trackingCode = $PayGateTranID;
        $this->refId = $RefId;


        if ($ResCode == '0' || $ResCode == '00') {
            return true;
        }

        return false;
    }


    public function verify() 
    {
        $client = $this->getSoapClient();

        $this->userPayment();
        
        $username = $this->username;
        $password = $this->password;

        $encryptedCredintials = $this->encrypt("{$username},{$password}");
        $params = array(
            'merchantConfigurationID' => $this->merchantConfigId,
            'encryptedCredentials' => $encryptedCredintials,
            'payGateTranID' => $this->trackingCode
        );


        try {
            $response = $client->RequestVerification($params);
            $response = $response->RequestVerificationResult;

        } catch (\SoapFault $e) {
            return false;
        }

        if ($response != '500') {
            return false;
        }


        try {

            $response = $client->RequestReconciliation($params);
            $response = $response->RequestReconciliationResult;

            if ($response != '600')
                return false;

        } catch (\SoapFault $e) {
            //If fail, shaparak automatically do it in next 12 houres.
        }


        $this->setResnumber($this->trackingCode);

        return true;
    }  



    /**
     * Encrypt string by key and iv from config
     *
     * @param string $string
     * @return string
     */
    private function encrypt($string = "")
    {

        $key = $this->key;
        $iv = $this->iv;

        try {

            $soap = new SoapClient("https://ipgsoap.asanpardakht.ir/paygate/internalutils.asmx");
            $params = array(
                'aesKey' => $key,
                'aesVector' => $iv,
                'toBeEncrypted' => $string
            );

            \Log::debug($params);

            $response = $soap->EncryptInAES($params);
            return $response->EncryptInAESResult;

        } catch (\SoapFault $e) {
            return "";
        }
    }


    /**
     * Decrypt string by key and iv from config
     *
     * @param string $string
     * @return string
     */
    private function decrypt($string = "")
    {
        $key = $this->key;
        $iv = $this->iv;

        try {

            $soap = new SoapClient("https://ipgsoap.asanpardakht.ir/paygate/internalutils.asmx");
            $params = array(
                'aesKey' => $key,
                'aesVector' => $iv,
                'toBeDecrypted' => $string
            );

            $response = $soap->DecryptInAES($params);
            return $response->DecryptInAESResult;

        } catch (\SoapFault $e) {
            return "";
        }
    }

}