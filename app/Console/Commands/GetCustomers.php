<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\CustomerService;
use App\Events\CustomerWasPulledFromTheServiceEvent;



class GetCustomers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'holoo:customers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get list all the customers through api HOLOO && store in the table customers';


    protected CustomerService $customer;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(CustomerService $customer)
    {
        parent::__construct();

        $this->customer = $customer;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('The run service customers ...');
        $products = $this->customer->all();
        event(new CustomerWasPulledFromTheServiceEvent($products));
        $this->info('finish service customers');
    }
}
