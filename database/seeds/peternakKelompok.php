<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class peternakKelompok extends Seeder
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
    			'nama' => $faker->name,
    			'alamat' => $faker->address,
    			'no_wa' => $faker->phoneNumber,
    			'no_telp' => $faker->phoneNumber,
    			'jenis_kel' => $faker->numberBetween(1,2),
    			'foto_kandang' => $faker->imageUrl($width = 640, $height = 480),
    			'foto_profil' => $faker->imageUrl($width = 640, $height = 480),
    			'koordinat' => $faker->latitude($min = -90, $max = 90).",".$faker->longitude($min = -180, $max = 180),
    			'jml_bebek' => $faker->numberBetween(25,40),
    			'jml_pakan' => $faker->numberBetween(10,30),
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
    }
}
