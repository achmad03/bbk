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
