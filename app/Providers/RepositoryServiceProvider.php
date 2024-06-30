<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
//Interfaces:
use App\Interfaces\Sections\SectionRepositoryInterface;
use App\Interfaces\Doctors\DoctorRepositoryInterface;
//Repositories:
use App\Repository\Doctors\DoctorRepository;
use App\Repository\Sections\SectionRepository;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(SectionRepositoryInterface::class, SectionRepository::class); // bind the interface to the repository which implements it
        $this->app->bind(DoctorRepositoryInterface::class, DoctorRepository::class); // bind the interface to the repository which implements it
        
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
