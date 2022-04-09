<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Rasheed',
            'email' => 'rasheedbouhamdan@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'phone_number' => '70396828'
        ]);
        DB::table('users')->insert([
            'name' => 'Nadia',
            'email' => 'nadiaharb@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => '2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'pharmacy_name' => 'Pharmacy Nadia',
            'pharmacy_address' => 'Baakline, El-Shouf',
            'phone_number' => '03010203'
        ]);
        DB::table('users')->insert([
            'name' => 'Ahmad',
            'email' => 'ahmad@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => '3',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'phone_number' => '71213141'
        ]);

    }
}
