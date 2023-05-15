<?php  namespace App\PaymentProcessor\Gateways;

use App\PaymentProcessor\Interfaces\GatewayInterface;
use App\PaymentProcessor\Interfaces\PaymentableInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

/**
 * MellatBankGateway
 */
class MellatBankGateway implements GatewayInterface
{

    /**
     * @var mixed configs
     */
    protected $configs;

    /**
     * @var client
     */
    private $client = null;
    
    
    /**
     * @var mixed resnumber
     */
    protected $resnumber;

        
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
		$this->configs = (object)Config::get('payment.mellat');
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
        		$this->configs = (object)Config::get('payment.mellat');
        try {
            return $this->client = new \SoapClient($this->configs->purchaseUrl);
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
        $url = $this->configs->paymentUrl;

        $inputs = [
            'RefId' => $this->getResnumber()
        ];

        return view('redirector', compact('inputs', 'url'))->render();
    }

    public function request()
    {
        $client = $this->getSoapClient();

        $params = [
            'terminalId' =>  $this->configs->terminalId,
            'userName' =>  $this->configs->username,
            'userPassword' =>  $this->configs->password,
            'orderId' => $this->paymentable->id,
            'amount' => $this->paymentable->getAmountPay(),
            'localDate' => date("Ymd"),
            'localTime' => date("His"),
            'additionalData' => "",
            'callBackUrl' => $this->configs->callbackUrl,
            'payerId' => 0,
        ];
        
        $result = $client->bpPayRequest($params);

        $response = $this->getResponse($result);

        if ($response[0] == 0) {
            $token = $response[1];
            $this->setResnumber($token);
           return $token;
        } 
        return false;
    }



    public function verify() 
    {
        $client = $this->getSoapClient();
        
        $request = $this->request;

        $params = [
            'terminalId' =>  $this->configs->terminalId,
            'userName' =>  $this->configs->username,
            'userPassword' =>  $this->configs->password,
            'orderId' => $request['SaleOrderId'] ?? NULL,
            'saleOrderId' => $request['SaleOrderId'] ?? NULL,
            'saleReferenceId' => $request['SaleReferenceId'] ?? NULL
        ];

        try {

            $result = $this->client->bpVerifyRequest($params);
            $response = $this->getResponse($result);
            if (($response[0] ?? NULL )== '0') {
                 $response = $this->client->bpSettleRequest($params);
                if(($response->return ?? NULL ) == '0') {
                    $this->setResnumber($request['RefId']);
                    return true;
                }

            } else {
                return false;
            }
        } catch (Exception $e){
            return false;
        }
       
    }  
}