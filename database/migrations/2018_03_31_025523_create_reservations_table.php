<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id_reservation');
            $table->unsignedInteger('id_pelanggan');
            $table->unsignedInteger('id_admin');
            $table->string('no_meja_reservasi');
            $table->string('status_reservasi');
            $table->timestamps();

            Schema::disableForeignKeyConstraints();  
            $table->foreign('id_pelanggan')->references('id')->on('users');
            $table->foreign('id_admin')->references('id')->on('users');
        });
        DB::statement("ALTER TABLE reservations MODIFY id_admin INT(10) unsigned DEFAULT NULL;");
        DB::statement("ALTER TABLE reservations MODIFY status_reservasi ENUM('Selesai', 'Batal', 'Sedang Berlangsung', 'Menunggu Konfirmasi', 'Dikonfirmasi') DEFAULT 'Menunggu Konfirmasi';");
        DB::statement("ALTER TABLE reservations MODIFY no_meja_reservasi VARCHAR(255) DEFAULT NULL;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservation');
    }
}
