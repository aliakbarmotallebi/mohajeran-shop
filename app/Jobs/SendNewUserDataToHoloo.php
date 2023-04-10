<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Services\CustomerService;
use Illuminate\Support\Facades\Log;

class SendNewUserDataToHoloo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public $tries = 5;


    public $backoff = 200;


    protected User $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(CustomerService $service)
    {
        if ( $u = $service->getUserByMobile(
            $this->user->mobile
        )){
            return $this->user->update([
                'name'     => $u['Customer'][0]['Name'] ?? $this->user->mobile,
                'erp_code' => $u['Customer'][0]['ErpCode'],
            ]);
        }

        $service->create([
            'mobile' => $this->user->mobile,
            'name'   => $this->user->name,
        ]);
    }
}
