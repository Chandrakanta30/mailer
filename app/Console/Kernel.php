<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

    protected $commands=[
        'App\Console\Commands\StartMailCommand',
        'App\Console\Commands\EndMailCommand'
    ];
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        $schedule->command('start:mail')->withoutOverlapping();
        // $promos = Promotions::all();

        // foreach ($promos as $promo) {
        //     $start_time = Carbon::parse($promo->start_time);
        //     $end_time = Carbon::parse($promo->end_time);

        //     if (!is_null($start_time) && $start_time->isCurrentMinute() && $promo->status = 0) {
        //         $schedule->command('start:promo')->when($start_time->isCurrentMinute())->withoutOverlapping();
        //     } elseif (!is_null($end_time) && $end_time->isCurrentMinute() && $promo->status = 1) {
        //         $schedule->command('end:promo')->when($end_time->isCurrentMinute())->withoutOverlapping();
        //     }
        // }
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
