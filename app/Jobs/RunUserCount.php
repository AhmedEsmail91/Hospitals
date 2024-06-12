<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;

class RunUserCount implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public User $user, public Admin $admin)
    {
        //
    }


    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Artisan::call('app:user-count');
    }
}
