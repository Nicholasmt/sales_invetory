<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(['role_id' => 1, 'first_name' => 'Francis', 'last_name' => 'Mec', 'email' => 'admin@gmail.com', 'address' => 'enugu', 'phone' => '090457654846', 'password'=> Hash::make('12345678')]);
        DB::table('users')->insert(['role_id' => 2, 'first_name' => 'Faith', 'last_name' => 'Ngozi', 'email' => 'saler@gmail.com', 'address' => 'Anambra', 'phone' => '090485746846', 'password'=> Hash::make('12345678')]);
 
    }
}
