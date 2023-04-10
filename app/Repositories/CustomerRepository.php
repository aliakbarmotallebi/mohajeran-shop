<?php namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Container\Container;
use App\Repositories\Eloquent\Repository;


class CustomerRepository extends Repository
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
        return User::class;
    }

    public function find(string $id)
    {
        //
    }

    public function query(array $filters)
    {
        // TODO: Implement query() method.
    }

    public function createMultiple(array $data)
    {
        $models = new Collection();

        foreach ($data as $d) {

            $mobile = $d['Mobile'] ?? $d['mobile'] ?? NULL;

            if( is_null($mobile) ){
                continue;
            }

            $models->push($this->create($d));
        }

        return $models;
    }

    public function create(array $data)
    {
        
        $data = $this->multiKeyExists($data);

        $user = $this->model
            ->where('mobile', '=', $data['mobile'])
            ->orWhere('erp_code', '=', $data['erp_code'])
            ->exists();
        if (  $user ) {

            return $this->update($data['mobile'], $data, 'mobile');
        }
        
        return $this->save($data);
    }
    
    public function save(array $data)
    {
        return $this->model->createWithoutEvents(
            $data + [
                'password' => '123456789'
            ]
        );
    }

    public function update(string $id, array $data, $attribute = "erp_code")
    {

        $data = $this->multiKeyExists($data);

        $t= User::withoutEvents(function () use($id, $data, $attribute) {
            return $this->model->where($attribute, '=' ,$id)->update(
                array_filter( $this->multiKeyExists($data) )
            );
        });
        
    }

    public function delete(string $id)
    {
        // TODO: Implement delete() method.
    }

    public function checkMobileExists(array $data)
    {
        if ( $this->model->whereMobile($data['mobile'])->exists() ) {
            return $this->update($data['mobile'], $data, 'mobile');
        }

        return $this->save($data);
    }

    private function multiKeyExists(array $data){
        return [
            'mobile'        => $data['mobile']      ?? $data['Mobile'] ?? NULL,
            'name'          => $data['name']        ?? $data['Name'] ?? NULL,
            'tel'           => $data['tel']         ?? $data['Tel']  ?? NULL,
            'address'       => $data['address']     ?? $data['Address']  ?? NULL,
            'is_black_list' => $data['isblacklist'] ?? $data['IsBlackList'] ?? NULL ,
            'zipcode'       => $data['zipcode']     ?? $data['ZipCode']  ?? NULL ,
            'erp_code'      => $data['ErpCode']     ?? $data['ErpCode']  ?? NULL,
            'moreaddress'   => $data['moreaddress']     ?? $data['MoreAddress']  ?? NULL,
        ];
    }
}