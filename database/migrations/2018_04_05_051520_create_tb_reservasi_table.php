<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbReservasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_reservasi', function (Blueprint $table) {
            $table->increments('id_reservasi');
            $table->unsignedInteger('id_restoran');
            $table->unsignedInteger('id_pelanggan');
            $table->unsignedInteger('id_pegawai');
            $table->string('no_meja_reservasi');
            $table->string('status_reservasi');
            $table->timestamps();
            $table->unsignedInteger('deleted');

            $table->foreign('id_restoran')->references('id_restoran')->on('tb_restoran');
            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('tb_pelanggan');
            $table->foreign('id_pegawai')->references('id_pegawai')->on('tb_pegawai');
        });
        DB::statement("ALTER TABLE tb_reservasi MODIFY id_pegawai INT(10) unsigned DEFAULT 0;");
        DB::statement("ALTER TABLE tb_reservasi MODIFY status_reservasi ENUM('Selesai', 'Batal', 'Sedang Berlangsung', 'Menunggu Konfirmasi', 'Dikonfirmasi') DEFAULT 'Menunggu Konfirmasi';");
        DB::statement("ALTER TABLE tb_reservasi MODIFY no_meja_reservasi VARCHAR(255) DEFAULT NULL;");
        DB::statement("ALTER TABLE tb_reservasi MODIFY deleted INT(1) DEFAULT 0;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_reservasi');
    }
}
