<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DokterPuskeswan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokter_puskeswan', function (Blueprint $table) {
            $table->increments('id_dp');
            $table->string('id_puskeswan',11);
            $table->integer('id_dokter');
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
        Schema::dropIfExists('dokter_puskeswan');
    }
}
