<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory(1)->create(
            [
                'name' => 'Ahmed User',
                'email' => 'user@yahoo.com',
                'password' => Hash::make('12345678'),
            ]
        );
        \App\Models\User::factory(10)->create();
    }
}
