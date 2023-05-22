<?php namespace App\Traits;

use Carbon\Carbon;
use App\Models\User;
use App\Packages\SMSSender;

trait SmsVerification
{

    public function isExpired(): bool
    {
        // return true;
        if( empty($this->code_expired_at) || is_null($this->code_expired_at) ){
            return true;
        }
            
        return $this->code_expired_at->diffInMinutes(Carbon::now()) > 2;
    }

    public function canResendCode()
    {
        if( empty($this->verification_code) ){
            return true;
        }

        if( $this->isExpired() ){
            return true;
        }

        return false;
    }

    public function sendCode($code)
    {
        if (! $this instanceof User) {
            throw new \Exception("No user");
        }

        $api_key = env("SMS_IR_API_KEY");
        $secret_key = env("SMS_IR_SECRET_KEY");
        $api_url = env("SMS_IR_BASE_API_URL");
  \Log::debug($api_key);
   \Log::debug($secret_key);
    \Log::debug($api_url);
        try {
              $data = array(
                "ParameterArray" => array(
                    array(
                        "Parameter" => "Code",
                        "ParameterValue" => $code
                    )
                ),
                "Mobile" => $this->mobile,
                "TemplateId" => "60993"
            );

             $sender = new SMSSender($api_key, $secret_key, $api_url);
             $r = $sender->ultraFastSend($data);
             
            // $username = "09216841841";
            // $password = 'Faraz@0521075386';
            // $from = "+98EVENT";
            // $pattern_code = "oa51k8sfv4e3pt9";
            // $to = array($this->mobile);
            // $input_data = array("code" => $code);
            // $url = "https://ippanel.com/patterns/pattern?username=" . $username . "&password=" . urlencode($password) . "&from=$from&to=" . json_encode($to) . "&input_data=" . urlencode(json_encode($input_data)) . "&pattern_code=$pattern_code";
            // $handler = curl_init($url);
            // curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
            // curl_setopt($handler, CURLOPT_POSTFIELDS, $input_data);
            // curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
            // $response = curl_exec($handler);
            //  \Log::debug($response);
            //  \Log::debug($r);

        } catch (\Exeption $e) {
            echo 'Error VerificationCode : ' . $e->getMessage();
        }

    }
}