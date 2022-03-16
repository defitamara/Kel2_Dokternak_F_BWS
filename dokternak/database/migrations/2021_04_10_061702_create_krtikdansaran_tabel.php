<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKrtikdansaranTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('krtik_dan_saran', function (Blueprint $table) {
            $table->integer('id_ks',11);
            $table->date('tanggal');
            $table->text('komentar');
            $table->string('nama',50);
            $table->string('email_hp',20);
            $table->string('pekerjaan',30);
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
        Schema::dropIfExists('krtikdansaran_tabel');
    }
}
