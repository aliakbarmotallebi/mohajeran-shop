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

        $this->username= "shahrvand";
        $this->passcode= '(*eA*$jW@$';
        $this->baseUrl = "https://sms.sunwaysms.com/smsws/HttpService.ashx?";
        $this->from    = "90009364";
        
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

    private function exec($params = [])
    {
        $url = $this->baseUrl . http_build_query($params);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30000);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }
    
    public function insertNumberInNumberGroup($PersonNumber, $PersonName='')
    {

        try {

            $params = [
                "service" => "InsertNumberInNumberGroup",
                "UserName" => $this->username,
                "Password" => $this->passcode,
                "NumberGroupID" => 38490700,
                "PersonNumber" => $PersonNumber,
                "PersonName" => $PersonName,
            ];

            return $this->exec($params);
    
        } catch (\Exception $e) {
            throw $e;
        }
        
    }
    
    public function sendNumberGroup()
    {
        if (!$this->from || empty($this->message)) {
            throw new \Exception('SMS not correct');
        }

        try {

            $params = [
                "service" => "SendNumberGroup",
                "UserName" => $this->username,
                "Password" => $this->passcode,
                "NumberGroupID" => 38490700,
                "Message" => $this->message,
                "From" => $this->from ,
                "DontSendToRepeatedNumber" => true,
            ];

            return $this->exec($params);
    
        } catch (\Exception $e) {
            throw $e;
        }
        
    }


    public function send(): mixed
    {

        if (!$this->from || !$this->to || empty($this->message)) {
            throw new \Exception('SMS not correct');
        }

        try {

            $params = [
                "service" => "SendArray",
                "UserName" => $this->username,
                "Password" => $this->passcode,
                "To" => $this->to,
                "Message" => $this->message,
                "From" => urlencode($this->from),
            ];

            return $this->exec($params);
    
        } catch (\Exception $e) {
            throw $e;
        }

    }
}