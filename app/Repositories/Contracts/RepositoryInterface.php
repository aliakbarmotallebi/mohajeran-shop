<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    public function find(string $id);

    public function query(array $filters);

    public function create(array $data);

    public function update(string $id, array $data);

    public function delete(string $id);
}