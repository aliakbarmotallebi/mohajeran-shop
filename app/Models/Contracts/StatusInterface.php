<?php

namespace App\Models\Contracts;


interface StatusInterface
{

    public function isAcceptedStatus(): ?string;


    public function isRejectedStatus(): ?string;

    /**
     * @return void
     */
    public function press(): void ;
}