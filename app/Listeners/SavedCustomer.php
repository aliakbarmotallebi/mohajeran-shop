<?php

namespace App\Listeners;

use App\Events\CustomerWasPulledFromTheServiceEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Repositories\CustomerRepository;

class SavedCustomer
{
    protected CustomerRepository $repository;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(CustomerRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(CustomerWasPulledFromTheServiceEvent $event)
    {
        if(! isset($event->customer['customer']) ){
            return false;
        }

        $this->repository->createMultiple($event->customer['customer']);
    }
}
