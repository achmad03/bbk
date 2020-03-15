<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplier extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_in', function (Blueprint $table) {
            $table->bigIncrements('id_supplier_in');
            $table->unsignedBigInteger('id');
            $table->string('deskripsi')->nullable();
            $table->timestamps();
            $table->foreign('id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade');
        });

        //===================================================================//

        Schema::create('produk', function (Blueprint $table) {
            $table->bigIncrements('id_produk');
            $table->unsignedBigInteger('id_supplier_in');
            $table->string('nama_produk');
            $table->string('deskripsi');
            $table->integer('jenis_produk');
            $table->char('metode_bayar');
            $table->char('metode_kirim');
            $table->integer('harga_jual');
            $table->integer('persediaan');
            $table->string('foto_produk');
            $table->timestamps();
            $table->foreign('id_supplier_in')
                ->references('id_supplier_in')
                ->on('supplier_in')
                ->onUpdate('cascade');
        });

        //===================================================================//

        Schema::create('tambah_produk', function (Blueprint $table) {
            $table->bigIncrements('id_tambah_produk');
            $table->unsignedBigInteger('id_produk');
            $table->date('tgl_penambahan');
            $table->integer('jml_penambahan');
            $table->integer('harga_jual');
            $table->timestamps();
            $table->foreign('id_produk')
                ->references('id_produk')
                ->on('produk')
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
