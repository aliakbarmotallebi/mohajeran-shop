<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LotteryPrize extends Model
{
    use HasFactory;

    public function getImageUrlAttribute($value)
    {
        return url($value);
    }
}
