<?php

namespace App\Providers;

use App\Events\CustomerNewPushToService;
use App\Events\CustomerWasPulledFromTheServiceEvent;
use App\Events\MainGroupWasPulledFromTheServiceEvent;
use App\Events\SideGroupWasPulledFromTheServiceEvent;
use App\Listeners\SavedCustomer;
use App\Listeners\SavedMainGroup;
use App\Listeners\SavedSideGroup;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\ProductWasPulledFromTheServiceEvent;
use App\Listeners\CustomerNewStore;
use App\Listeners\SavedProduct;
use App\Models\Order;
use App\Models\User;
use App\Observers\OrderObserver;
use App\Observers\UserObserver;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        ProductWasPulledFromTheServiceEvent::class => [
            SavedProduct::class,
        ],
        CustomerWasPulledFromTheServiceEvent::class => [
            SavedCustomer::class,
        ],
        MainGroupWasPulledFromTheServiceEvent::class => [
            SavedMainGroup::class,
        ],
        SideGroupWasPulledFromTheServiceEvent::class => [
            SavedSideGroup::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Order::observe(OrderObserver::class);
    }
}
