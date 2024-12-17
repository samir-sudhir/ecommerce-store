<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        \App\Console\Commands\MakeService::class, // Register your custom command here
        \App\Console\Commands\MakePipeline::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        // Define the application's command schedule here
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
