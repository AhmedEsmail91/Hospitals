<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UserCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:user-count';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is used to count the number of users in the database each an hour';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->call('db:seed', ['--class' => 'UserCountSeeder']);
        return;
    }
    public function schedule(\Illuminate\Console\Scheduling\Schedule $schedule)
    {
        $schedule->command($this->signature)->everyMinute();
    }
}
