<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Dokumentasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumentasi', function (Blueprint $table) {
            $table->increments('id_dokumentasi');
            $table->string('judul',30);
            $table->string('keterangan',50);
            $table->string('dokumentasi');
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
        Schema::dropIfExists('dokumentasi');
    }
}