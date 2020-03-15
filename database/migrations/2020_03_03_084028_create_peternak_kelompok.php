<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeternakKelompok extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peternak', function (Blueprint $table) {
            $table->bigIncrements('id_peternak');
            $table->unsignedBigInteger('id');
            $table->char('jenis_kel');
            $table->string('foto_kandang')->nullable();
            $table->integer('jml_bebek');
            $table->integer('jml_pakan');
            $table->timestamps();
            $table->foreign('id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade');
        });

        Schema::create('kelompok', function (Blueprint $table) {
            $table->bigIncrements('id_kelompok');
            $table->unsignedBigInteger('id_peternak');
            $table->string('nama');
            $table->integer('status_konfirmasi');
            $table->integer('status_anggota');
            $table->timestamps();
            $table->foreign('id_peternak')
                ->references('id_peternak')
                ->on('peternak')
                ->onUpdate('cascade');
        });

        Schema::create('hasil_ternak', function (Blueprint $table) {
            $table->bigIncrements('id_hasil_ternak');
            $table->unsignedBigInteger('id_peternak');
            $table->string('nama_hasil');
            $table->char('jenis_hasil');
            $table->string('deskripsi');
            $table->char('metode_bayar');
            $table->char('metode_kirim');
            $table->integer('harga_jual');
            $table->string('foto_produk');
            $table->integer('persediaan');
            $table->timestamps();
            $table->foreign('id_peternak')
                ->references('id_peternak')
                ->on('peternak')
                ->onUpdate('cascade');
        });

        Schema::create('tambah_hasil_ternak', function (Blueprint $table) {
            $table->bigIncrements('id_tambah_hasil_ternak');
            $table->unsignedBigInteger('id_hasil_ternak');
            $table->date('tgl_penambahan');
            $table->integer('jml_penambahan');
            $table->integer('harga_jual');
            $table->timestamps();
            $table->foreign('id_hasil_ternak')
                ->references('id_hasil_ternak')
                ->on('hasil_ternak')
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
