<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Container\Container;
use App\Repositories\Eloquent\Repository;

class ProductRepository extends Repository
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
        return Product::class;
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
            $models->push($this->createOrUpdate($d));
        }

        return $models;
    }

    public function create(array $data)
    {
        \Log::debug('create');
        return $this->model->create(
            $this->multiKeyExists($data)
        );
    }

    public function update(string $id, array $data, $attribute = 'erp_code')
    {
        return $this->model->where($attribute, '=', $id)->update(
            $this->multiKeyExists($data)
        );
    }

    public function delete(string $id)
    {
        $this->model->whereErpCode($id)->delete();
    }

    public function createOrUpdate(array $data)
    {

        if($this->model->where('erp_code', $data['ErpCode'])->first()){
            return $this->update(
                $data['ErpCode'],
                $data
            );
        }
        
        return $this->create($data);
    }

    private function multiKeyExists(array $data)
    {

        $item = [
            'name'            => $data['Name'] ?? 'empty',
            'few'             => $data['Few'] ?? $data['inventory'] ?? 'empty',
            'fewtak'          =>  $data['fewtak']  ?? $data['inventory'] ?? 'empty',
            'discount_price'  => $data['DiscountPrice'] ?? 'empty',
            'sell_price'      => $data['SellPrice'] ?? 'empty',
            'main_group_name' => $data['MainGroupName'] ?? 'empty',
            'side_group_name' => $data['SideGroupName'] ?? 'empty',
            'main_group_name' => $data['MainGroupName'] ?? 'empty',
            'side_group_name' => $data['SideGroupName'] ?? 'empty',
            'main_group_code' => $data['MainGroupErpCode'] ?? 'empty',
            'side_group_code' => $data['SideGroupErpCode'] ?? 'empty', //SideGroupCode
            'code'            => $data['Code'] ?? 'empty',
            'unit_erp_code'   => $data['UnitErpCode'] ?? 'empty',
            'erp_code'        => $data['ErpCode'] ?? 'empty',
            // 'status' => $data['isActive'] ?? 0,
            'other1' => $data['Other1'] ?? 'empty',
            'other2' => $data['Other2'] ?? 'empty',
            'other3' => $data['Other3'] ?? 'empty',
            'other4' => $data['Other4'] ?? 'empty',
            'other5' => $data['Other5'] ?? 'empty',
        ];
        
        // \Log::debug($item);

        return array_filter($item, function ($value) {
            return $value !== 'empty';
        });
    }
}
