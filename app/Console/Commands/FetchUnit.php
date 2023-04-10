<?php

namespace App\Console\Commands;

use App\Repositories\UnitRepository;
use App\Services\UnitService;
use Illuminate\Console\Command;

class FetchUnit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:unit';

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
    public function __construct(UnitService $service, UnitRepository $repository)
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
        $units = $this->service->all();

        if(! isset($units['unit']) ){
            return false;
        }

        $this->repository->createMultiple($units['unit']);
    }
}
