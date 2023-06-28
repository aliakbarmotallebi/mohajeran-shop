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

        /**
     * @return mixed
     */
    public function getStatuses(): ?array {
        return [
            'STATUS_UNCONFIRMED',
            'STATUS_CONFIRMED',
            'STATUS_NEW',
            'STATUS_PENDING'
        ];

    }

    public function isAcceptedStatus(): string
    {
        return 1;
    }

    public function isRejectedStatus(): string
    {
        return 0;
    }

    public function press(): void {
        
        $status = $this->isAcceptedStatus();

        if ($this->status == $this->isAcceptedStatus()) {

            $status = $this->isRejectedStatus();
        }
        $this->status = $status;
        $this->save();
      
    }


    public function subcategories()
    {
        return $this->hasMany(SideGroup::class, 'main_erp_code', 'erp_code');
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
