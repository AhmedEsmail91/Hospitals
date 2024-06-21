<?php

namespace Database\Seeders;

use App\Models\Admin;
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
        $main_user=['name'=>'Ahmed User','email'=>'ahmed@yahoo.com','password'=>Hash::make('12345678')];
        if(!in_array($main_user['email'], \App\Models\User::select('email')->pluck('email')->toArray())){
            \App\Models\User::create($main_user);
        }
        \App\Models\User::factory(random_int(1,6))->create();
    }
}
