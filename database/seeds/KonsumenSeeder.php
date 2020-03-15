<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class KonsumenSeeder extends Seeder
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
    		DB::table('konsumen')->insert([
    			'id_konsumen' => str_pad($i,5,'900000',STR_PAD_LEFT),
    			'id' => $faker->numberBetween(60001,60010),
    			'jenis_konsumen' => $faker->numberBetween(1,5),
    			'created_at' => now()
            ]);
 
        }
    }
}
