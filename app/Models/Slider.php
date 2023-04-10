<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'image'
    ];


    public function getImage()
    {
        if(empty($this->image) || is_null($this->image))
            return "https://dummyimage.com/500x300";

        return asset($this->image);
    }

    public function hasImage(): bool
    {
        return !empty($this->image) || !is_null($this->image);
    }
}
