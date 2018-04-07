<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbDetilPemesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_detil_pemesanan', function (Blueprint $table) {
            $table->increments('id_detil_pemesanan');
            $table->unsignedInteger('id_pemesanan');
            $table->unsignedInteger('id_hidangan');
            $table->unsignedInteger('jumlah_hidangan');
            $table->unsignedInteger('total_harga_hidangan');
            $table->timestamps();

            $table->foreign('id_pemesanan')->references('id_pemesanan')->on('tb_pemesanan');
            $table->foreign('id_hidangan')->references('id_hidangan')->on('tb_hidangan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_detil_transaksi');
    }
}
