<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokterRekammedikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('data_obat');
        Schema::create('dokter_rekammedik', function (Blueprint $table) {
            $table->increments('id_dokmed',11);
            $table->string('id_dokter', 11);
            $table->integer('id_rmd')->length(11)->unsigned();
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
        Schema::dropIfExists('detail_rekammedik');
    }
}
