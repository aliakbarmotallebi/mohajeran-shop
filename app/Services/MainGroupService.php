<?php namespace App\Services;


class MainGroupService extends Authorize implements ServiceInterface
{

    private $token;
    /**
     *  Service Method for Main Group
     */
    const API_GET_ALL_MAIN_GROUP = 'MainGroup';

    public function all()
    {
        $this->token = $this->requestRequestToken();

        return $this->setGetUrl(self::API_GET_ALL_MAIN_GROUP)
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

    public function find(string $code){}

    public function update(string $code, array $data){}
}
