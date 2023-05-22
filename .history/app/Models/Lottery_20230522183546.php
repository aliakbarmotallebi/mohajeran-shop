<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lottery extends Model
{
    use HasFactory;

    public function stocks()
    {
        return $this->hasMany(LotteryStock::class);
    }

    public function prizes()
    {
        return $this->hasMany(LotteryPrize::class);
    }
    
    function isPast()
    { 
        return Carbon::parse($this->end_at)->lte(Carbon::now());
    }


    public function getImageUrlAttribute($value)
    {
        return url($value);
    }
}
