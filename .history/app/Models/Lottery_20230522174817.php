<?php

namespace App\Models;

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
}
