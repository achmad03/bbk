<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TransaksiSeeder extends Seeder
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

        //===================================================================//
        //In
        //===================================================================//

        for($i = 1; $i <= 10; $i++){
 
            DB::table('pemesanan_in')->insert([
                'id_pemesanan_in' => str_pad($i,12,"97".date('dmY').'0000',STR_PAD_LEFT),
                'id_peternak' => $faker->numberBetween(10001,10010),
                'tgl_pemesanan' => $faker->dateTimeThisMonth($max = 'now', $timezone = 'Asia/Jakarta'),
                'estimasi_sampai' => $faker->numberBetween(1,3),
                'metode_bayar' => $faker->numberBetween(1,2),
                'metode_kirim' => $faker->numberBetween(1,2),
                'bukti_bayar' => $faker->imageUrl($width = 640, $height = 480),
                'konfirmasi_pesanan' => $faker->numberBetween(1,5),
                'total_biaya' => 0,
                'created_at' => now()
            ]);

        }
        //===================================================================//

        for($i = 1; $i <= 10; $i++){
          $total=0;

          $jml1=$faker->numberBetween(5,20);
          $harga1=$faker->numberBetween(10000,250000);
          $id_pemesanan_in=str_pad($faker->numberBetween(1,10),12,"97".date('dmY').'0000',STR_PAD_LEFT);
          $total=$total+($jml1*$harga1);
          DB::table('rinc_in')->insert([
              'id_rinc_in' => str_pad($i,5,'80000',STR_PAD_LEFT),
              'id_pemesanan_in' => $id_pemesanan_in,
              'id_produk' => $faker->numberBetween(600001,600010),
              'jml' => $jml1,
              'harga_beli' => $harga1,
              'sub_total' => $jml1*$harga1,
              'created_at' => now()
          ]);

          //===================================================================//

          $sub_t=DB::table('rinc_in')->select('sub_total')->where('id_pemesanan_in', $id_pemesanan_in)->get();
          $s=0;
          foreach($sub_t as $p){
            $s=$p->sub_total;
          }
          DB::table('pemesanan_in')->where(
          ['id_pemesanan_in'=> $id_pemesanan_in])
          ->update(
            ['total_biaya' => $s]
          );
        }

    //===================================================================//
    //Out
    //===================================================================//
        
    for($i = 1; $i <= 10; $i++){
 
      DB::table('pemesanan_out')->insert([
        'id_pemesanan_out' => str_pad($i,12,"97".date('dmY').'0000',STR_PAD_LEFT),
        'id_konsumen' => $faker->numberBetween(90001,90010),
        'tgl_pemesanan' => $faker->dateTimeThisMonth($max = 'now', $timezone = 'Asia/Jakarta'),
        'estimasi_sampai' => $faker->numberBetween(1,3),
        'metode_bayar' => $faker->numberBetween(1,2),
        'metode_kirim' => $faker->numberBetween(1,2),
        'bukti_bayar' => $faker->imageUrl($width = 640, $height = 480),       
        'konfirmasi_pesanan' => $faker->numberBetween(1,5),
        'total_biaya' => 0,
        'created_at' => now()
      ]);

    }

      //===================================================================//

      for($i = 1; $i <= 10; $i++){
        $total=0;

        $jml1=$faker->numberBetween(5,20);
        $harga1=$faker->numberBetween(1500,2500);
        $id_pemesanan_out=str_pad($faker->numberBetween(1,10),12,"97".date('dmY').'0000',STR_PAD_LEFT);
        $total=$total+($jml1*$harga1);
        DB::table('rinc_out')->insert([
            'id_rinc_out' => str_pad($i,5,'70000',STR_PAD_LEFT),
            'id_pemesanan_out' => $id_pemesanan_out,
            'id_hasil_ternak' => $faker->numberBetween(30001,30010),
            'jml' => $jml1,
            'harga_beli' => $harga1,
            'sub_total' => $jml1*$harga1,
            'created_at' => now()
        ]);

        //===================================================================//

        $sub_t=DB::table('rinc_out')->select('sub_total')->where('id_pemesanan_out', $id_pemesanan_out)->get();
        $s=0;
        foreach($sub_t as $p){
          $s=$p->sub_total;
        }
        DB::table('pemesanan_out')->where(
        ['id_pemesanan_out'=> $id_pemesanan_out])
        ->update(
          ['total_biaya' => $s]
        );
      }

        

    }
}
