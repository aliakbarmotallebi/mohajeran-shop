<?php

namespace App\PaymentProcessor\Interfaces;

interface RequestedPaymentInterface
{
    /**
     * Determine if payment is requested successfully.
     *
     * @return bool
     */
    public function successful(): bool;

    /**
     * Determine if there is an error with payment request.
     *
     * @return bool
     */
    public function failed(): bool;

   
    /**
     * Get status of the payment request.
     *
     * @return int|string|void
     */
    public function status();

    /**
     * Get proper message for the payment request, if failed.
     *
     * @return null|string
     */
    public function message(): ?string;

    /*
     *
     * @return string
     */
    public function resunmber(): ?string;

    public function redirect();
}