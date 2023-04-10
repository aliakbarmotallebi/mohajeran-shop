<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Repositories\SideGroupRepository;

class SavedSideGroup
{

    protected SideGroupRepository $repository;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(SideGroupRepository $repository)
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
        if(! isset($event->subcategories['sideGroup']) ){
            return false;
        }

        $this->repository->createMultiple($event->subcategories['sideGroup']);
    }
}
