<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMusimTelur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('musim_telur', function (Blueprint $table) {
            $table->bigIncrements('id_musim_telur');
            $table->unsignedBigInteger('id_konsumen');
            $table->date('tgl_mulai');
            $table->integer('lama_pelaksanaan');
            $table->integer('jml_target');
            $table->integer('jml_terpenuhi');
            $table->char('status_penyelesaian');
            $table->timestamps();
            $table->foreign('id_konsumen')
                ->references('id_konsumen')
                ->on('konsumen')
                ->onUpdate('cascade');
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
