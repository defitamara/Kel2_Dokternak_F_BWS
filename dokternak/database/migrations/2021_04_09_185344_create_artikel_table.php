<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtikelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artikel', function (Blueprint $table) {
            $table->increments('id_artikel',10);
            $table->string('id_ktg',10);
            $table->date('tanggal');
            $table->string('nama_penulis',30);
            $table->string('judul',225);
            $table->text('isi');
            $table->string('gambar');
            $table->string('sumber',225);
            $table->string('status',30);
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
        Schema::dropIfExists('artikel');
    }
}
