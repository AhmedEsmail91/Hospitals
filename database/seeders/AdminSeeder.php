<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Admin::factory(1)->create(
            [
                'name' => 'Ahmed Admin',
                'email' => 'admin@yahoo.com',
                'password' => Hash::make('12345678'),
            ]);
    }
}
