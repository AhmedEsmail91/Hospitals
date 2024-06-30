<?php

namespace Database\Seeders;
use \App\Models\User;
use Database\Factories\UserCountFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        $this->call([
            UserSeeder::class,
            AdminSeeder::class,
            SectionSeeder::class,
            ArTranslations::class,
            ImageSeeder::class,
            DoctorSeeder::class,
            
        ]);
        // $this->call(UserCountSeeder::class);
        
    }
}
