<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
//use Laravel\Lumen\Console\Kernel as ConsoleKernel;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\Spider\ConstructionCommand::class,
        \App\Console\Commands\Spider\RailwayCommand::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('spider:construction')->daily();
        // $schedule->command('spider:railway')->daily();
    }
}
