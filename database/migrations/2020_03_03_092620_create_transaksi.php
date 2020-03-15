<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('pemesanan_in', function (Blueprint $table) {
            $table->bigIncrements('id_pemesanan_in');
            $table->unsignedBigInteger('id_peternak');
            $table->date('tgl_pemesanan');
            $table->integer('estimasi_sampai');
            $table->char('metode_bayar');
            $table->char('metode_kirim');
            $table->string('bukti_bayar');
            $table->char('konfirmasi_pesanan');
            $table->integer('total_biaya')->nullable();
            $table->timestamps();
            $table->foreign('id_peternak')
                ->references('id_peternak')
                ->on('peternak')
                ->onUpdate('cascade');
        });

        //===================================================================//

        Schema::create('rinc_in', function (Blueprint $table) {
            $table->bigIncrements('id_rinc_in');
            $table->unsignedBigInteger('id_pemesanan_in');
            $table->unsignedBigInteger('id_produk');
            $table->char('jml');
            $table->integer('harga_beli');
            $table->integer('sub_total')->nullable();
            $table->timestamps();
            $table->foreign('id_pemesanan_in')
                ->references('id_pemesanan_in')
                ->on('pemesanan_in')
                ->onUpdate('cascade');
            $table->foreign('id_produk')
                ->references('id_produk')
                ->on('produk')
                ->onUpdate('cascade');
        });

        //===================================================================//

        Schema::create('pemesanan_out', function (Blueprint $table) {
            $table->bigIncrements('id_pemesanan_out');
            $table->unsignedBigInteger('id_konsumen');
            $table->date('tgl_pemesanan');
            $table->integer('estimasi_sampai');
            $table->char('metode_bayar');
            $table->char('metode_kirim');
            $table->string('bukti_bayar');
            $table->char('konfirmasi_pesanan');
            $table->integer('total_biaya')->nullable();
            $table->timestamps();
            $table->foreign('id_konsumen')
                ->references('id_konsumen')
                ->on('konsumen')
                ->onUpdate('cascade');
        });

        //===================================================================//

        Schema::create('rinc_out', function (Blueprint $table) {
            $table->bigIncrements('id_rinc_out');
            $table->unsignedBigInteger('id_pemesanan_out');
            $table->unsignedBigInteger('id_hasil_ternak');
            $table->char('jml');
            $table->integer('harga_beli');
            $table->integer('sub_total')->nullable();
            $table->timestamps();
            $table->foreign('id_pemesanan_out')
                ->references('id_pemesanan_out')
                ->on('pemesanan_out')
                ->onUpdate('cascade');
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
