<?php

namespace App\Listeners;

use App\Events\ProductWasPulledFromTheServiceEvent;
use App\Repositories\ProductRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SavedProduct
{
    protected ProductRepository $repository;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(ProductWasPulledFromTheServiceEvent $event)
    {
        if(! isset($event->product['product']) ){
            return false;
        }

        $this->repository->createMultiple($event->product['product']);
    }
}
