<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
        	'name' => 'Jhonarendra',
        	'email' => 'jhonarendra@gmail.com',
        	'password' => bcrypt('jonajona'),
        	'jabatan' => 'Admin',
        	'created_at' => date("Y-m-d H:i:s"),
        	'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('users')->insert([
        	'name' => 'Lorem Ipsum',
        	'email' => 'loremipsum@mail.app',
        	'password' => bcrypt('jonajona'),
        	'jabatan' => 'Pelanggan',
        	'created_at' => date("Y-m-d H:i:s"),
        	'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('reservations')->insert([
        	'id_pelanggan' => '2',
        	'no_meja_reservasi' => '203A',
        	'created_at' => date("Y-m-d H:i:s"),
        	'updated_at' => date("Y-m-d H:i:s")
        ]);

    }
}
