<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Events\MainGroupWasPulledFromTheServiceEvent;
use App\Services\MainGroupService;

class GetMainGroups extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'holoo:main-groups';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get list all the main groups through api HOLOO && store in the table main_groups';

    protected MainGroupService $mainGroupService;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(MainGroupService $mainGroupService)
    {
        parent::__construct();

        $this->mainGroupService = $mainGroupService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $category = $this->mainGroupService->all();
        event(new MainGroupWasPulledFromTheServiceEvent($category));
    }

}
