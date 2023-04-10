<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinnedProduct extends Model
{
    use HasFactory;

    public function product() {
        return $this->belongsTo(Product::class, 'product_erp_code', 'erp_code');
    }
}
