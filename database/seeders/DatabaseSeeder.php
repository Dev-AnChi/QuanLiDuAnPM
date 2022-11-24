<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
       $data = [
           [
               'email' => 'lxc150896@gmail.com',
               'password' => bcrypt('12345'),
           ],
           [
               'email' => 'lxc@gmail.com',
               'password' => bcrypt('12345'),
           ],
           [
               'email' => 'admin@gmail.com',
               'password' => bcrypt('12345'),
           ],
       ];
       DB::table('loyal_customers')->insert($data);
    }
}
