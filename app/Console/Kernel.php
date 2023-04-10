<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Carbon\Carbon;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

    //     $schedule->command('fetch:products')
    //       ->everyFiveMinutes()
    //       ->timezone('Asia/Tehran')
    //     //   ->between('8:00', '23:50')
		  //->after(function () {
    //          settings(['LAST_TIME_FETCH_PRODCUTS' => Carbon::now()]);
    //      });
         
    //      \Log::debug('run schedule :/');
		 
    //     $schedule->command('fetch:customers')
    //       ->everyFiveMinutes()
    //       ->timezone('Asia/Tehran')
    //     //   ->between('8:00', '23:50')
		  //->after(function () {
    //          settings(['LAST_TIME_FETCH_CUSTOMERS' => Carbon::now()]);
    //      });
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
