<?php

namespace App\Console\Commands;

use App\Repositories\CustomerRepository;
use App\Services\CustomerService;
use Illuminate\Console\Command;

class FetchCustomerList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:customers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(CustomerService $service, CustomerRepository $repository)
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
        $customers = $this->service->all();

        if(! isset($customers['Customer']) ){
            return false;
        }

        $this->repository->createMultiple($customers['Customer']);
    }
}
