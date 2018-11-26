<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Waseem',
            'email' => 'waseemdawood@gmail.com',
            'password' => bcrypt('auth'),
        ]);
        DB::table('users')->insert([
            'name' => 'Tinman',
            'email' => 'info@tinmandigital.co.za',
            'password' => bcrypt('password'),
        ]);
    }
}
