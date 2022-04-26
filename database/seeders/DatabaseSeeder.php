<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(['title' =>'Admin', 'privilege' => 1]);
        DB::table('roles')->insert(['title' =>'saler', 'privilege' => 2]);
    }
}
