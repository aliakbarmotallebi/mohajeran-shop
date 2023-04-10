<?php namespace App\Services;


class SideGroupService extends Authorize implements ServiceInterface
{
    private $token;
    /**
     *  Service Method for Side Group
     */
    const API_GET_ALL_SIDE_GROUP = 'SideGroup';

    public function all()
    {
        $this->token = $this->requestRequestToken();

        return $this->setGetUrl(self::API_GET_ALL_SIDE_GROUP)
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
