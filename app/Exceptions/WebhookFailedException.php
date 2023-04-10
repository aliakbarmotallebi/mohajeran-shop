<?php

namespace App\Exceptions;

class WebhookFailedException extends \Exception
{

    public static function missingSecret()
    {
        return new static('The request did not contain a header named `apikey`.');
    }

    public static function notMatchIPAddress()
    {
        return new static('Invalid the IP Address');
    }

    public static function invalidSecret($signature)
    {
        return new static("The signature `{$signature}` invalid");
    }

    public static function signingSecretNotSet()
    {
        return new static('The secret key is not set');
    }

    public static function jobClassDoesNotExist($jobClass)
    {
        return new static("The job Class Does Not Exist `{$jobClass}`");
    }

    public static function invalidJson()
    {
        return new static("invalid Json");
    }
    




    

}