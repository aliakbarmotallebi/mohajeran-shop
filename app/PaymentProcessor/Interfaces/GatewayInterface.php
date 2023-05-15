<?php

namespace App\PaymentProcessor\Interfaces;

use Illuminate\Http\Request;

interface GatewayInterface
{
    /**
     * request
     *
     * @return 
     */
    public function request();
    
    /**
     * verify
     *
     * @return 
     */
    public function verify();
    
}