<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;

/**
 * Class ProductFilter
 * @package App\Filters
 */
class ProductFilter extends Filter
{


    public function q(string $search = null){
        
        // return $this->builder->where('name', 'like',  $search . '%')
        return $this->builder->search($search, null, true)
                ->where('few', '!=', '0');
                // ->orderBy('name', 'ASC');
                // ->where('fewtak', '!=', 0);
    }

    /**
     * @param string|null $value
     * @return Builder
     */
    public function sort(string $value = null)
    {
        $field = [
            'VISIT_COUNT' => 'getVisitCount',
            'CHEAP' => 'getCheap',
            'EXPENSIVE' => 'getExpensive',
            'DISCOUNT' => 'getDiscount',
        ];

        

        if( isset($field[$value]) ){
            return $this->{$field[$value]}();
                // ->where('fewtak', '!=', 0);
        }

        return $this->builder;
    }

    /**
     * @param int|null $number
     * @return mixed
     */
    public function skip(int $number = null)
    {
        return $this->builder->skip($number);
    }

    /**
     * @param int|null $number
     * @return mixed
     */
    public function count(int $number = 1)
    {
        return $number;
        return $this->builder->take($number);
    }


    /**
     * @return string
     */
    private function getVisitCount()
    {
         return $this->builder->orderBy(
                'visit_count',  'DESC'
            )->orderBy('name', 'ASC');
    }

    /**
     * @return string
     */
    private function getCheap()
    {
        return $this->builder->orderBy('sell_price', 'ASC');
    }

    /**
     * @return string
     */
    private function getExpensive()
    {
        return $this->builder->orderBy(
            'sell_price',  'DESC'
        );
    }
    
      /**
     * @return string
     */
    private function getDiscount()
    {
        return $this->builder->where(
            'discount_price', '!=' , 0
        );
    }
    
    /**
     * @return string
     */
    public function available()
    {
        return $this->builder->where('fewTak', '!=', 0);
    }
    
    /**
     * @return string
     */
    public function price(array $prices)
    {

         if(!is_array($prices)){
            return null;    
        }
        $number_min = 0 ;
        $number_max = null;
        
        if($this->request->get('price')['min'] ?? null) {
            $number_min = $this->request->get('price')['min'];
        }
        if($this->request->get('price')['max'] ?? null) {
            $number_max = $this->request->get('price')['max'];
        }
        
        return $this->builder->whereBetween(
            'sell_price' , [$number_min, $number_max]
        );
    }
    
     /**
     * @return string
     */
    public function category(string $category)
    {
        return $this->builder->whereMainGroupCode(
            $category
        );
    }
    
      /**
     * @return string
     */
    public function subcategory($subcategory)
    {
        if(!is_array($subcategory)){
            return null;    
        }
        
        if($this->request->has('category')) {
            return $this->category($this->request->get('category'))->whereIn(
                'side_group_code', $subcategory
            );
        }
    }
    

}