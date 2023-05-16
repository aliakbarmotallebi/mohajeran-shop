<?php namespace App\Facades;

use App\Uilities\WalletProcessor;
use Illuminate\Support\Facades\Facade;

class WalletManager extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return WalletProcessor::class;
    }
} 