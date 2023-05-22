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

        $this->username= "3982";
        $this->passcode= "j)pQXfRLuK";
        $this->baseUrl = "https://sms.sunwaysms.com/smsws/HttpService.ashx?";
        $this->from    = "5000207000013";
        
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
        // dd($url);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30000);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    public function send(): mixed
    {

        if (!$this->from || !$this->to || empty($this->message)) {
            throw new \Exception('SMS not correct');
        }

        try {

            $params = [
                "service" => "SendArray",
                "UserName" => urlencode($this->username),
                "Password" => urlencode($this->passcode),
                "To" => urlencode($this->to),
                "Message" => urlencode($this->message),
                "From" => urlencode($this->from),
            ];

            return $this->exec($params);
    
        } catch (\Exception $e) {
            throw $e;
        }

    }
}