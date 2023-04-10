<?php

namespace App\Repositories;

use App\Models\SideGroup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Container\Container;
use App\Repositories\Eloquent\Repository;

class SideGroupRepository extends Repository
{
    protected $container;

    protected $model;

    public function __construct(Container $container)
    {
        $this->container = $container;
        $this->makeModel();
    }

    protected function makeModel()
    {
        $this->model = $this->container->make($this->model());
    }

    public function model()
    {
        return SideGroup::class;
    }

    public function find(string $id)
    {
        // TODO: Implement find() method.
    }

    public function query(array $filters)
    {
        // TODO: Implement query() method.
    }

    public function createMultiple(array $data)
    {
        $models = new Collection();

        foreach ($data as $d) {
            $models->push($this->create($d));
        }

        return $models;
    }

    public function create(array $data)
    {
        // \Log::debug($data);
        return $this->model->create( [
            'name' => $data['Name'],
            'erp_code' => $data['ErpCode'] , //ErpCode
            'main_erp_code' => $data['MainGroupErpcode'] ?? null,
            'main_group_name' => $data['MainGroupName'] ?? null,
        ] );
    }

    public function update(string $id, array $data, $attribute = "erp_code")
    {
       $this->model->updateOrCreate(
            [$attribute => $id],
            [
                    'name'     => $data['Name'],
                    'erp_code' => $data['ErpCode'] , //ErpCode
                    'main_erp_code' => $data['MainGroupErpCode'] ?? null,
                    'main_group_name' => $data['MainGroupErpCode'] ?? NULL,
                ]
        );
    }

    public function delete(string $id)
    {
               $this->model->whereErpCode($id)->delete();

    }
}