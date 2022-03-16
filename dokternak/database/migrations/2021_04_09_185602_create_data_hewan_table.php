<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataHewanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('data_hewan');
        Schema::create('data_hewan', function (Blueprint $table) {
            $table->increments('id_hewan',11);
            $table->string('nama_hewan',50);
            $table->string('ras_hewan',30);
            $table->integer('usia')->unsigned();
            $table->text('keterangan');
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
        Schema::dropIfExists('data_hewan');
    }
}
