<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LotteryStock extends Model
{
    use HasFactory;

    public function getImageUrlAttribute($value)
    {
        return asset($value);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
