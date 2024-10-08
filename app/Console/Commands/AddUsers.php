<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AddUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:add-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adding Some Users using factory';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->call('db:seed', ['--class' => 'UserSeeder']);
        return;
        
    }
}
