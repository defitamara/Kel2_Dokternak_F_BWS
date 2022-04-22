<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KoordinatorPuskeswan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('koordinator_puskeswan', function (Blueprint $table) {
            $table->increments('id_kp');
            $table->string('nama_kp',50);
            $table->string('jabatan',50);
            $table->string('jenis_kelamin',30);
            $table->string('telpon',15);
            $table->text('alamat');
            $table->string('foto');
            $table->string('id_puskeswan',11);
            $table->bigint('id',20);
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
    }
}
