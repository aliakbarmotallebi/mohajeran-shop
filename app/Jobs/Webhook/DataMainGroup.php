<?php

namespace App\Jobs\Webhook;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Webhook\WebhookProcessor;
use App\Repositories\MainGroupRepository;

class DataMainGroup implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

      protected WebhookProcessor $processor;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(WebhookProcessor $processor)
    {
        $this->processor = $processor;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(MainGroupRepository $rep)
    {
        $fields = $this->processor->fields();

        if( ! is_array($fields) ) return false;


        foreach ( $fields as  $field) {
            if(!$this->processor->isActionDeleted()){
              $rep->update($field['ErpCode'], $field);
            }else{
              $rep->delete($field['ErpCode']);
            }
            
        }
    }
}
