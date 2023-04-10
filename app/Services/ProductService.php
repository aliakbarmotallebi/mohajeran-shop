<?php namespace App\Services;

class ProductService extends Authorize implements ServiceInterface
{

    private $token;

    /**
     *  Service Method for Product
     */
    const API_GET_PRODUCTS             = 'Product';


    public function all()
    {
        $this->token = $this->requestRequestToken();

        return $this->setGetUrl(self::API_GET_PRODUCTS)
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
        
        return $this->setGetUrl(self::API_GET_PRODUCTS)
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


    public function barcode(string $code)
    {
        $this->token = $this->requestRequestToken();
        
        return $this->setGetUrl(self::API_GET_PRODUCTS)
            ->addQuery(["Code" => $code])
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
     * @param array $data
     */
    public function update(string $code, array $data){}

}
