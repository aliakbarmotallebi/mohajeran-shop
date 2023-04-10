<?php namespace App\Services;

use Log;
use App\Models\User;

class WebhookService extends Authorize implements ServiceInterface
{

    private $token;

    /**
     *  Service Method for Customer
     */
    const API_GET_WEBHOOK   = 'Webhook/start';


    /**
     *
     */
    public function all(){}

    /**
     * @param string $code
     * @return mixed
     */
    public function find(string $code){}


    public function update(string $code, array $data){}

    /**
     * @param string $code
     * @param array $data
     */
    public function start()
    {
        $this->token = $this->requestRequestToken();

        return $this->setGetUrl(self::API_GET_WEBHOOK)
            ->setData(
                [
                    'headers'     => [
                        'Accept'        => 'application/json',
                        'Authorization' => $this->token
                    ]
                ]
            )
            ->execute();

    }
}
