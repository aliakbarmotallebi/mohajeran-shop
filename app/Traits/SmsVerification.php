<?php namespace App\Traits;

use Carbon\Carbon;
use App\Models\User;
use App\Packages\SMSSender;

trait SmsVerification
{

    public function isExpired(): bool
    {
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
             
             \Log::debug($r);

        } catch (\Exeption $e) {
            echo 'Error VerificationCode : ' . $e->getMessage();
        }

    }
}