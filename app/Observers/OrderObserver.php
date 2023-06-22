<?php

namespace App\Observers;

use App\Jobs\SendNewUserOrderToHoloo;
use App\Models\Order;
use App\Settings\SettingStorage;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Str;
use App\Uilits\SMSTools;


class OrderObserver
{
    use DispatchesJobs;

    public function creating(Order $order)
    {
        if (empty($order->order_number)) {
            $order->order_number = Str::uuid()->toString();
        }
    }

    /**
     * Handle the Order "created" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function created(Order $order)
    {
        $text = "سفارش جدید با شماره {$order->id} از طرف حساب {$order->user->mobile} ایجاد شد";
        (new SMSTools())->text($text)->to("09163777797,09163986608")->send();
    }

    /**
     * Handle the Order "updated" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function updated(Order $order)
    {
        //
    }

    /**
     * Handle the Order "deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function deleted(Order $order)
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function restored(Order $order)
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function forceDeleted(Order $order)
    {
        //
    }
}
