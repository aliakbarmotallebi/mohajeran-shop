<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'erp_code',
        'is_vendor',
        'image'
    ];

    public function subcategories()
    {
        return $this->hasMany(SideGroup::class, 'main_erp_code', 'erp_code')->collate('utf8mb4_bin');
    }
    
    public function isVendor(): bool
    {
        return (bool)$this->is_vendor;
    }

    public function getImage()
    {
        if( ! $this->image ){
            return asset('/image1.png');
        }

        return asset($this->image);
    }

//
//    public function products()
//    {
//        return $this->hasMany(Product::class, 'MainGroupCode');
//    }
}
