<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MusimTelurSeeder extends Seeder
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
 
            DB::table('musim_telur')->insert([
              'id_musim_telur' => str_pad($i,12,"99".date('dmY').'0000',STR_PAD_LEFT),
              'id_konsumen' => $faker->numberBetween(90001,90010),
              'tgl_mulai' => $faker->dateTimeThisMonth($max = 'now', $timezone = 'Asia/Jakarta'),
              'lama_pelaksanaan' => $faker->numberBetween(1,7),
              'jml_target' => $faker->numberBetween(100,150),
              'jml_terpenuhi' => $faker->numberBetween(50,90),
              'status_penyelesaian' => $faker->numberBetween(1,3),
              'created_at' => now()
            ]);
      
          }

        //

    }
}
