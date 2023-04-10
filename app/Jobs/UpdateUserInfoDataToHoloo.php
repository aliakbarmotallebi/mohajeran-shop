<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Services\CustomerService;
use App\Models\User;

class UpdateUserInfoDataToHoloo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    
    public $tries = 5;
    
    
    protected User $user;


    protected $fieldsChanges;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {

        $field = $user->getChanges();

        $this->fieldsChanges = [
            'name'     => $field['name'] ?? NULL, 
            'tel'      => $field['tel'] ?? NULL, 
            'address'  => $field['address'] ?? NULL, 
            'zip_code' => $field['zipcode'] ?? NULL, 
            'moreaddress' => json_decode($field['addresses']?? NULL) ?? NULL, 
        ];

        $this->user = $user;
    }
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(CustomerService $service)
    {

        $service->update($this->user->erp_code ,  $this->fieldsChanges);
    }
}
