<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeternakTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peternak', function (Blueprint $table) {
            $table->integer('id_peternak')->primary();
            $table->string('namadepan_peternak',15);
            $table->string('namabelakang_peternak',30);
            $table->string('email_peternak',20);
            $table->string('no_hp',13);
            $table->string('jenis_kelamin',10);
            $table->text('alamat');
            $table->string('foto_peternak');
            $table->integer('id_user');
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
        Schema::dropIfExists('peternak_tabel');
    }
}
