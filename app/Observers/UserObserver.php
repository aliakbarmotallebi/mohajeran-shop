<?php

namespace App\Observers;

use App\Models\User;
use App\Jobs\SendNewUserDataToHoloo;
use App\Jobs\UpdateUserInfoDataToHoloo;
use Illuminate\Foundation\Bus\DispatchesJobs;

class UserObserver
{
    use DispatchesJobs;


    protected $perfixName = ''; 


    public function creating(User $user)
    {
        //$this->perfixName = "{$user->mobile}_";

        $user->name = $user->mobile;
    }

    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        $this->dispatch( (new SendNewUserDataToHoloo($user)));
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        $this->dispatch( (new UpdateUserInfoDataToHoloo($user) ));
    }
    
    
        /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function saved(User $user)
    {
        \Log::debug("saved");
        \Log::debug($user);
        $this->dispatch( (new UpdateUserInfoDataToHoloo($user) ));
    }


    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
