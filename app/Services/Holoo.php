<?php namespace App\Services;

use GuzzleHttp\Client;
use App\Exceptions\InvalidJsonException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;
use Psr\Http\Message\ResponseInterface;


/**
 * Class Holoo
 * @package App\Services
 */
class Holoo
{
    /**
     * Address URL Service Holoo
     */
    const BASE_URI      = 'http://109.122.229.110:8080/TncHoloo/api/';

    /**
     * @var Client
     */
    protected $httpClient;

    /**
     * @var
     */
    protected $callableUrl;

    /**
     * @var string
     */
    protected $method = 'GET';

    /**
     * @var array
     */
    protected $data = [];


    protected $query;


    /**
     * Holoo constructor.
     */
    public function __construct()
    {
       $this->httpClient = new Client([
            'base_uri' => self::BASE_URI,
        ]);
    }

    /**
     * @param null $url
     * @return $this
     */
    public function setGetUrl($url = null)
    {
        $this->method = 'GET';
        $this->callableUrl = $url;

        return $this;
    }

    /**
     * @param $url
     * @return $this
     */
    public function setPostUrl($url)
    {
        $this->method = 'POST';
        $this->callableUrl = $url;
//        "{self::BASE_URL}{$url}";
        return $this;
    }


    public function setPutUrl($url)
    {
        $this->method = 'PUT';
        $this->callableUrl = $url;
//        "{self::BASE_URL}{$url}";
        return $this;
    }

    /**
     * @param $url
     * @return $this
     */
    public function setDeleteUrl($url)
    {
        $this->method = 'DELETE';
        $this->callableUrl = $url;

        return $this;
    }


     /**
     * @param array $array
     * @return $this
     */
    public function addQuery(array $array)
    {
        $this->query = '?'.http_build_query($array);

        return $this;
    }

    public function setData(array $data)
    {
        $this->data = $data;

        return $this;
    }

    private function mergeData(array $base)
    {
        return array_filter($base, function($value) {
            return $value !== null;
        });
    }

    /**
     * @param $response
     * @throws \Exception
     */
    private function checkIfErrorResponse($response): void
    {
        //Log::debug($response);
       //$response = array_shift($response);

    //    if (  isset($response['Error'])  ) {
    //        throw new \Exception("Something failed ERROR::: `{$response}`");
    //    }
    }

    private static function jsonValidate($jsonString, $asArray)
    {
        $json = json_decode($jsonString, $asArray);

        if (json_last_error() != JSON_ERROR_NONE) {
            throw new InvalidJsonException(json_last_error_msg(), json_last_error());
        }

        return $json;
    }


    /**
     * @return mixed
     */
    public function execute()
    {
        try {
            $promise = $this->httpClient->requestAsync(
                $this->method,
                "{$this->callableUrl}{$this->query}",
                $this->mergeData($this->data)
            )
                ->then(function ($result) {

                    $result = $this->decodeResponse($result, true);
                    // \Log::debug($result);
                    if ( $result ) {
                        $this->checkIfErrorResponse($result);
                        // \Log::debug($result);
                        return $result;
                    }
                    return false;
                });
                return $promise->wait();
            } catch (RequestException $e) {

                if ($e->hasResponse()) {
    //                var_dump($e->getMessage());
                    // \Log::debug($e);
                    throw new \Exception($e->getMessage());

                }
                throw new \Exception($e->getMessage());
            }


    }


    private function decodeResponse(ResponseInterface $response,$assoc=false)
    {
        return \GuzzleHttp\json_decode($response->getBody(),$assoc);
    }
}
