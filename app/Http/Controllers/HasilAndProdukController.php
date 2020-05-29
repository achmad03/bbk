<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HasilTernak;
use App\Models\Produk;
use App\Models\PemesananIn;
use App\Models\RincIn;
use App\Models\PemesananOut;
use App\Models\RincOut;
use App\Models\Peternak;
use App\Models\Konsumen;
use Ixudra\Curl\Facades\Curl;

class HasilAndProdukController extends Controller
{
    //

    public function daftar($id1){
            $data = Curl::to('http://localhost:8000/test1/produk/')
                ->get();
            $data=json_decode($data);
            return compact('data');
            //return view('daftars', ['id1'=>$id1,'data' => $data]);
    }

    public function rincian($id1,$id2,$id3){
            if($id1=='perlengkapan' && $id2=='edit'){
                \Cloudinary::config(array( 
                    "cloud_name" => "achsya03", 
                    "api_key" => "358574269653599", 
                    "api_secret" => "S6UngykP9cfd2JKh5u6uUaz1WXg", 
                    "secure" => true
                ));
                $data = Produk::join('supplier_in', 'supplier_in.id_supplier_in', '=', 'produk.id_supplier_in')
                                    ->join('users', 'users.id', '=', 'supplier_in.id')
                                    ->where('id_produk', $id3)->get();
                return view('rincians', ['id1'=>$id1,'id2'=>$id2,'id3'=>$id3,'data' => $data]);
            }
            if($id1=='perlengkapan' && $id2=='rincian'){
                \Cloudinary::config(array( 
                    "cloud_name" => "achsya03", 
                    "api_key" => "358574269653599", 
                    "api_secret" => "S6UngykP9cfd2JKh5u6uUaz1WXg", 
                    "secure" => true
                ));
                $data = Produk::join('supplier_in', 'supplier_in.id_supplier_in', '=', 'produk.id_supplier_in')
                                    ->join('users', 'users.id', '=', 'supplier_in.id')
                                    ->where('id_produk', $id3)->get();
                return view('rincians', ['id1'=>$id1,'id2'=>$id2,'id3'=>$id3,'data' => $data]);
            }elseif($id1=='produk' && $id2=='edit'){
                \Cloudinary::config(array( 
                    "cloud_name" => "achsya03", 
                    "api_key" => "358574269653599", 
                    "api_secret" => "S6UngykP9cfd2JKh5u6uUaz1WXg", 
                    "secure" => true
                ));
                $data = HasilTernak::join('peternak', 'peternak.id_peternak', '=', 'hasil_ternak.id_peternak')
                                        ->join('users', 'users.id', '=', 'peternak.id')
                                        ->where('id_hasil_ternak', $id3)->get();
                return view('rincians', ['id1'=>$id1,'id2'=>$id2,'id3'=>$id3,'data' => $data]);
            }
            if($id1=='produk' && $id2=='rincian'){
            \Cloudinary::config(array( 
                "cloud_name" => "achsya03", 
                "api_key" => "358574269653599", 
                "api_secret" => "S6UngykP9cfd2JKh5u6uUaz1WXg", 
                "secure" => true
            ));
            $data = HasilTernak::join('peternak', 'peternak.id_peternak', '=', 'hasil_ternak.id_peternak')
                                        ->join('users', 'users.id', '=', 'peternak.id')
                                        ->where('id_hasil_ternak', $id3)->get();
            return view('rincians', ['id1'=>$id1,'id2'=>$id2,'id3'=>$id3,'data' => $data]);
            }
    }

    public function tambah($id1,$id2){
        return view('rincians', ['id1'=>$id1,'id2'=>$id2]);
    }

    public function keranjang($id1,Request $request){
        $this->validate($request,[
    		'id' => 'required',
    		'jmlpesan' => 'required',
        ]);

        $conter=0;
        $dum="";
        try {
            if($id1=='produk'){
                $conter=count($request->session()->get('idhasil'));
            }elseif($id1=='perlengkapan'){
                $conter=count($request->session()->get('idproduk'));
            }        
            if($id1=='produk'){
                $dum=$request->session()->get('idhasil')[$conter-1];
            }elseif($id1=='perlengkapan'){
                $dum=$request->session()->get('idproduk')[$conter-1];
            }
        } catch (\Throwable $th) {
            $conter=0;
        }

        if($conter==0 || ($dum!=$request->id))
        {
            if($id1=='produk'){
                $request->session()->push('idhasil',$request->id);
                $request->session()->push('jmlpesan',$request->jmlpesan);
                
                $hasilternak = HasilTernak::where('id_hasil_ternak', $request->id)->get();

                foreach ($hasilternak as $ps) {
                    $request->session()->push('nama_hasil',$ps->nama_hasil);
                    $request->session()->push('foto_hasil',$ps->foto_produk);
                    $request->session()->push('harga_jual',$ps->harga_jual);
                }
            }elseif($id1=='perlengkapan'){
                $request->session()->push('idproduk',$request->id);
                $request->session()->push('jmlpesan1',$request->jmlpesan);
                
                $produk_supplier = Produk::where('id_produk', $request->id)->get();

                foreach ($produk_supplier as $ps) {
                    $request->session()->push('nama_produk1',$ps->nama_produk);
                    $request->session()->push('foto_produk1',$ps->foto_produk);
                    $request->session()->push('harga_jual1',$ps->harga_jual);
                }
            }
            
        }
		/*$request->session()->forget('idhasil');   
		$request->session()->forget('jmlpesan');  
		$request->session()->forget('nama_hasil');  
		$request->session()->forget('foto_hasil');  
		$request->session()->forget('harga_jual');  */  

    	return redirect('keranjang/'.$id1);
    }

    public function tampilkeranjang($id1,Request $request){

        $id="";
        $jmlpesan="";
        $nama="";
        $foto="";
        $harga_jual="";
        $data=[];

        \Cloudinary::config(array( 
            "cloud_name" => "achsya03", 
            "api_key" => "358574269653599", 
            "api_secret" => "S6UngykP9cfd2JKh5u6uUaz1WXg", 
            "secure" => true
        ));

        if($id1=='produk'){
            $id=$request->session()->get('idhasil');
            $jmlpesan=$request->session()->get('jmlpesan');
            $nama=$request->session()->get('nama_hasil');
            $foto=$request->session()->get('foto_hasil');
            $harga_jual=$request->session()->get('harga_jual');
            if($id!=null){
                $data = HasilTernak::whereIn('id_hasil_ternak',$id)->get();
            }

        }elseif($id1=='perlengkapan'){
            $id=$request->session()->get('idproduk');
            $jmlpesan=$request->session()->get('jmlpesan1');
            $nama=$request->session()->get('nama_produk1');
            $foto=$request->session()->get('foto_produk1');
            $harga_jual=$request->session()->get('harga_jual1');
            if($id!=null){
                $data = Produk::whereIn('id_produk', $id)->get();
            }
        }   
        return view('keranjangs',['data'=>$data,'id1'=>$request->id1,'nama'=>$nama,'foto'=>$foto,'harga_jual'=>$harga_jual,'id' => $id,'jmlpesan' => $jmlpesan]);
    }

    public function konfirmasibelanjaan($id1,Request $request){

        if($request->session()->get('simpanbelanjaan')==1){
            return redirect('keranjang/perlengkapan');
        }
        $indek=$request->get('indek');

        $hasil_ternak = HasilTernak::all();
        $jml=count($hasil_ternak);
        $jmlpesan=[];
        $nama_hasil=[];
        $hargajual=[];
        $idhasil=[];
        $methodkirim=$request->get('methodkirim')[0];
        $methodbayar=$request->get('methodbayar')[0];
        $biayaantar=0;
        $total=0;
        $total1=0;
        $biayaakomodasi=5000;

        $ii=0;
        if($id1=='perlengkapan'){
            foreach($indek as $indeks){

                array_push($jmlpesan,$request->get('jmlpesan')[$ii]);
                array_push($hargajual,$request->session()->get('harga_jual1')[$indeks]);
                array_push($idhasil,$request->session()->get('idproduk')[$indeks]);
                array_push($nama_hasil,$request->session()->get('nama_produk1')[$indeks]);
                $total=$total+($request->get('jmlpesan')[$ii]*$request->session()->get('harga_jual1')[$indeks]);
                
                $ii++;
            }
        }elseif($id1=='produk'){
            foreach($indek as $indeks){

                array_push($jmlpesan,$request->get('jmlpesan')[$ii]);
                array_push($hargajual,$request->session()->get('harga_jual')[$indeks]);
                array_push($idhasil,$request->session()->get('idhasil')[$indeks]);
                array_push($nama_hasil,$request->session()->get('nama_hasil')[$indeks]);
                $total=$total+($request->get('jmlpesan')[$ii]*$request->session()->get('harga_jual')[$indeks]);
                
                $ii++;
            }
        }
        

        
        if($methodkirim==1){
            $biayaantar=10000*count($idhasil);
        }else{
            $biayaantar=0;
        }
        
        $total=$total;
        $total1=$total+$biayaantar+$biayaakomodasi;
        return view('transaksis',['id1'=>$id1,'indek'=>$indek,'idhasil'=>$idhasil,'hargajual'=>$hargajual,'nama_hasil'=>$nama_hasil,'total1'=>$total1,'total'=>$total,'jmlpesan'=>$jmlpesan,'methodkirim'=>$methodkirim,'methodbayar'=>$methodbayar,'biayaantar'=>$biayaantar,'biayaakomodasi'=>$biayaakomodasi]);
    }

    public function simpanbelanjaanperlengkapan(Request $request){
        if($request->session()->get('simpanbelanjaan')==1){
            return redirect('keranjang/perlengkapan');
        }


            $indek=$request->get('indek');


            $ids=$request->get('id');
            $idPeternak="";
            $hasil_ternak = PemesananIn::all();
            $jml=count($hasil_ternak);
            $arr = Peternak::where('id', $ids)->get();
            
            $id=[];
            $jmlpesan=[];
            $nama=[];
            $foto=[];
            $harga_jual=[];

            foreach($arr as $ps){
                $idPeternak=$ps->id_peternak;
            }

            $methodkirim=$request->get('methodkirim')[0];
            $methodbayar=$request->get('methodbayar')[0];
            $biayaantar=0;
            $total=0;
            $total1=0;
            $biayaakomodasi=5000;

            $ii=0;
            foreach($indek as $indeks){
                $total=$total+($request->get('jmlpesan')[$ii]*$request->session()->get('harga_jual1')[$indeks]);
                $ii++;
            }

            
            if($methodkirim==1){
                $biayaantar=10000*count($indek);
            }else{
                $biayaantar=0;
            }
            
            $total=$total;
            $total1=$total+$biayaantar+$biayaakomodasi;

            $idpemesanan=str_pad($jml+1,14,"97".date('dmY').'0000',STR_PAD_LEFT);

            PemesananIn::insert([
                'id_pemesanan_in' => $idpemesanan,
                'id_peternak' => $idPeternak,
                'tgl_pemesanan' => date('d/m/Y'),
                'estimasi_sampai' => 3,
                'metode_bayar' => $request->get('methodbayar')[0],
                'metode_kirim' => $request->get('methodkirim')[0],
                'bukti_bayar' => "",       
                'konfirmasi_pesanan' => 1,
                'total_biaya' => $total1,
                'created_at' => now()
            ]);

            $id=$request->session()->get('idproduk');
            $jmlpesan=$request->session()->get('jmlpesan1');
            $nama=$request->session()->get('nama_produk1');
            $foto=$request->session()->get('foto_produk1');
            $harga_jual=$request->session()->get('harga_jual1');

            $ii=0;
            foreach($indek as $indeks){
            $produk=Produk::where('id_produk', $request->session()->get('idproduk')[$indeks])->get();
                
                
                $rincIn = RincIn::all();
                $jmlIn=count($rincIn);
            RincIn::insert([
                'id_rinc_in' => str_pad($jmlIn+1,5,'80000',STR_PAD_LEFT),
                'id_pemesanan_in' => $idpemesanan,
                'id_produk' => $request->session()->get('idproduk')[$indeks],
                'jml' => $request->get('jmlpesan')[$ii],
                'harga_beli' => $request->session()->get('harga_jual1')[$indeks],
                'sub_total' => $request->get('jmlpesan')[$ii]*$request->session()->get('harga_jual1')[$indeks],
                'created_at' => now()
            ]);
            $ii++;

            
            array_splice($id,$indeks);
            array_splice($jmlpesan,$indeks);
            array_splice($nama,$indeks);
            array_splice($foto,$indeks);
            array_splice($harga_jual,$indeks);


            $jmllama=0;

            foreach($produk as $produks){
                $jmllama=$produks->persediaan;
            }

            Produk::where('id_produk', $request->session()->get('idproduk')[$indeks])
                    ->update(['persediaan' => $jmllama-$request->session()->get('jmlpesan1')[$indeks]]);
            }

            
            $request->session()->forget('idproduk');
            $request->session()->forget('jmlpesan1');
            $request->session()->forget('nama_produk1');
            $request->session()->forget('foto_produk1');
            $request->session()->forget('harga_jual1');

            $request->session()->put('simpanbelanjaan',1);
            $request->session()->put('idproduk',$id);
            $request->session()->put('jmlpesan1',$jmlpesan);
            $request->session()->put('nama_produk1',$nama);
            $request->session()->put('foto_produk1',$foto);
            $request->session()->put('harga_jual1',$harga_jual);

            

            return redirect('keranjang/perlengkapan');
    }

    public function simpanbelanjaanproduk(Request $request){
        if($request->session()->get('simpanbelanjaan')==1){
            return redirect('keranjang/perlengkapan');
        }


            $indek=$request->get('indek');


            $ids=$request->get('id');
            $idKonsumen="";
            $hasil_ternak = PemesananOut::all();
            $jml=count($hasil_ternak);
            $arr = Konsumen::where('id', $ids)->get();
            
            $id=[];
            $jmlpesan=[];
            $nama=[];
            $foto=[];
            $harga_jual=[];

            foreach($arr as $ps){
                $idKonsumen=$ps->id_konsumen;
            }

            $methodkirim=$request->get('methodkirim')[0];
            $methodbayar=$request->get('methodbayar')[0];
            $biayaantar=0;
            $total=0;
            $total1=0;
            $biayaakomodasi=5000;

            $ii=0;
            foreach($indek as $indeks){
                $total=$total+($request->get('jmlpesan')[$ii]*$request->session()->get('harga_jual')[$indeks]);
                $ii++;
            }

            
            if($methodkirim==1){
                $biayaantar=10000*count($indek);
            }else{
                $biayaantar=0;
            }
            
            $total=$total;
            $total1=$total+$biayaantar+$biayaakomodasi;

            $idpemesanan=str_pad($jml+1,14,"97".date('dmY').'0000',STR_PAD_LEFT);

            PemesananOut::insert([
                'id_pemesanan_out' => $idpemesanan,
                'id_konsumen' => $idKonsumen,
                'tgl_pemesanan' => date('d/m/Y'),
                'estimasi_sampai' => 3,
                'metode_bayar' => $request->get('methodbayar')[0],
                'metode_kirim' => $request->get('methodkirim')[0],
                'bukti_bayar' => "",       
                'konfirmasi_pesanan' => 1,
                'total_biaya' => $total1,
                'created_at' => now()
            ]);

            $id=$request->session()->get('idhasil');
            $jmlpesan=$request->session()->get('jmlpesan');
            $nama=$request->session()->get('nama_hasil');
            $foto=$request->session()->get('foto_hasil');
            $harga_jual=$request->session()->get('harga_jual');

            $ii=0;
            foreach($indek as $indeks){
                $hasil=HasilTernak::where('id_hasil_ternak', $request->session()->get('idhasil')[$indeks])->get();
                    
                    
                    $rincOut = RincOut::all();
                    $jmlIn=count($rincOut);
                RincOut::insert([
                    'id_rinc_out' => str_pad($jmlIn+1,5,'70000',STR_PAD_LEFT),
                    'id_pemesanan_out' => $idpemesanan,
                    'id_hasil_ternak' => $request->session()->get('idhasil')[$indeks],
                    'jml' => $request->get('jmlpesan')[$ii],
                    'harga_beli' => $request->session()->get('harga_jual')[$indeks],
                    'sub_total' => $request->get('jmlpesan')[$ii]*$request->session()->get('harga_jual')[$indeks],
                    'created_at' => now()
                ]);
    
                
                array_splice($id,$indeks);
                array_splice($jmlpesan,$indeks);
                array_splice($nama,$indeks);
                array_splice($foto,$indeks);
                array_splice($harga_jual,$indeks);
    
    
                $jmllama=0;
    
                foreach($hasil as $produks){
                    $jmllama=$produks->persediaan;
                }
    
                HasilTernak::where('id_hasil_ternak', $request->session()->get('idhasil')[$indeks])
                        ->update(['persediaan' => $jmllama-$request->get('jmlpesan')[$ii]]);
                $ii++;
            }

            
            $request->session()->forget('idhasil');
            $request->session()->forget('jmlpesan');
            $request->session()->forget('nama_hasil');
            $request->session()->forget('foto_hasil');
            $request->session()->forget('harga_jual');

            $request->session()->put('simpanbelanjaan',1);
            $request->session()->put('idhasil',$id);
            $request->session()->put('jmlpesan',$jmlpesan);
            $request->session()->put('nama_produk',$nama);
            $request->session()->put('foto_produk',$foto);
            $request->session()->put('harga_jual',$harga_jual);

            

            return redirect('keranjang/produk');
    }

    public function simpanbelanjaan($id1,Request $request){
            
            if($id1=='perlengkapan'){
                return redirect('pembelian/perlengkapan',['id1'=>$id1]);
                return redirect('keranjang/perlengkapan');
            }elseif($id1=='produk'){

            }

    }

    

    public function bayarbelanjaan($id1,Request $request){


        $request->session()->put('simpanbelanjaan',0);
        \Cloudinary::config(array( 
            "cloud_name" => "achsya03", 
            "api_key" => "358574269653599", 
            "api_secret" => "S6UngykP9cfd2JKh5u6uUaz1WXg", 
            "secure" => true
        ));
        if($request->btn=="Lakukan Pembayaran"){
            $indexs=$request->get('index');
            $indek=[];
            $jmlpesan=[];
            $hargajual=[];
            $id=[];
            $nama=[];
            $foto=[];
            $namapemilik=[];
            $alamat=[];
            $notelp=[];
            $data=[];

             $ii=0;
                foreach($indexs as $index){
                    array_push($indek,$request->get('index')[$ii]);
                    array_push($jmlpesan,$request->get('jmlpesan')[$index]);
                    $ii++;
                    if($id1=='produk'){
                        array_push($id,$request->session()->get('idhasil')[$index]);
                        array_push($nama,$request->session()->get('nama_hasil')[$index]);
                        array_push($foto,$request->session()->get('foto_hasil')[$index]);
                        array_push($hargajual,$request->session()->get('harga_jual')[$index]);
                    }elseif($id1=='perlengkapan'){
                        array_push($id,$request->session()->get('idproduk')[$index]);
                        array_push($nama,$request->session()->get('nama_produk1')[$index]);
                        array_push($foto,$request->session()->get('foto_produk1')[$index]);
                        array_push($hargajual,$request->session()->get('harga_jual1')[$index]);
                    }   

                    if($id1=='produk'){  
                        $hasilproduk = HasilTernak::join('peternak', 'peternak.id_peternak', '=', 'hasil_ternak.id_peternak')
                                        ->join('users', 'users.id', '=', 'peternak.id')
                                        ->where('id_hasil_ternak', $request->session()->get('idhasil')[$index])->get();
                            
                            foreach($hasilproduk as $ps){
                                array_push($namapemilik,$ps->name);
                                array_push($alamat,$ps->alamat);
                                array_push($notelp,$ps->no_telp);
                            }
                        $data = HasilTernak::whereIn('id_hasil_ternak', $id)->get();
                    }elseif($id1=='perlengkapan'){
                        $produk_supplier = Produk::join('supplier_in', 'supplier_in.id_supplier_in', '=', 'produk.id_supplier_in')
                                        ->join('users', 'users.id', '=', 'supplier_in.id')
                                        ->where('id_produk', $request->session()->get('idproduk')[$index])->get();
                            
                            foreach($produk_supplier as $ps){
                                array_push($namapemilik,$ps->name);
                                array_push($alamat,$ps->alamat);
                                array_push($notelp,$ps->no_telp);
                            }
                        $data = Produk::whereIn('id_produk', $id)->get();
                    }
                }
                //foreach($index as $indexs) {
                    //array_push($hargajual,$request->session()->get('harga_jual')[$index]);
                //}
            return view('pembayarans',['data'=>$data,'id1'=>$id1,'indek'=>$indek,'namapemilik'=>$namapemilik,'alamat'=>$alamat,'notelp'=>$notelp,'nama'=>$nama,'foto'=>$foto,'hargajual'=>$hargajual,'id' => $id,'jmlpesan' => $jmlpesan]);

        }else{


            #return view('keranjangproduk',['nama_produk'=>$nama_produk,'foto_produk'=>$foto_produk,'harga_jual'=>$harga_jual,'idproduk' => $idproduk,'jmlpesan' => $jmlpesan]);


            }
        }

        public function test11(Request $request,$id1){
            if($id1=='perlengkapan'){
                \Cloudinary::config(array( 
                    "cloud_name" => "achsya03", 
                    "api_key" => "358574269653599", 
                    "api_secret" => "S6UngykP9cfd2JKh5u6uUaz1WXg", 
                    "secure" => true
                ));
                
                $data;
                if($request->session()->get('idproduk')!=null){
                    $data = Produk::where('persediaan','>','0')
                    ->whereNotIn('id_produk',$request->session()->get('idproduk'))
                    ->paginate(12);
                }else if($request->session()->get('idproduk')==null){
                    $data = Produk::where('persediaan','>','0')
                    ->paginate(12);
                }
                return json_encode($data);
            }elseif($id1=='produk'){
                \Cloudinary::config(array( 
                    "cloud_name" => "achsya03", 
                    "api_key" => "358574269653599", 
                    "api_secret" => "S6UngykP9cfd2JKh5u6uUaz1WXg", 
                    "secure" => true
                ));
                $data;
                if($request->session()->get('idhasil')!=null){
                    $data = HasilTernak::where('persediaan','>','0')
                    ->whereNotIn('id_hasil_ternak',$request->session()->get('idhasil'))
                    ->paginate(12);
                }else if($request->session()->get('idhasil')==null){
                    $data = HasilTernak::where('persediaan','>','0')
                    ->paginate(12);
                }
                return json_encode($data);
            }
        }
    }

                 
        /*DB::table('pemesanan_out')->insert([
            'id_pemesanan_out' => str_pad($jml+1,12,"97".date('dmY').'0000',STR_PAD_LEFT),
            'id_konsumen' => $faker->numberBetween(90001,90010),
            'tgl_pemesanan' => date('d/m/Y'),
            'estimasi_sampai' => 3,
            'metode_bayar' => $request->methodtransfer,
            'metode_kirim' => $request->methodkirim,
            'bukti_bayar' => "",       
            'konfirmasi_pesanan' => 1,
            'total_biaya' => $request->hargajual*$request->jmlpesan,
            'created_at' => now()
          ]);
          

          echo $idpemesanan."<br/>";
          echo $idPeternak."<br/>";
          echo date('d/m/Y')."<br/>";
          echo $request->get('methodbayar')[0]."<br/>";
          echo $request->get('methodkirim')[0]."<br/>";
          echo $total1."<br/>";

          foreach($indek as $indeks){
            $rincIn = RincIn::all();
            $jmlIn=count($rincIn);
                echo str_pad($jmlIn+1,5,'70000',STR_PAD_LEFT)."<br/>";
                echo $request->session()->get('idproduk')[$indeks]."<br/>";
                echo $request->session()->get('jmlpesan1')[$indeks]."<br/>";
                echo $request->session()->get('harga_jual1')[$indeks]."<br/>";
                echo $request->session()->get('jmlpesan1')[$indeks]*$request->session()->get('harga_jual1')[$indeks]."<br/>";
          }
          

          
    
    
          //===================================================================//
         
            DB::table('rinc_out')->insert([
                'id_rinc_out' => str_pad($i,5,'70000',STR_PAD_LEFT),
                'id_pemesanan_out' => $id_pemesanan_out,
                'id_hasil_ternak' => $k,
                'jml' => $request->jmlpesan,request->id_hasil_terna
                'harga_beli' => $request->hargajual,
                'sub_total' => $request->hargajual*$request->jmlpesan,
                'created_at' => now()
            ]);*/