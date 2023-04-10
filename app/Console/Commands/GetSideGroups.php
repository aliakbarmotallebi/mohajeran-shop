<?php

namespace App\Console\Commands;

use App\Events\SideGroupWasPulledFromTheServiceEvent;
use App\Services\SideGroupService;
use Illuminate\Console\Command;

class GetSideGroups extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'holoo:side-groups';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get list all the side groups through api HOLOO && store in the table side_groups';


    protected SideGroupService $sideGroupService;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(SideGroupService $sideGroupService)
    {
        parent::__construct();

        $this->sideGroupService = $sideGroupService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $subcategory = $this->sideGroupService->all();
        event(new SideGroupWasPulledFromTheServiceEvent($subcategory));
    }
}
