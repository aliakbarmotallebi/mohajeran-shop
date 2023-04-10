<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    
     public function getImage()
    {
        if( ! $this->image ){
            return asset('/image1.png');
        }
        
        // $waterMarkUrl = public_path('watermark-crop.png');
        // $image = Image::make(public_path($this->image));
        // /* insert watermark at bottom-left corner with 5px offset */
        // $image->insert($waterMarkUrl, 'top-right', 0, 70);
        // $image->save();
        return asset($this->image);
    }
}
