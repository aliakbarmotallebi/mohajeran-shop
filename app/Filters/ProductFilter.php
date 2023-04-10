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
            1 => 'getVisitCount',
            2 => 'getBestSeller',
            3 => 'getSpecial'
        ];

        

        if( isset($field[$value]) ){
            return $this->{$field[$value]}()->where('few', '!=', 0);
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
    public function count(int $number = null)
    {
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
    private function getBestSeller()
{
        return $this->builder->whereBetween('code', [
            '20001000', 
            '20001050'
        ])->orderBy('code', 'DESC');
    }

    /**
     * @return string
     */
    private function getSpecial()
    {
        return $this->builder->orderBy(
            'is_special',  'DESC'
        )->orderBy('name', 'ASC');
    }
}