<?php namespace App\Facades;

use App\Uilities\TransactionWalletProcessor;
use Illuminate\Support\Facades\Facade;

class TransactionWalletManager extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return TransactionWalletProcessor::class;
    }
}

