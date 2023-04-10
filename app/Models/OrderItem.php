<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'price',
        'unit_price',
        'quantity',
        'product_erp_code',
        'comment'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_erp_code', 'erp_code');
    }

    public function getProductErpCode()
    {
        return $this->product_erp_code;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }


    public function getUnitPrice()
    {
        return $this->unit_price;
    }
    
    public function getPriceWithRial()
    {
        return ($this->price)."0";
    }
    
      public function getPriceWithDiscount()
    {
        return ($this->price)."0";
    }
    
          public function getUnitPriceWithRial()
    {
        return ($this->unit_price)."0";
    }
}
