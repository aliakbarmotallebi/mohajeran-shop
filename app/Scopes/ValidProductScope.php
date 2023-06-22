<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class ValidProductScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $builder
            ->whereNotIn('erp_code', [
                'bBALNA1mckd7Zh4O',
                'bBALNA1mckh7QB4O',
                'bBAHNA1mckd5dh4O',
                'bBAHNA1mckd4dh4O',
                'bBAHNA1mckd7QB4O',
                'bBALNA1mckd7Zh4O'
            ]);
    }
}