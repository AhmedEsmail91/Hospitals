<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserCountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $this->call(
        //     [
        //         UserSeeder::class,
        //         AdminSeeder::class,
        //     ]
        //     );
        DB::table("user_counts")->insert(
            [
            "name" => "Users",
            "count" => User::count(),
            "created_at"=> now(),
            "updated_at"=> now(),
            ]
        );
        DB::table("user_counts")->insert(
            [
            "name" => "Admins",
            "count" => Admin::count(),
            "created_at"=> now(),
            "updated_at"=> now(),
            ]
        );
        
    }
}
