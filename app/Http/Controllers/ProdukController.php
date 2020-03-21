<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        if($id!='tambah'){
            \Cloudinary::config(array( 
            "cloud_name" => "achsya03", 
            "api_key" => "358574269653599", 
            "api_secret" => "S6UngykP9cfd2JKh5u6uUaz1WXg", 
            "secure" => true
            ));
            $produk_supplier = Produk::paginate(12);
            return view('produk', ['id'=>$id,'produk_supplier' => $produk_supplier]);
        }elseif($id=='tambah'){
            return view('rincianproduk', ['id1'=>$id]);
        }
    }

    public function foto(Request $request){
        $request->session()->put('fotoproduk',$request->foto);
        $foto=1;
        return redirect('/produk/tambah',['foto'=>$foto]);
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

        $produk_supplier = Produk::all();
        $jml=count($produk_supplier);
        $new_id_product=600000+$jml+1;
        
            \Cloudinary::config(array( 
                "cloud_name" => "achsya03", 
                "api_key" => "358574269653599", 
                "api_secret" => "S6UngykP9cfd2JKh5u6uUaz1WXg", 
                "secure" => true
              ));
              $slug=$new_id_product;
    
              $file=$_FILES['foto']['tmp_name'];
              $aa=\Cloudinary\Uploader::upload($file,array("folder" => "Produk/", "public_id"=>$slug,"overwrite" => TRUE));  
    
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
       
        Produk::insert([
    		'id_produk' => $new_id_product,
    		'id_supplier_in' => 30001,
    		'nama_produk' => $request->nama,
    		'deskripsi' => $request->deskripsi,
    		'jenis_produk' => $request->rbjenis,
    		'metode_bayar' => $idbayar,
    		'metode_kirim' => $idantar,
    		'harga_jual' => $request->hargajual,
    		'persediaan' => $request->persediaan,
    		'foto_produk' => '/Produk/'.$slug.$version,
    		'updated_at' => now()
    	]);

          
        $produk_supplier = Produk::paginate(12);
        return redirect('/produk/edit');
    }

    public function editdaftar(){
        $produk_supplier = Produk::paginate(12);
    	return view('produkedit', ['produk_supplier' => $produk_supplier]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id1,$id2){
        \Cloudinary::config(array( 
            "cloud_name" => "achsya03", 
            "api_key" => "358574269653599", 
            "api_secret" => "S6UngykP9cfd2JKh5u6uUaz1WXg", 
            "secure" => true
          ));
        $produk_supplier = Produk::join('supplier_in', 'supplier_in.id_supplier_in', '=', 'produk.id_supplier_in')
                                    ->join('users', 'users.id', '=', 'supplier_in.id')
                                    ->where('id_produk', $id2)->get();
    	return view('rincianproduk', ['id1'=>$id1,'id2'=>$id2,'produk_supplier' => $produk_supplier]);
    }

    public function show1($id1,$id2){
        \Cloudinary::config(array( 
            "cloud_name" => "achsya03", 
            "api_key" => "358574269653599", 
            "api_secret" => "S6UngykP9cfd2JKh5u6uUaz1WXg", 
            "secure" => true
          ));
          $slug=$id2;

          $file=$_FILES['file']['tmp_name'];
          $aa=\Cloudinary\Uploader::upload($file,array("folder" => "Produk/", "public_id"=>$slug,"overwrite" => TRUE));  

          extract($aa);

        Produk::where('id_produk', $id2)
        ->update([
            'foto_produk' => '/Produk/'.$slug.$version,
            'updated_at' => now()
          ]);
        
            
        
    	return redirect('/produk/rincian/'.$id1.'/'.$id2);
    }

    public function editsimpan(Request $request){
        $this->validate($request,[
    		'idproduk' => 'required',
    		'nama' => 'required',
    		'deskripsi' => 'required',
    		'rbpakan' => 'required',
    		'hargajual' => 'required',
        ]);
        
        if(isset($request->foto)){
            \Cloudinary::config(array( 
                "cloud_name" => "achsya03", 
                "api_key" => "358574269653599", 
                "api_secret" => "S6UngykP9cfd2JKh5u6uUaz1WXg", 
                "secure" => true
              ));
              $slug=$request->idproduk;
    
              $file=$_FILES['file']['tmp_name'];
              $aa=\Cloudinary\Uploader::upload($file,array("folder" => "Bebek/", "public_id"=>$slug,"overwrite" => TRUE));  
    
              extract($aa);
            Produk::where('id_produk', $request->idproduk)
            ->update([
                'foto_produk' => '/Produk/'.$slug.$version,
                'updated_at' => now()
            ]);
        }

       
        Produk::where('id_produk', $request->idproduk)
        ->update([
            'nama_produk' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'jenis_produk' => $request->rbpakan,
            'harga_jual' => $request->hargajual,
            'updated_at' => now()
          ]);

        return redirect('/produk/edit');
    }

    public function editrincian($id){
        $produk_supplier = Produk::join('supplier_in', 'supplier_in.id_supplier_in', '=', 'produk.id_supplier_in')
        ->join('users', 'users.id', '=', 'supplier_in.id')
        ->where('id_produk', $id)->get();
            return view('editrincianproduk', ['produk_supplier' => $produk_supplier]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        //
    }

    public function keranjang(Request $request){
        $this->validate($request,[
    		'idproduk' => 'required',
    		'jmlpesan' => 'required',
        ]);

        $conter=0;
        try {
            $conter=count($request->session()->get('idproduk1'));
        } catch (\Throwable $th) {
            $conter=0;
        }
        
        
        if($conter==0 || ($request->session()->get('idproduk1')[$conter-1]!=$request->idproduk))
        {

            $request->session()->push('idproduk1',$request->idproduk);
            $request->session()->push('jmlpesan1',$request->jmlpesan);
            
            $produk_supplier = Produk::where('id_produk', $request->idproduk)->get();

            foreach ($produk_supplier as $ps) {
                $request->session()->push('nama_produk1',$ps->nama_produk);
                $request->session()->push('foto_produk1',$ps->foto_produk);
                $request->session()->push('harga_jual1',$ps->harga_jual);
            }
        }
        
        $idproduk=$request->session()->get('idproduk1');
        $jmlpesan=$request->session()->get('jmlpesan1');
        $nama_produk=$request->session()->get('nama_produk1');
        $foto_produk=$request->session()->get('foto_produk1');
        $harga_jual=$request->session()->get('harga_jual1');
        

    	return view('keranjangproduk',['nama_produk'=>$nama_produk,'foto_produk'=>$foto_produk,'harga_jual'=>$harga_jual,'idproduk' => $idproduk,'jmlpesan' => $jmlpesan]);
    }

    public function simpan_keranjang(Request $request){
        if($request->btn=="Lakukan Pembayaran"){
            $index=$request->get('indexproduk');
            $indek=[];
            $jmlpesan=[];
            $hargajual=[];
            $idproduk=[];
            $nama_produk=[];
            $foto_produk=[];
            $namasupplier=[];
            $alamat=[];
            $notelp=[];

            foreach($index as $indexs){
                $index=$indexs;
                array_push($indek,$request->get('indexproduk')[$index]);
                array_push($jmlpesan,$request->get('jmlpesan')[$index]);
                array_push($hargajual,$request->session()->get('harga_jual1')[$index]);
                array_push($idproduk,$request->session()->get('idproduk1')[$index]);
                array_push($nama_produk,$request->session()->get('nama_produk1')[$index]);
                array_push($foto_produk,$request->session()->get('foto_produk1')[$index]);

                $produk_supplier = Produk::join('supplier_in', 'supplier_in.id_supplier_in', '=', 'produk.id_supplier_in')
                                ->join('users', 'users.id', '=', 'supplier_in.id')
                                ->where('id_produk', $request->session()->get('idproduk1')[$index])->get();
                    
                    foreach($produk_supplier as $ps){
                        array_push($namasupplier,$ps->name);
                        array_push($alamat,$ps->alamat);
                        array_push($notelp,$ps->no_telp);
                    }
            }
            //foreach($index as $indexs) {
                //array_push($hargajual,$request->session()->get('harga_jual')[$index]);
            //}
            return view('pembayaranproduk',['indek'=>$indek,'namasupplier'=>$namasupplier,'alamat'=>$alamat,'notelp'=>$notelp,'nama_produk'=>$nama_produk,'foto_produk'=>$foto_produk,'hargajual'=>$hargajual,'idproduk' => $idproduk,'jmlpesan' => $jmlpesan]);
        }else{

            /*$idproduk=[];
            $jmlpesan=[];
            $nama_produk=[];
            $foto_produk=[];
            $harga_jual=[];
            
            for($i=0;$i<count($request->session()->get('idproduk1'));$i++){
                foreach()
            }
            if($conter==0 || ($request->session()->get('idproduk1')[$conter-1]!=$request->idproduk))
            {
    
                $request->session()->push('idproduk1',$request->idproduk);
                $request->session()->push('jmlpesan1',$request->jmlpesan);
                
                $produk_supplier = Produk::where('id_produk', $request->idproduk)->get();
    
                foreach ($produk_supplier as $ps) {
                    $request->session()->push('nama_produk1',$ps->nama_produk);
                    $request->session()->push('foto_produk1',$ps->foto_produk);
                    $request->session()->push('harga_jual1',$ps->harga_jual);
                }
            }
            
            $idproduk=$request->session()->get('idproduk1');
            $jmlpesan=$request->session()->get('jmlpesan1');
            $nama_produk=$request->session()->get('nama_produk1');
            $foto_produk=$request->session()->get('foto_produk1');
            $harga_jual=$request->session()->get('harga_jual1');
            */

            return view('keranjangproduk',['nama_produk'=>$nama_produk,'foto_produk'=>$foto_produk,'harga_jual'=>$harga_jual,'idproduk' => $idproduk,'jmlpesan' => $jmlpesan]);
        }
    }

    public function daftar(Request $request){

        $idproduk=$request->session()->get('idproduk1');
        $jmlpesan=$request->session()->get('jmlpesan1');
        $nama_produk=$request->session()->get('nama_produk1');
        $foto_produk=$request->session()->get('foto_produk1');
        $harga_jual=$request->session()->get('harga_jual1');
        
        if($idproduk==null){
            $idproduk=-1;
        }

        return view('keranjangproduk',['idproduk'=>$idproduk,'nama_produk'=>$nama_produk,'foto_produk'=>$foto_produk,'harga_jual'=>$harga_jual,'idproduk' => $idproduk,'jmlpesan' => $jmlpesan]);
    }

    public function simpan_penjualan(Request $request){
        $indek=$request->get('indek');
        $produk_supplier = Produk::all();
        $jml=count($produk_supplier);
        $jmlpesan=[];
        $nama_produk=[];
        $hargajual=[];
        $idproduk=[];
        $methodkirim=$request->get('methodkirim')[0];
        $methodbayar=$request->get('methodbayar')[0];
        $biayaantar=0;
        $total=0;
        $total1=0;
        $biayaakomodasi=5000;
		$request->session()->forget('jmlpesan1');

        
        foreach($indek as $indeks){
            $request->session()->push('jmlpesan1',$request->get('jmlpesan')[$indeks]);

            array_push($jmlpesan,$request->get('jmlpesan')[$indeks]);
            array_push($hargajual,$request->session()->get('harga_jual1')[$indeks]);
            array_push($idproduk,$request->session()->get('idproduk1')[$indeks]);
            array_push($nama_produk,$request->session()->get('nama_produk1')[$indeks]);
            $total=$total+($request->get('jmlpesan')[$indeks]*$request->session()->get('harga_jual1')[$indeks]);
        }
        

        
        if($methodkirim==1){
            $biayaantar=10000*count($idproduk);
        }else{
            $biayaantar=0;
        }
        
        $total=$total;
        $total1=$total+$biayaantar+$biayaakomodasi;

        return view('transaksiproduksi',['indek'=>$indek,'idproduk'=>$idproduk,'hargajual'=>$hargajual,'nama_produk'=>$nama_produk,'total1'=>$total1,'total'=>$total,'jmlpesan'=>$jmlpesan,'methodkirim'=>$methodkirim,'methodbayar'=>$methodbayar,'biayaantar'=>$biayaantar,'biayaakomodasi'=>$biayaakomodasi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //
    }
}
