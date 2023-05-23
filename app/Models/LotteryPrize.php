<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LotteryPrize extends Model
{
    use HasFactory;

    public function getImageUrlAttribute($value)
    {
        return asset($value);
    }

    public function isAcceptedStatus(): string
    {
        return 'PUBLISH';
    }

    public function isRejectedStatus(): string
    {
        return 'UN_PUBLISH';
    }

    /**
     * @return void
     */
    public function press(): void {
        
        $status = $this->isAcceptedStatus();

        if ($this->status == $this->isAcceptedStatus()) {

            $status = $this->isRejectedStatus();
        }
        $this->status = $status;
        $this->save();
    }

}
