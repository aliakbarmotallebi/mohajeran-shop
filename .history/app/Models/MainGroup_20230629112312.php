<?php

namespace App\Models;

use App\Models\Contracts\StatusInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainGroup extends Model implements StatusInterface
{
    use HasFactory;

    protected $fillable = [
        'name',
        'erp_code',
        'is_vendor',
        'image',
        'is_disabled',
        'owner_id'
    ];

    public function isAcceptedStatus(): string
    {
        return 0;
    }

    public function isRejectedStatus(): string
    {
        return 1;
    }

    public function press(): void 
    {
        
        $status = $this->isAcceptedStatus();

        if ($this->is_disabled == $this->isAcceptedStatus()) {

            $status = $this->isRejectedStatus();
        }
        $this->is_disabled = $status;
        $this->save();
      
    }

    public function getStatusAttribute($value)
    {
        return $this->is_disabled;
    }


    public function subcategories()
    {
        return $this->hasMany(SideGroup::class, 'main_erp_code', 'erp_code');
    }
    
    public function owner()
    {
        return $this->belongsTo(User::class);
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

    public function products()
    {
        return $this->hasMany(Product::class, 'MainGroupCode');
    }
}
