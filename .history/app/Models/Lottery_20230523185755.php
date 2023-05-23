<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lottery extends Model
{
    use HasFactory;

    public function stocks()
    {
        return $this->hasMany(LotteryStock::class);
    }

    public function prizes()
    {
        return $this->hasMany(LotteryPrize::class);
    }
    
    function isPast()
    { 
        return Carbon::parse($this->end_at)->lte(Carbon::now());
    }


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
