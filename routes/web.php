<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('home');
});

//Route::get('/home1', function () {
//    return view('home1');
//});

Route::get('/about', function () {
    return view('aboutus');
});

Route::get('/masuk', function () {
    return view('masuk');
});

Route::get('/daftar', function () {
    return view('daftar');
});

Route::get('/table', function () {
    return view('table');
});

Route::get('/profile/{id}', 'ProfileController@tampil');
Route::post('/profil/edit', 'ProfileController@edit');

Route::get('/tampil', 'HasilTernakController@tampilkanSession');
Route::get('/buat', 'HasilTernakController@buatSession');
Route::get('/tambah', 'HasilTernakController@tambahSession');
Route::get('/hapus', 'HasilTernakController@hapusSession');

Route::get('/hasil/{id}', 'HasilTernakController@index');
Route::get('/hasil/tambah', 'HasilTernakController@tambah');
Route::post('/hasil/tambah/simpan', 'HasilTernakController@tambahsimpan');
Route::get('/hasil/rincian/{id1}/{id2}', 'HasilTernakController@show');
Route::post('/hasil/rincian/{id1}/{id2}', 'HasilTernakController@show1');
Route::get('/hasil/keranjang/daftar', 'HasilTernakController@daftar');
Route::get('/hasil/keranjang', 'HasilTernakController@keranjang');
Route::get('/hasil/keranjang/simpan', 'HasilTernakController@simpan_keranjang');
Route::get('/hasil/keranjang/pembayaran', 'HasilTernakController@simpan_penjualan');
Route::get('/hasil/keranjang/pembayaran/simpan', 'HasilTernakController@simpan_transaksi');

Route::get('/hasil/edit/rincian/{id}', 'HasilTernakController@editrincian');
Route::post('/hasil/edit/simpan', 'HasilTernakController@editsimpan');


Route::get('/konsumen', 'KonsumenController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/produk/{id}', 'ProdukController@index');

Route::post('/produk/foto', 'ProdukController@foto');
Route::post('/produk/tambah/simpan', 'ProdukController@tambahsimpan');

Route::post('/produk/edit/simpan', 'ProdukController@editsimpan');

Route::get('/produk/rincian/{id1}/{id2}', 'ProdukController@show');
Route::post('/produk/rincian/{id1}/{id2}', 'ProdukController@show1');
Route::get('/produk/keranjang', 'ProdukController@keranjang');
Route::get('/produk/keranjang/simpan', 'ProdukController@simpan_keranjang');
Route::get('/produk/keranjang/daftar', 'ProdukController@daftar');
Route::get('/produk/keranjang/pembayaran', 'ProdukController@simpan_penjualan');

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

//Daftar Hasil Ternak dan Produk
Route::get('/daftar/{id1}', 'HasilAndProdukController@daftar');

//Rincian Hasil Ternak dan Produk
Route::get('/daftar/{id1}/{id2}/{id3}', 'HasilAndProdukController@rincian');
Route::get('/daftar/{id1}/{id2}', 'HasilAndProdukController@tambah');

//Keranjang Hasil Ternak dan Produk
Route::post('/keranjang/simpan/{id1}', 'HasilAndProdukController@keranjang');
Route::get('/keranjang/{id1}', 'HasilAndProdukController@tampilkeranjang');
Route::post('/keranjang/{id1}/bayar', 'HasilAndProdukController@bayarbelanjaan');
Route::post('/keranjang/{id1}/konfirmasi', 'HasilAndProdukController@konfirmasibelanjaan');
Route::post('/keranjang/perlengkapan/simpan', 'HasilAndProdukController@simpanbelanjaanperlengkapan');
Route::post('/keranjang/produk/simpan', 'HasilAndProdukController@simpanbelanjaanproduk');

//Route::post('/pembelian/{id1}', 'HasilAndProdukController@simpanbelanjaanperlengkapan');

//Admin
Route::get('/admin/{id1}', 'AdminController@daftar');
Route::get('/admin/{id1}/konfirmasi/{id2}', 'AdminController@rincian');
Route::post('/admin/{id1}/simpan', 'AdminController@simpan');

//Tambah
Route::get('/{id1}/tambah', 'HasilAndProdukController@tambah');


Route::get('/api', 'ProdukController@index1');
Route::get('/api/create', 'ProdukController@tambahsimpan');
Route::get('/api/show/{nama}', 'ProdukController@show11');


Route::get('/test1/{id1}', 'HasilAndProdukController@test11');
Route::get('/test1/tambah', 'HasilAndProdukController@test12');
Route::get('/test1/kurang', 'HasilAndProdukController@test13');