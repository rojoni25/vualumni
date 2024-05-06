<?php

namespace App\Console;

use App\Models\User;
use App\Notifications\BirthdayWishes;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Notification;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();

    $schedule->call(function () {
        $today = Carbon::now()->format('m-d');
        $users = User::whereRaw("DATE_FORMAT(dob, '%m-%d') = '$today'")->get();
        Notification::send($users, new BirthdayWishes());
    })->daily();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
