<?php

namespace App\Jobs\Webhook;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Webhook\WebhookProcessor;
use App\Repositories\ProductRepository;

class HandleDataProduct implements ShouldQueue
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
    public function handle(ProductRepository $product)
    {
        $fields = $this->processor->fields();

        if( ! is_array($fields) ) return false;
    // \Log::debug($fields);
        foreach ( $fields as  $field) {
            \Log::debug("handle");
     \Log::debug($field);
            // if($this->processor->isActionUpdated()){
            //      \Log::debug('UPDATED_PRODUCT');
            //     $product->update($field['ErpCode'], $field);
            // }
    
            // if($this->processor->isActionCreated()){
            //      \Log::debug('CREATED_PRODUCT');
            //     $product->create($field);
            // }
    
            // if($this->processor->isActionDeleted()){
            //      \Log::debug('DEL_PRODUCT');
            //     $product->delete($field['ErpCode']);
            //     continue;
            // }
            
            $product->createOrUpdate($field);
            
        }
    }
}
