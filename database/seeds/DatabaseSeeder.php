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
        // PELANGGAN
        DB::table('tb_pelanggan')->insert([
        	'nama_pelanggan' => 'Lorem Ipsum',
        	'email_pelanggan' => 'loremipsum@mail.app',
        	'username_pelanggan' => 'loremipsum',
        	'password_pelanggan' => md5('jonajona'),
            'foto_pelanggan' => 'default.png',
        	'created_at' => date("Y-m-d H:i:s"),
        	'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('tb_pelanggan')->insert([
            'nama_pelanggan' => 'Lorem Ipsum2',
            'email_pelanggan' => 'loremipsum2@mail.app',
            'username_pelanggan' => 'loremipsum2',
            'password_pelanggan' => md5('jonajona'),
            'foto_pelanggan' => 'default.png',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        // PEGAWAI
        DB::table('tb_pegawai')->insert([
            'nama_pegawai' => 'Tidak Dipilih',
            'email_pegawai' => 'Tidak Ada',
            'username_pegawai' => 'Tidak Ada',
            'password_pegawai' => 'Tidak Ada',
            'foto_pegawai' => 'close.png',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('tb_pegawai')->insert([
        	'nama_pegawai' => 'Jhonarendra',
        	'email_pegawai' => 'jhonarendra@gmail.com',
        	'username_pegawai' => 'jhonarendra',
        	'password_pegawai' => md5('jonajona'),
            'foto_pegawai' => 'default.png',
        	'created_at' => date("Y-m-d H:i:s"),
        	'updated_at' => date("Y-m-d H:i:s")
        ]);

        // RESTORAN
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

        // HIDANGAN
        DB::table('tb_hidangan')->insert([
            'nama_hidangan' => 'Spageti',
            'jenis_hidangan' => 'Makanan',
            'harga_hidangan' => 45000,
            'foto_hidangan' => 'spageti.jpg',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('tb_hidangan')->insert([
            'nama_hidangan' => 'Salad',
            'jenis_hidangan' => 'Makanan',
            'harga_hidangan' => 27500,
            'foto_hidangan' => 'salad.jpeg',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('tb_hidangan')->insert([
            'nama_hidangan' => 'Beef',
            'jenis_hidangan' => 'Makanan',
            'harga_hidangan' => 100000,
            'foto_hidangan' => 'beef.jpg',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('tb_hidangan')->insert([
            'nama_hidangan' => 'Pinneaple Juice',
            'jenis_hidangan' => 'Minuman',
            'harga_hidangan' => 12500,
            'foto_hidangan' => 'pinepple.jpg',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('tb_hidangan')->insert([
            'nama_hidangan' => 'Strawberry Juice',
            'jenis_hidangan' => 'Minuman',
            'harga_hidangan' => 15000,
            'foto_hidangan' => 'heart.jpg',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('tb_hidangan')->insert([
            'nama_hidangan' => 'Tropical Juice',
            'jenis_hidangan' => 'Minuman',
            'harga_hidangan' => 20000,
            'foto_hidangan' => 'tropical.jpg',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        // RESERVASI
        DB::table('tb_reservasi')->insert([
            'id_restoran' => '1',
            'id_pelanggan' => '1',
            'id_pegawai' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('tb_reservasi')->insert([
            'id_restoran' => '2',
            'id_pelanggan' => '1',
            'id_pegawai' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('tb_reservasi')->insert([
            'id_restoran' => '2',
            'id_pelanggan' => '1',
            'id_pegawai' => '2',
            'no_meja_reservasi' => '202',
            'status_reservasi' => 'Selesai',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        // PEMESANAN
        DB::table('tb_pemesanan')->insert([
            'id_restoran' => '1',
            'id_pelanggan' => '1',
            'id_pegawai' => '1',
            'total_pemesanan' => 107500,
            'status_pemesanan' => 'Belum Dibayar',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        // DETIL PEMESANAN
        DB::table('tb_detil_pemesanan')->insert([
            'id_pemesanan' => '1',
            'id_hidangan' => '1',
            'jumlah_hidangan' => '1',
            'total_harga_hidangan' => 45000,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('tb_detil_pemesanan')->insert([
            'id_pemesanan' => '1',
            'id_hidangan' => '2',
            'jumlah_hidangan' => '1',
            'total_harga_hidangan' => 27500,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('tb_detil_pemesanan')->insert([
            'id_pemesanan' => '1',
            'id_hidangan' => '5',
            'jumlah_hidangan' => '1',
            'total_harga_hidangan' => 15000,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('tb_detil_pemesanan')->insert([
            'id_pemesanan' => '1',
            'id_hidangan' => '6',
            'jumlah_hidangan' => '1',
            'total_harga_hidangan' => 20000,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
