<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Models\Temp;
use App\Repositories\ProductRepository;
use App\Services\ProductService;
use Illuminate\Console\Command;

class FetchProductList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';


    private $service;


    private $repository;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ProductService $service, ProductRepository $repository)
    {
        parent::__construct();

        $this->service    = $service;

        $this->repository = $repository;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $products = $this->service->all();

        if(! isset($products['product']) ){
            return false;
        }

        $this->repository->createMultiple($products['product']);
    }
}
