<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RekamMedikTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekam_medik', function (Blueprint $table) {
            $table->string('id_rmd',11);
            $table->date('tanggal');
            $table->string('id_kategori',11);
            $table->string('id_ktg',11);
            $table->string('nama_hewan',11);
            $table->string('nama_peternak',30);
            $table->text('alamat');
            $table->text('keluhan');
            $table->string('diagnosa',100);
            $table->string('pelayanan',50);
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
        //
    }
}
