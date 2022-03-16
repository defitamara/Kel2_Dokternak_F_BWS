<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Dokter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokter', function (Blueprint $table) {
            $table->increments('id_dokter');
            $table->string('nama_dokter',50);
            $table->string('email',30);
            $table->string('jenis_kelamin',30);
            $table->text('alamat');
            $table->string('tempat',50);
            $table->string('telpon');
            $table->string('foto');
            $table->string('sertifikasi');
            $table->string('id_jabatan',11);
            $table->text('jadwal_kerja');
            $table->string('username',50);
            $table->string('password',30);
            $table->string('verifikasi',10);
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
        Schema::dropIfExists('dokter');
    }
}