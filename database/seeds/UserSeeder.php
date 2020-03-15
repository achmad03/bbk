<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
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

            DB::table('users')->insert([
                'id' => str_pad($i,5,'60000',STR_PAD_LEFT),
                'name' => $faker->name,
                'alamat' => $faker->address,
                'no_wa' => $faker->phoneNumber,
                'no_telp' => $faker->phoneNumber,
                'foto_profil' => $faker->imageUrl($width = 640, $height = 480),
                'koordinat' => $faker->latitude($min = -90, $max = 90).",".$faker->longitude($min = -180, $max = 180),
                'email' => $faker->freeEmail,
                'password' => $faker->password,
                'role' => $faker->numberBetween(1,5),
                'created_at' => now()
            ]);

        }
    }
}
