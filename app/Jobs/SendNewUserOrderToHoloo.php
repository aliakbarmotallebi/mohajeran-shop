<?php

namespace App\Jobs;

use App\Http\Resources\Services\InvoiceInfoResource;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;
use App\Services\OrderService;

class SendNewUserOrderToHoloo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public $tries = 5;


    public $backoff = 200;


    protected Order $order;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(OrderService $service)
    {
        $r = $service->create( (new InvoiceInfoResource( $this->order ))->response()->getData(true) );
        // \Log::debug($r);
    }
}
