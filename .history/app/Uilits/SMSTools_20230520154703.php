<?php  namespace App\Uilits;

class SMSTools {

    protected string $username;

    protected string $passcode;

    protected string $baseUrl;

    protected string $from;

    protected string $to;

    protected string $message;


    public function __construct($message = '')
    {
        $this->message = $message;

        $this->username= env("1000SMS_USERNAME");
        $this->passcode= env("1000SMS_PASSWORD");
        $this->baseUrl = env("1000SMS_BASE_URL");
        $this->from    = env("1000SMS_NUMBER_FROM");
        
    }

    public function text($message): self
    {
        $this->message = $message;

        return $this;
    }

    public function to($to): self
    {
        $this->to = $to;

        return $this;
    }

    public function from($from): self
    {
        $this->from = $from;

        return $this;
    }

    public function send(): mixed
    {

        if (!$this->from || !$this->to || empty($this->message)) {
            throw new \Exception('SMS not correct');
        }

        try {

            $soapClientObj = new \SoapClient($this->baseUrl);
            $parameters['username'] = $this->username;
            $parameters['password'] = $this->passcode;
            $parameters['from'] =  $this->from;
            $parameters['to'] = [$this->to];
            $parameters['text'] = $this->message;
            $parameters['isflash'] = false;
            $parameters['udh'] = "";
            $parameters['recId'] = array(0);
            $parameters['status'] = array(0);
            return $soapClientObj->SendSms($parameters);

        } catch (\Exception $e) {
            throw $e;
        }

    }
}