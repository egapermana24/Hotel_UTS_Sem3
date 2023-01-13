<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penginap', function (Blueprint $table) {
            $table->increments('id_penginap');
            $table->date('tgl_masuk');
            $table->date('tgl_keluar');
            $table->integer('lama_inap');
            $table->string('nm_penginap', 40);
            $table->string('kd_kamar', 15);
            $table->integer('jumlah');
            $table->double('diskon');
            $table->double('pajak');
            $table->double('total');
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
        Schema::dropIfExists('penginap');
    }
};
