<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataObatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('data_obat');
        Schema::create('data_obat', function (Blueprint $table) {
            $table->increments('id_obat',10);
            $table->string('nama_obat',50);
            $table->integer('stok')->length(30)->unsigned();
            $table->string('supplier',30);
            $table->date('expired');
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
        Schema::dropIfExists('data_obat');
    }
}
