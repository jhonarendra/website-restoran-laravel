<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbPelangganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pelanggan', function (Blueprint $table) {
            $table->increments('id_pelanggan');
            $table->string('nama_pelanggan');
            $table->string('email_pelanggan');
            $table->string('username_pelanggan');
            $table->string('password_pelanggan');
            $table->string('foto_pelanggan');
            $table->string('remember_token');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE tb_pelanggan MODIFY remember_token VARCHAR(255) DEFAULT NULL;");
        DB::statement("ALTER TABLE tb_pelanggan MODIFY foto_pelanggan VARCHAR(255) DEFAULT NULL;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_pelanggan');
    }
}
