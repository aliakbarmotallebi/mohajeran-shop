<?php

namespace App\Console\Commands;

use App\Repositories\ProductRepository;
use App\Services\ProductService;
use App\Settings\SettingStorage;
use Illuminate\Console\Command;

class CourierCost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:courier:cost {--code=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';


    private $settingStorage;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(SettingStorage $settingStorage)
    {
        parent::__construct();

        $this->settingStorage = $settingStorage;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(ProductService $service)
    {
        $product = $service->barcode($this->option('code'));

        if(! isset($product['product']) ){
            return 0;
        }

        if($this->settingStorage->get('MIN_ORDER_AMOUNT') <= 0 ){
            return 0;
        }

        $cost = $product['product'][0]['SellPrice'] ?? 20000;
        
        $this->settingStorage->set([
            'ERPCODE_COURIER_COST' => $product['product'][0]['ErpCode'],
            'PRICE_COURIER_COST'   => $this->setCost($cost)
        ]);
    }
    
    public function setCost($cost)
    {
        if($cost <= 10 ){
            return 0;
        }

        return substr($cost, 0, -1);
    }
}
