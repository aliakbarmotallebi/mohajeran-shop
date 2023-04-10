<?php namespace App\Services;

use Log;
use App\Models\User;
use Illuminate\Support\Facades\Log as FacadesLog;

class CustomerService extends Authorize implements ServiceInterface
{

    private $token;

    /**
     *  Service Method for Customer
     */
    const API_GET_CUSTOMER   = 'Customer';



    const API_PUT_CUSTOMER   = 'Customer';


    /**
     *
     */
    public function all()
    {
        $this->token = $this->requestRequestToken();

        return $this->setGetUrl(self::API_GET_CUSTOMER)
        ->setData(
            [
                'headers'     => [
                    'Content-Type'  => 'application/json',
                    'Accept'        => 'application/json',
                    'Authorization' => $this->token
                ]
            ]
        )
        ->execute();
    }

    /**
     * @param string $code
     * @return mixed
     */
    public function find(string $code)
    {

        $this->token = $this->requestRequestToken();

        return $this->setGetUrl(self::API_GET_CUSTOMER)
            ->addQuery(["ErpCode" => $code])
            ->setData(
                [
                    'headers'     => [
                        'Content-Type'  => 'application/json',
                        'Accept'        => 'application/json',
                        'Authorization' => $this->token
                    ]
                ]
            )
            ->execute();
    }


    public function create(array $user)
    {

        $this->token = $this->requestRequestToken();

        $response = $this->setPostUrl(self::API_GET_CUSTOMER)
        ->setData(
            [
                'headers'     => [
                    'Content-Type'  => 'application/json',
                    'Accept'        => 'application/json',
                    'Authorization' => $this->token
                ],
                'json'  => [
                    "custinfo" => [
                        [
                            "ispurchaser" => true,
                            "isseller"    => true,
                            "custtype"    => 0,
                            'name'        => $user['name'] ?? $user['mobile'],
                            'mobile'      => $user['mobile']
                        ]
                    ]
                ]
            ]
        )
        ->execute();
// \Log::debug($response);
        // \Log::debug($response);
        return $this->getResponseErpcode($user['mobile'] , $response);
    }


    public function getUserByMobile(string $mobile)
    {
        try {
            $this->token = $this->requestRequestToken();
// \Log::debug($this->token);
            $user =  $this->setGetUrl(self::API_GET_CUSTOMER)
            ->addQuery(["Mobile" => $mobile])
            ->setData(
                [
                    'headers' => [
                        'Content-Type'  => 'application/json',
                        'Accept'        => 'application/json',
                        'Authorization' => $this->token
                    ]
                ]
            )
            ->execute();
            // if(empty($user)){
            //     $this->create([
            //         'mobile' =>     $mobile
            //     ]);
            // }
            // \Log::debug($user);
            return $user;

        } catch (\Exception $e) {
            return false;
        }
    }


    private function getResponseErpcode( $mobile ,$response)
    {
        if ( ! isset($response['Success']) )
                return false;

        $ErpCode  = $response['Success']['ErpCode'] ?? NULL;

        $user = User::whereMobile( $mobile );

        if( $user ){

            $user->update([
                'erp_code' => $ErpCode,
            ]);
            // \Log::debug($user);
            return true;
        }

        return false;
    }



    /**
     * @param string $code
     * @param array $data
     */
    public function update(string $code, array $data)
    {
        $this->token = $this->requestRequestToken();

        $usr = $this->setPutUrl(self::API_PUT_CUSTOMER)
            ->setData(
                [
                    'headers'     => [
                        'Content-Type'  => 'application/json',
                        'Accept'        => 'application/json',
                        'Authorization' => $this->token
                    ],
                    'json'  => [
                        "custinfo" => [
                            array_merge (
                                [ "erpcode" => $code ],
                                array_filter($data)
                            )
                        ]
                    ]
                ]
            )
            ->execute();
            \Log::debug(array_filter($data));
            \Log::debug($usr);
            

    }
}
