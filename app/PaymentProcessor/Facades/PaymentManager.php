<?php

namespace App\PaymentProcessor\Facades;

use App\PaymentProcessor\GatewayManager;
use Illuminate\Support\Facades\Facade;

class PaymentManager extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return GatewayManager::class;
    }
}