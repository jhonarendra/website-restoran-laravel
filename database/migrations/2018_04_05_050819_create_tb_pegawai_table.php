<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbPegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pegawai', function (Blueprint $table) {
            $table->increments('id_pegawai');
            $table->string('nama_pegawai');
            $table->string('email_pegawai');
            $table->string('username_pegawai');
            $table->string('password_pegawai');
            $table->string('jabatan_pegawai');
            $table->string('foto_pegawai');
            $table->string('remember_token');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE tb_pegawai MODIFY jabatan_pegawai ENUM('Admin', 'Super Admin') DEFAULT 'Admin';");
        DB::statement("ALTER TABLE tb_pegawai MODIFY remember_token VARCHAR(255) DEFAULT NULL;");
        DB::statement("ALTER TABLE tb_pegawai MODIFY foto_pegawai VARCHAR(255) DEFAULT NULL;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_pegawai');
    }
}
