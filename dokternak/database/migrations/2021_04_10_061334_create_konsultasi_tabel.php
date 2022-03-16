<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonsultasiTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konsultasi', function (Blueprint $table) {
            $table->string('id_konsultasi',11);
            $table->integer('id_peternak',11);
            $table->string('id_dokter',11);
            $table->string('id_kategori',11);
            $table->string('id_ktg',11);
            $table->string('nama_hewan',30);
            $table->string('keluhan',255);
            $table->date('tanggal');
            $table->string('status_kirim',30);
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
        Schema::dropIfExists('konsultasi_tabel');
    }
}
