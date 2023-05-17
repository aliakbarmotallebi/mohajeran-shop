<?php

namespace App\Models;

use App\PaymentProcessor\Interfaces\PaymentableInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model 
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'balance',
        'user_id',
        'summery',
        'status',
        'message_form_admin',                
        'type'                                                                                                        
    ];

    public const SUMMERY = [
       'summery_increment' =>  'افزایش اعتبار از طریق پرداخت',
       'summery_increment_form_admin' =>  'افزایش اعتبار از مدیریت',
       'summery_decrement_form_admin' =>  'کاهش اعتبار از مدیریت',
       'summery_payment_order' => 'کاهش اعتبار به علت پرداخت فاکتور',
    ];

    public const TYPE_DEPOSIT = 'TYPE_DEPOSIT';

    public const TYPE_WITHDRAW = 'TYPE_WITHDRAW';


    public const STATUS_COMPLETED = 'STATUS_COMPLETED';

    public const STATUS_REJECTED = 'STATUS_REJECTED';


    protected static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->balance = $model->calculatorBalance();
        });

    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function order()
    {
        return $this->hasOne(Payment::class);
    }

    public function calculatorBalance()
    {
        if($this->type == self::TYPE_DEPOSIT){
            return $this->user->balance() + $this->amount;
        }

        return $this->user->balance() - $this->amount;
    }

    public function getAmountPay()
    {
        return $this->amount;  
    }

    public function getAmount()
    {
        return number_format($this->amount);
    }


    public function getBalance()
    {
        return ($this->balance);
    }

            /**
     * @return string
     */
    public function getCreatedAt()
    {
        return verta($this->created_at);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payments()
    {
        return $this->morphMany(Payment::class, 'paymentable');
    }

      /**
     * @return mixed
     */
    public function validWallets()
    {
        return $this->where('status', Wallet::STATUS_COMPLETED);
    }


        /**
     * @return mixed
     */
    public function deposit()
    {
        return $this->validWallets()
            ->where('type', Wallet::TYPE_DEPOSIT)
            ->sum('amount');
    }

    /**
     * @return mixed
     */
    public function withdraw()
    {
        return $this->validWallets()
            ->where('type', Wallet::TYPE_WITHDRAW)
            ->sum('amount');
    }

}
