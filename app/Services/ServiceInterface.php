<?php

namespace App\Services;

interface ServiceInterface
{
    public function all();

    public function find(string $code);

    public function update(string $code, array $data);

}