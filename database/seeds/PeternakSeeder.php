<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PeternakSeeder extends Seeder
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
    		DB::table('peternak')->insert([
    			'id_peternak' => str_pad($i,5,'10000',STR_PAD_LEFT),
    			'jenis_kel' => $faker->numberBetween(1,2),
    			'foto_kandang' => $faker->imageUrl($width = 640, $height = 480),
    			'jml_bebek' => $faker->numberBetween(25,40),
    			'jml_pakan' => $faker->numberBetween(10,30),
    			'id' => $faker->numberBetween(60001,60010),
    			'created_at' => now()
            ]);
 
        }
        
        for($i = 1; $i <= 10; $i++){
            
            DB::table('kelompok')->insert([
    			'id_kelompok' => str_pad($i,5,'20000',STR_PAD_LEFT),
    			'id_peternak' => $faker->numberBetween(10001,10010),
    			'nama' => $faker->city,
                'status_konfirmasi' => $faker->numberBetween(1,2),
                'status_anggota' => $faker->numberBetween(1,5),
    			'created_at' => now()
    		]);

		}
		
		for($i = 1; $i <= 10; $i++){
            
            DB::table('hasil_ternak')->insert([
    			'id_hasil_ternak' => str_pad($i,5,'30000',STR_PAD_LEFT),
    			'id_peternak' => $faker->numberBetween(10001,10010),				
                'nama_hasil' => $faker->text(8),
				'jenis_hasil' => $faker->numberBetween(1,2),
				'metode_bayar' => $faker->numberBetween(1,3),
				'metode_kirim' => $faker->numberBetween(1,3),
                'deskripsi' => $faker->text(120),
                'harga_jual' => $faker->numberBetween(1500,2500),
                'foto_produk' => $faker->imageUrl($width = 640, $height = 480),
                'persediaan' => $faker->numberBetween(20,100),
    			'created_at' => now()
    		]);

		}
		
		for($i = 1; $i <= 10; $i++){
            
            DB::table('tambah_hasil_ternak')->insert([
    			'id_tambah_hasil_ternak' => str_pad($i,5,'40000',STR_PAD_LEFT),
    			'id_hasil_ternak' => $faker->numberBetween(30001,30010),
				'tgl_penambahan' => $faker->dateTimeThisMonth($max = 'now', $timezone = 'Asia/Jakarta'),
                'jml_penambahan' => $faker->numberBetween(20,100),
                'harga_jual' => $faker->numberBetween(1500,2500),
    			'created_at' => now()
    		]);

        }
    }
}
