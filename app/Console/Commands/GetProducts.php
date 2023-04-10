<?php

namespace App\Console\Commands;

use App\Events\ProductWasPulledFromTheServiceEvent;
use App\Services\ProductService;
use Illuminate\Console\Command;
use App\Settings\SettingStorage;

class GetProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'holoo:products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get list all the products through api HOLOO && store in the table prodcuts';


    protected ProductService $product;
    

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ProductService $product)
    {
        parent::__construct();

        $this->product = $product;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('The run service products ...');     
        $products = $this->product->all();
        event(new ProductWasPulledFromTheServiceEvent($products));
        $this->info('finish service product');
    }

    
}
