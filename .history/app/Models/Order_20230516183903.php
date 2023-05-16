<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'erp_code',
        'customer_erp_code',
        'total_price',
        'order_number',
        'code',
        'status',
        'status_paid'
    ];

    const STATUS_COMPLETED   = 'Completed';
    const STATUS_PENDING     = 'Pending';
    const STATUS_REJECTED    = 'Rejected';
    const STATUS_PROCESSING  = 'Processing';


    public function isCompleted(): bool
    {
        return (bool)($this->status == self::STATUS_COMPLETED);
    }

    public function isPending(): bool
    {
        return (bool)($this->status == self::STATUS_PENDING);
    }

    public function isRejected(): bool
    {
        return (bool)($this->status == self::STATUS_REJECTED);
    }

    public function isProcessing(): bool
    {
        return (bool)($this->status == self::STATUS_PROCESSING);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'customer_erp_code', 'erp_code');
    }
    
    
     public function setCustomeraddressAttribute($value)
    {
        $this->attributes['customeraddress'] = $value;
        
        if($this->user instanceof User  ){
            $user = $this->user;
            $user->address  = $value;
            $user->save();
        }

    }

    public function shouldPayWithPayment(): bool
    {
        return (bool)($this->user->balance() < $this->getTotal()); 
    }

    public function diffAmountPayWithWallet()
    {
        return ($this->user->balance() - $this->getTotal()); 
    }


    public function getStatusPaid() 
    {   
        return $this->status_paid;
    }

    /**
     * @return mixed
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getTotal()
    {
        return ($this->total_price);
    }

    public function getCustomerErpCode()
    {
        return $this->customer_erp_code;
    }

    public function getCreatedAt()
    {
        return verta($this->created_at)->format('H:i Y-m-d');
    }
}
