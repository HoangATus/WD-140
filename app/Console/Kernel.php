<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
   
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('orders:auto-complete')->everyMinute();
    }
    
    /**
     * Đăng ký các lệnh của ứng dụng.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }

    /**
     * Đăng ký các lệnh console tùy chỉnh.
     */
    protected $commands = [
        \App\Console\Commands\AutoCompleteOrders::class, 
    ];
}
