<?php namespace App\Services;

use App\Models\Order;
use Log;

class OrderService extends Authorize implements ServiceInterface
{

    private $token;


    const API_POST_ORDER   = 'Invoice/Order';


    /**
     *
     */
    public function all(){}

    /**
     * @param string $code
     * @return mixed
     */
    public function find(string $code){}


    public function create(array $order)
    {
        // \Log::debug("before_create_order");
        // \Log::debug($order);

        $this->token = $this->requestRequestToken();

        $response =  $this->setPostUrl(self::API_POST_ORDER)
            ->setData(
                [
                    'headers'     => [
                        'Content-Type'  => 'application/json',
                        'Accept'        => 'application/json',
                        'Authorization' => $this->token
                    ],
                    'json'  => $order['data']
                ]
            )
            ->execute();
    // \Log::debug("after_create_order");
        \Log::debug($order);
        \Log::debug($response);
        
        // \Log::debug("holo order response : " . $response);

        return $this->getResponse($response);
    }



    /**
     * @param string $code
     * @param array $data
     */
    public function update(string $code, array $data){}


    private function getResponse($response)
    {
         if ( ! isset($response['Success']) )
                return false;

        $Id       = $response['Success']['Id'] ?? NULL;
        $ErpCode  = $response['Success']['ErpCode'] ?? NULL;
        $Code     = $response['Success']['Code'] ?? NULL;

        $order = Order::find($Id);

        if( $order ){

            $order->update([
                'erp_code' => $ErpCode,
                'code'     => $Code,
                'status'   => 'Completed'
            ]);
            return true;
        }

        return false;
    }
}
