<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(KonsumenSeeder::class);
        $this->call(SupplierSeeder::class);
        $this->call(PeternakSeeder::class);
        $this->call(MusimTelurSeeder::class);
        $this->call(TransaksiSeeder::class);
    }
}
