<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PemesananIn;
use App\Models\PemesananOut;

class AdminController extends Controller
{
    public function daftar($id1){
        if($id1=='perlengkapan'){
            \Cloudinary::config(array( 
                "cloud_name" => "achsya03", 
                "api_key" => "358574269653599", 
                "api_secret" => "S6UngykP9cfd2JKh5u6uUaz1WXg", 
                "secure" => true
                ));
            $data = PemesananIn::join('peternak', 'peternak.id_peternak', '=', 'pemesanan_in.id_peternak')
            ->join('users', 'users.id', '=', 'peternak.id')
            ->where([['konfirmasi_pesanan','=','2'],['bukti_bayar','<>','']])
            ->orderBy('tgl_pemesanan', 'ASC')->paginate(12);
            return view('penjualans', ['id1'=>$id1,'data' => $data]);
        }elseif($id1=='produk'){
            \Cloudinary::config(array( 
                "cloud_name" => "achsya03", 
                "api_key" => "358574269653599", 
                "api_secret" => "S6UngykP9cfd2JKh5u6uUaz1WXg", 
                "secure" => true
                ));
            $data = PemesananOut::join('konsumen', 'konsumen.id_konsumen', '=', 'pemesanan_out.id_konsumen')
            ->join('users', 'users.id', '=', 'konsumen.id')
            ->where([['konfirmasi_pesanan','=','2'],['bukti_bayar','<>','']])
            ->orderBy('tgl_pemesanan', 'ASC')->paginate(12);
            return view('penjualans', ['id1'=>$id1,'data' => $data]);
        }
    }

    public function rincian($id1,$id2){
        \Cloudinary::config(array( 
            "cloud_name" => "achsya03", 
            "api_key" => "358574269653599", 
            "api_secret" => "S6UngykP9cfd2JKh5u6uUaz1WXg", 
            "secure" => true
          ));
          if($id1=="perlengkapan"){
            $penjualan = PemesananIn::join('peternak', 'peternak.id_peternak', '=', 'pemesanan_in.id_peternak')
                                        ->join('users', 'users.id', '=', 'peternak.id')
                                        ->join('rinc_in', 'rinc_in.id_pemesanan_in', '=', 'pemesanan_in.id_pemesanan_in')
                                        ->join('produk', 'produk.id_produk', '=', 'rinc_in.id_produk')
                                        ->where('pemesanan_in.id_pemesanan_in','=', $id2)->get();
            return view('konfirmasis', ['id1'=>$id1,'id2'=>$id2,'penjualan' => $penjualan]);
          }else if($id1=="produk"){
            $penjualan = PemesananOut::join('konsumen', 'konsumen.id_konsumen', '=', 'pemesanan_out.id_konsumen')
                                        ->join('users', 'users.id', '=', 'konsumen.id')
                                        ->leftJoin('rinc_out', 'rinc_out.id_pemesanan_out', '=', 'pemesanan_out.id_pemesanan_out')
                                        ->join('hasil_ternak', 'hasil_ternak.id_hasil_ternak', '=', 'rinc_out.id_hasil_ternak')
                                        ->where('rinc_out.id_pemesanan_out','=', $id2)->get();
            return view('konfirmasis', ['id1'=>$id1,'id2'=>$id2,'penjualan' => $penjualan]);
          }
    }

    public function simpan(Request $request,$id1){
        $this->validate($request,[
    		'idpenjualan' => 'required',
        ]);
        
        if($id1=="produk"){
            PemesananOut::where('id_pemesanan_out', $request->idpenjualan)
            ->update([
                'konfirmasi_pesanan' => 3,
                'updated_at' => now()
            ]);
        }else if($id1=="perlengkapan"){
            PemesananIn::where('id_pemesanan_in', $request->idpenjualan)
            ->update([
                'konfirmasi_pesanan' => 3,
                'updated_at' => now()
            ]);
        }
        
    	return redirect('/admin/'.$id1);
    }
}
