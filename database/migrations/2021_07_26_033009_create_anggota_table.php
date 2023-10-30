<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota', function (Blueprint $table) {
            $table->id();
            $table->string('id_lokal')->unique();
            $table->string('nama');
            $table->string('kode_reg')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('no_hp');
            $table->string('alamat')->nullable();
            $table->string('kendaraan_jenis')->nullable();
            $table->string('kendaraan_warna')->nullable();
            $table->string('kendaraan_nopol')->nullable();
            $table->string('kendaraan_tahun')->nullable();
            $table->date('tgl_reg_tksci')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggota');
    }
}
