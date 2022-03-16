<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DokumentasiPuskeswan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumentasi_puskeswan', function (Blueprint $table) {
            $table->increments('id_dokpus');
            $table->string('id_puskeswan',10);
            $table->string('id_dokumentasi',10);
            $table->timestamp('failed_at')->useCurrent();
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
        Schema::dropIfExists('dokumentasi_puskeswan');
    }
}