<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        DB::table('users')->insert
        ([
            'name'=>'gmdv123',
            'email'=>'imaearth289@gmail.com',
            'password'=>bcrypt('trangjoe8426'),
            'level'=>'1'
        ]);
    }
}
