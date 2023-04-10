<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Repositories\MainGroupRepository;

class SavedMainGroup
{
    protected MainGroupRepository $repository;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(MainGroupRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        if(! isset($event->categories['mainGroup']) ){
            return false;
        }

        $this->repository->createMultiple($event->categories['mainGroup']);
    }
}
