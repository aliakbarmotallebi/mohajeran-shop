<?php namespace App\Services;

class UnitService extends Authorize implements ServiceInterface 
{
    private $token;

    const API_GET_UNIT = 'Unit';

    public function all()
    {
        $this->token = $this->requestRequestToken();
        
        return $this->setGetUrl(self::API_GET_UNIT)
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