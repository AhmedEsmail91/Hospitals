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
        $main_user=['name'=>'Ahmed Admin','email'=>'ahmed@yahoo.com','password'=>Hash::make('12345678')];
        if(!in_array($main_user['email'], \App\Models\Admin::select('email')->pluck('email')->toArray())){
            \App\Models\Admin::create($main_user);
        }
        \App\Models\Admin::factory(random_int(1,10))->create();
    }
}
