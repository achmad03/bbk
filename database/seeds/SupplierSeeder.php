<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        date_default_timezone_set('Asia/Jakarta');
 
    	for($i = 1; $i <= 10; $i++){
 
    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('supplier_in')->insert([
    			'id_supplier_in' => str_pad($i,5,'30000',STR_PAD_LEFT),
    			'deskripsi' => $faker->text(150),
    			'id' => $faker->numberBetween(60001,60010),
    			'created_at' => now()
            ]);
 
        }

        for($i = 1; $i <= 10; $i++){
 
            // insert data ke table pegawai menggunakan Faker
          DB::table('produk')->insert([
              'id_produk' => str_pad($i,6,'600000',STR_PAD_LEFT),
              'id_supplier_in' => $faker->numberBetween(30001,30010),
              'nama_produk' => "Telur ".$faker->name,
              'deskripsi' => $faker->text(120),
              'jenis_produk' => $faker->numberBetween(1,2),
              'metode_bayar' => $faker->numberBetween(1,3),
              'metode_kirim' => $faker->numberBetween(1,3),
              'harga_jual' => $faker->numberBetween(1500,2500),
              'persediaan' => $faker->numberBetween(0,100),
              'foto_produk' => $faker->imageUrl($width = 640, $height = 480),
              'created_at' => now()
          ]);
        }

        for($i = 1; $i <= 10; $i++){
    
            // insert data ke table pegawai menggunakan Faker
            DB::table('tambah_produk')->insert([
                'id_tambah_produk' => str_pad($i,5,'700000',STR_PAD_LEFT),
                'id_produk' => $faker->numberBetween(600001,600010),
                'tgl_penambahan' => $faker->dateTimeThisMonth($max = 'now', $timezone = 'Asia/Jakarta'),
                'jml_penambahan' => $faker->numberBetween(10,20),
                'harga_jual' => $faker->numberBetween(1500,2500),
                'created_at' => now()
            ]);

        }
    }
}
