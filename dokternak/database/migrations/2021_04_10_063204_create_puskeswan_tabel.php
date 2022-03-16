<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePuskeswanTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puskeswan', function (Blueprint $table) {
            $table->string('id_puskeswan',11);
            $table->string('nama_puskeswan',100);
            $table->string('alamat',255);
            $table->string('jam_kerja',255);
            $table->string('gambar');
            $table->string('maps',100);
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
        Schema::dropIfExists('puskeswan_tabel');
    }
}
