<?php namespace App\Traits;

use Carbon\Carbon;
use App\Models\User;
use App\Uilits\SMSTools;

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


        try {
            $msg = 'کدتاییدیه شماره همراه شما:';
            $msg .= " $code";
            $SMS = (new SMSTools())
                ->to($this->mobile)
                ->text($msg);
            return $SMS->send();

        } catch (\Exeption $e) {
            echo 'Error VerificationCode : ' . $e->getMessage();
        }

    }
}