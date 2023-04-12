<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable=[
        "resnumber",
        "user_id",
        "back_name",
        "amount",
        "result",
        "type",
        "status"
    ];

    public const PAID_STATUS = 'PAID';

    public const NONPAID_STATUS = 'NONPAID';

    protected const STATUS_LABEL = [
        self::PAID_STATUS => 'پرداخت شده',
        self::NONPAID_STATUS  => 'پرداخت نشده',
    ];


    public function getStatusLabel()
    {
        return self::STATUS_LABEL[$this->status] ?? null;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isPaid(): bool
    {
        return (bool)($this->status === self::PAID_STATUS);
    }

    public function getAmountAttribute($value)
    {
        return number_format((int)$value) ?? 0;
    }

    public function getCreatedAtAttribute($value)
    {
        return verta($value);
    }

}
