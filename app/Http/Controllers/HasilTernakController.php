<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HasilTernak;

class HasilTernakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function conf(){
        
    }

    public function index($id){
        if($id!='tambah'){
            \Cloudinary::config(array( 
                "cloud_name" => "achsya03", 
                "api_key" => "358574269653599", 
                "api_secret" => "S6UngykP9cfd2JKh5u6uUaz1WXg", 
                "secure" => true
            ));
            $hasil_ternak = HasilTernak::paginate(12);
            return view('hasil', ['id'=>$id,'hasil_ternak' => $hasil_ternak]);
        }elseif($id=='tambah'){
            return view('rincian', ['id1'=>$id]);
        }
    }

    public function tambahsimpan(Request $request){
        $this->validate($request,[
    		'nama' => 'required',
    		'foto' => 'required',
    		'deskripsi' => 'required',
    		'rbjenis' => 'required',
    		'hargajual' => 'required',
    		'cbbayar' => 'required',
    		'cbantar' => 'required',
    		'persediaan' => 'required',
        ]);

        $hasil_ternak = HasilTernak::all();
        $jml=count($hasil_ternak);
        $new_id_hasil=30000+$jml+1;
        
            \Cloudinary::config(array( 
                "cloud_name" => "achsya03", 
                "api_key" => "358574269653599", 
                "api_secret" => "S6UngykP9cfd2JKh5u6uUaz1WXg", 
                "secure" => true
              ));
              $slug=$new_id_hasil;
    
              $file=$_FILES['foto']['tmp_name'];
              $aa=\Cloudinary\Uploader::upload($file,array("folder" => "Bebek/", "public_id"=>$slug,"overwrite" => TRUE));  
    
              extract($aa);

              $idbayar=0;
              foreach ($request->cbbayar as $cbsbayar) {
                if(count($request->cbbayar)==2){
                    $idbayar=3;
                    break;
                }else{
                    $idbayar=$cbsbayar;
                }
              }

              $idantar=0;
              foreach ($request->cbantar as $cbsantar) {
                if(count($request->cbantar)==2){
                    $idantar=3;
                    break;
                }else{
                    $idantar=$cbsantar;
                }
              }
       
        HasilTernak::insert([
    		'id_hasil_ternak' => $new_id_hasil,
    		'id_peternak' => 10005,
    		'nama_hasil' => $request->nama,
    		'deskripsi' => $request->deskripsi,
    		'jenis_hasil' => $request->rbjenis,
    		'metode_bayar' => $idbayar,
    		'metode_kirim' => $idantar,
    		'harga_jual' => $request->hargajual,
    		'persediaan' => $request->persediaan,
    		'foto_produk' => '/Bebek/'.$slug.$version,
    		'updated_at' => now()
    	]);

          
        $produk_supplier = HasilTernak::paginate(12);
        return redirect('/hasil/edit');
    }

    public function editrincian($id){
        $hasil_ternak = HasilTernak::join('peternak', 'peternak.id_peternak', '=', 'hasil_ternak.id_peternak')
        ->join('users', 'users.id', '=', 'peternak.id')
        ->where('id_hasil_ternak', $id)->get();
            return view('editrincianhasil', ['hasil_ternak' => $hasil_ternak]);
    }

    public function editsimpan(Request $request){
        $this->validate($request,[
    		'idhasil' => 'required',
    		'nama' => 'required',
    		'deskripsi' => 'required',
    		'rbjenis' => 'required',
    		'hargajual' => 'required',
        ]);

        HasilTernak::where('id_hasil_ternak', $request->idhasil)
        ->update([
            'nama_hasil' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'jenis_hasil' => $request->rbjenis,
            'harga_jual' => $request->hargajual,
            'updated_at' => now()
          ]);
          
        $produk_supplier = HasilTernak::paginate(12);
        return redirect('/hasil/edit');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function tambah()
    {
    	echo "aa";
    }

    public function tampilkanSession(Request $request) {
		if($request->session()->has('idhasil')){
            return $request->session()->get('idhasil');
		}else{
			echo 'Tidak ada data dalam session.';
		}
	}

	// membuat session
	public function buatSession(Request $request) {
		$request->session()->put('nama',['ichsan', 'munadi', 'bebas']);
		echo "Data telah ditambahkan ke session.";
    }
    
    public function tambahSession(Request $request) {
		$request->session()->push('nama','test');
		$request->session()->push('jurusan','123');
		echo "Data baru telah ditambahkan ke session.";
    }
    
    public function hapusSession(Request $request) {
		$request->session()->forget('idhasil');
		$request->session()->forget('jmlpesan');
		$request->session()->forget('methodtransfer');
		$request->session()->forget('nama_hasil');
		$request->session()->forget('foto_produk');
		$request->session()->forget('harga_jual');
        $request->session()->forget('nama');
		echo "Data  telah dihapus.";
	}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id1,$id2)
    {
        \Cloudinary::config(array( 
            "cloud_name" => "achsya03", 
            "api_key" => "358574269653599", 
            "api_secret" => "S6UngykP9cfd2JKh5u6uUaz1WXg", 
            "secure" => true
          ));
        $hasil_ternak = HasilTernak::join('peternak', 'peternak.id_peternak', '=', 'hasil_ternak.id_peternak')
                                    ->join('users', 'users.id', '=', 'peternak.id')
                                    ->where('id_hasil_ternak', $id2)->get();
    	return view('rincian', ['id1'=>$id1,'id2'=>$id2,'hasil_ternak' => $hasil_ternak]);
    }

    public function show1($id1,$id2)
    {
        \Cloudinary::config(array( 
            "cloud_name" => "achsya03", 
            "api_key" => "358574269653599", 
            "api_secret" => "S6UngykP9cfd2JKh5u6uUaz1WXg", 
            "secure" => true
          ));
          $slug=$id2;

          $file=$_FILES['file']['tmp_name'];
          $aa=\Cloudinary\Uploader::upload($file,array("folder" => "Bebek/", "public_id"=>$slug,"overwrite" => TRUE));  

          extract($aa);

        HasilTernak::where('id_hasil_ternak', $id2)
        ->update([
            'foto_produk' => '/Bebek/'.$slug.$version,
            'updated_at' => now()
          ]);
        
            
        
    	return redirect('/hasil/rincian/'.$id1.'/'.$id2);
    }

    public function keranjang(Request $request){
        $this->validate($request,[
    		'idhasil' => 'required',
    		'jmlpesan' => 'required',
        ]);

        $conter=0;
        try {
            $conter=count($request->session()->get('idhasil'));
        } catch (\Throwable $th) {
            $conter=0;
        }
        
        
        if($conter==0 || ($request->session()->get('idhasil')[$conter-1]!=$request->idhasil))
        {

            $request->session()->push('idhasil',$request->idhasil);
            $request->session()->push('jmlpesan',$request->jmlpesan);
            
            $hasil_ternak = HasilTernak::where('id_hasil_ternak', $request->idhasil)->get();

            foreach ($hasil_ternak as $ht) {
                $request->session()->push('nama_hasil',$ht->nama_hasil);
                $request->session()->push('foto_produk',$ht->foto_produk);
                $request->session()->push('harga_jual',$ht->harga_jual);
            }
        }
        
        $idhasil=$request->session()->get('idhasil');
        $jmlpesan=$request->session()->get('jmlpesan');
        $nama_hasil=$request->session()->get('nama_hasil');
        $foto_produk=$request->session()->get('foto_produk');
        $harga_jual=$request->session()->get('harga_jual');
        

    	return view('keranjang',['nama_hasil'=>$nama_hasil,'foto_produk'=>$foto_produk,'harga_jual'=>$harga_jual,'idhasil' => $idhasil,'jmlpesan' => $jmlpesan]);
    }
    public function daftar(Request $request){

        $idhasil=$request->session()->get('idhasil');
        $jmlpesan=$request->session()->get('jmlpesan');
        $nama_hasil=$request->session()->get('nama_hasil');
        $foto_produk=$request->session()->get('foto_produk');
        $harga_jual=$request->session()->get('harga_jual');
        
        if($idhasil==null){
            $idhasil=-1;
        }

        return view('keranjang',['idhasil'=>$idhasil,'nama_hasil'=>$nama_hasil,'foto_produk'=>$foto_produk,'harga_jual'=>$harga_jual,'idhasil' => $idhasil,'jmlpesan' => $jmlpesan]);
    }

    public function simpan_keranjang(Request $request){
        $index=$request->get('indexhasilternak');
        $indek=[];
        $jmlpesan=[];
        $hargajual=[];
        $idhasil=[];
        $nama_hasil=[];
        $foto_produk=[];
        $namapeternak=[];
        $alamat=[];
        $notelp=[];

        foreach($index as $indexs){
            $index=$indexs;
            array_push($indek,$request->get('indexhasilternak')[$index]);
            array_push($jmlpesan,$request->get('jmlpesan')[$index]);
            array_push($hargajual,$request->session()->get('harga_jual')[$index]);
            array_push($idhasil,$request->session()->get('idhasil')[$index]);
            array_push($nama_hasil,$request->session()->get('nama_hasil')[$index]);
            array_push($foto_produk,$request->session()->get('foto_produk')[$index]);

            $hasil_ternak = HasilTernak::join('peternak', 'peternak.id_peternak', '=', 'hasil_ternak.id_peternak')
                            ->join('users', 'users.id', '=', 'peternak.id')
                            ->where('id_hasil_ternak', $request->session()->get('idhasil')[$index])->get();
                
                foreach($hasil_ternak as $ht){
                    array_push($namapeternak,$ht->name);
                    array_push($alamat,$ht->alamat);
                    array_push($notelp,$ht->no_telp);
                }
        }
        //foreach($index as $indexs) {
            //array_push($hargajual,$request->session()->get('harga_jual')[$index]);
        //}
        return view('pembayaran',['indek'=>$indek,'namapeternak'=>$namapeternak,'alamat'=>$alamat,'notelp'=>$notelp,'nama_hasil'=>$nama_hasil,'foto_produk'=>$foto_produk,'hargajual'=>$hargajual,'idhasil' => $idhasil,'jmlpesan' => $jmlpesan]);
    }

    public function simpan_penjualan(Request $request){
        $indek=$request->get('indek');
        $hasil_ternak = HasilTernak::all();
        $jml=count($hasil_ternak);
        $jmlpesan=[];
        $nama_hasil=[];
        $hargajual=[];
        $idhasil=[];
        $methodkirim=$request->get('methodkirim1')[0];
        $methodbayar=$request->get('methodbayar1')[0];
        $biayaantar=0;
        $total=0;
        $total1=0;
        $biayaakomodasi=5000;
		$request->session()->forget('jmlpesan1');

        
        foreach($indek as $indeks){
            $request->session()->push('jmlpesan1',$request->get('jmlpesan')[$indeks]);

            array_push($jmlpesan,$request->get('jmlpesan')[$indeks]);
            array_push($hargajual,$request->session()->get('harga_jual1')[$indeks]);
            array_push($idhasil,$request->session()->get('idhasil')[$indeks]);
            array_push($nama_hasil,$request->session()->get('nama_hasil')[$indeks]);
            $total=$total+($request->get('jmlpesan')[$indeks]*$request->session()->get('harga_jual1')[$indeks]);
        }
        

        
        if($methodkirim==1){
            $biayaantar=10000*count($idhasil);
        }else{
            $biayaantar=0;
        }
        
        $total=$total;
        $total1=$total+$biayaantar+$biayaakomodasi;

        return view('transaksi',['indek'=>$indek,'idhasil'=>$idhasil,'hargajual'=>$hargajual,'nama_hasil'=>$nama_hasil,'total1'=>$total1,'total'=>$total,'jmlpesan'=>$jmlpesan,'methodkirim'=>$methodkirim,'methodbayar'=>$methodbayar,'biayaantar'=>$biayaantar,'biayaakomodasi'=>$biayaakomodasi]);
    }

    public function simpan_transaksi(Request $request){
        /*$hasil_ternak = HasilTernak::all();
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

        
        foreach($indek as $indeks){
            array_push($jmlpesan,$request->get('jmlpesan')[$indeks]);
            array_push($hargajual,$request->session()->get('harga_jual')[$indeks]);
            array_push($idhasil,$request->session()->get('idhasil')[$indeks]);
            array_push($nama_hasil,$request->session()->get('nama_hasil')[$indeks]);
            $total=$total+($request->get('jmlpesan')[$indeks]*$request->session()->get('harga_jual')[$indeks]);
        }

        
        if($methodkirim==1){
            $biayaantar=10000*count($idhasil);
        }else{
            $biayaantar=0;
        }
        
        $total=$total;
        $total1=$total+$biayaantar+$biayaakomodasi;
        
        DB::table('pemesanan_out')->insert([
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
            return view();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
