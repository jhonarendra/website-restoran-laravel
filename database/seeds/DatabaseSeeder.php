<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_pelanggan')->insert([
        	'nama_pelanggan' => 'Lorem Ipsum',
        	'email_pelanggan' => 'loremipsum@mail.app',
        	'username_pelanggan' => 'loremipsum',
        	'password_pelanggan' => bcrypt('jonajona'),
        	'created_at' => date("Y-m-d H:i:s"),
        	'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('tb_pelanggan')->insert([
            'nama_pelanggan' => 'Lorem Ipsum2',
            'email_pelanggan' => 'loremipsum2@mail.app',
            'username_pelanggan' => 'loremipsum2',
            'password_pelanggan' => bcrypt('jonajona'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('tb_pegawai')->insert([
            'nama_pegawai' => 'Tidak Dipilih',
            'email_pegawai' => 'Tidak Ada',
            'username_pegawai' => 'Tidak Ada',
            'password_pegawai' => 'Tidak Ada',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('tb_pegawai')->insert([
        	'nama_pegawai' => 'Jhonarendra',
        	'email_pegawai' => 'jhonarendra@gmail.com',
        	'username_pegawai' => 'jhonarendra',
        	'password_pegawai' => bcrypt('jonajona'),
        	'created_at' => date("Y-m-d H:i:s"),
        	'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('tb_restoran')->insert([
            'nama_restoran' => 'Restoran Bukit',
            'alamat_restoran' => 'Jalan Kampus Unud',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('tb_restoran')->insert([
            'nama_restoran' => 'Restoran Sudirman',
            'alamat_restoran' => 'Jalan PB Sudirman',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('tb_hidangan')->insert([
            'nama_hidangan' => 'Nasi Goreng',
            'jenis_hidangan' => 'Makanan',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
