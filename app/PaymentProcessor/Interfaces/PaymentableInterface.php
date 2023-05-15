<?php

namespace App\PaymentProcessor\Interfaces;

use App\Models\Payment;

interface PaymentableInterface
{
    public function payments();

    public function getAmountPay();
}