@include('layout.header')

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro" style="height:100px;">

  </section><!-- #intro -->

  <main id="main">

<!--==========================
      About Us Section
    ============================-->
    <section id="about" class="section-bg">
      <div class="container-fluid">
        <div class="section-header">
          <h3 class="section-title">Pembayaran Pembelian</h3>
          <span class="section-divider"></span>
        </div>
        <br/>

        <form id="frmPembayaran" method="get" action="/produk/keranjang/pembayaran">

          <div class="row">
            <div class="row-flex">
              <div class="row-flex2">
                <div style="height:100%;" class="float-mod-left about-img wow fadeInLeft">
                  <h2>Daftar Belanjaan</h2>
                    <hr/>
                <table style="text-align:center;width:100%;">
                  <tr>
                      <th class="kolkeranjang1">
                          #
                      </th>
                      <th class="kolkeranjang2">
                          Nama
                      </th>
                      <th class="kolkeranjang3">
                          Foto
                      </th>
                      <th class="kolkeranjang4">
                          Quantity
                      </th>
                      <th class="kolkeranjang5">
                          Harga Satuan
                      </th>
                      <th class="kolkeranjang6">
                          Sub-Total
                      </th>
                  </tr>
                  <?php $total=0; ?>
                  @for ($i = 0; $i < count($idproduk); $i++)
                    <input type="hidden" name="indek[]" value="{{$indek[$i]}}">
                          <tr class="btnrow" for="cb{{$i}}">
                              <td class="kolkeranjang1">
                              </td>
                              <td class="kolkeranjang2">
                                  <h7 class="title" style="font-weight:700;">{{$nama_produk[$i]}}</h7>
                              </td>
                              <td class="kolkeranjang3">
                                  <img style="height:auto;width:50%;margin-left:auto;margin-right:auto;" src="{{$foto_produk[$i]}}">
                              </td>
                              <td class="kolkeranjang4">
                                  <input style="width:80%;" class="in1 btn btn-secondary" onclick="kurang({{$i}})" type="button" value="-" id="btnmin{{$i}}">
                                  <input style="width:80%;text-align:center;" class="in1" type="text" name="jmlpesan[]" id="jmlpesan{{$i}}" style="text-align:center;" value="{{$jmlpesan[$i]}}" id="persediaan" size=2 onKeyPress="return hanyaAngka(this,2)"/>
                                  <input style="width:80%;" class="in1 btn btn-secondary" onclick="tambah({{$i}})" type="button" value="+" id="btnadd{{$i}}"></li>
                              </td>
                              <td class="kolkeranjang5">
                                  <h7 class="title" style="font-weight:700;">Rp.{{$hargajual[$i]}},- / Unit</h7>
                                  <input type="hidden" value="{{$hargajual[$i]}}" id="hargajual{{$i}}">
                              </td>
                              <td class="kolkeranjang6">
                                  <h7 class="title" id="totalbayar{{$i}}" style="font-weight:700;">Rp.{{$jmlpesan[$i]*$hargajual[$i]}},-</h7>
                              </td>
                          </tr>
                          <div>
                            <tr class="texttabel">
                              <td colspan=3>Nama Supplier </td><td colspan=3>{{$namasupplier[$i]}}</td>
                            </tr>
                            <tr class="texttabel">
                              <td colspan=3>Alamat </td><td colspan=3>{{$alamat[$i]}}</td>
                            </tr>
                            <tr class="texttabel">
                              <td colspan=3>Nomor Telepon </td><td colspan=3>{{$notelp[$i]}}</td>
                            </tr>
                          </div>
                        <?php $total=$total+($jmlpesan[$i]*$hargajual[$i]) ?>
                  @include('helper.keranjang2')
                  @include('helper.enablebutton1')
                  @endfor
                  </table>
                    <hr/>
                  <h4 id="totalbayar" style="padding-left:0;" class="tebal">Total Bayar : Rp.{{$total}},-</h4>
                </div>

                <div class="float-mod-right content wow fadeInRight">
                  <h2>Proses Transaksi</h2>
                    <hr/>
                    <div class="main-konten">
                      <div class="konten">
                        <div class="konten-kiri">
                          <label class="field tebal">Metode Pengiriman</label>
                        </div>
                        <div class="konten-kanan">
                          <ul>
                            <div class="custom-control custom-radio">
                              <li><input name="methodkirim" value="1" type="radio" checked onclick="cek(this)" class="custom-control-input" id="rbpeternak">
                              <label class="custom-control-label" for="rbpeternak">Diantar Oleh Peternak</label></li>
                            </div>
                            <div class="custom-control custom-radio">
                              <li><input name="methodkirim" value="2" type="radio"  class="custom-control-input" id="rbkonsumen">
                              <label class="custom-control-label" for="rbkonsumen">Diambil Oleh Pembeli</label></li>
                            </div>
                          </ul>                    
                        </div>                  
                      </div>
                      <label id="labelbayar" class="texttabel" style="padding-left:5%;">Note : Untuk biaya pengantaran oleh peternak sebesar Rp.10.000,- dari tiap pesanan.</label>
                      <hr/>
                      <div class="konten">
                        <div class="konten-kiri">
                          <label class="field tebal">Metode Pembayaran</label>
                        </div>
                        <div class="konten-kanan">
                        <ul>
                          <div class="custom-control custom-radio">
                            <li><input name="methodbayar" value="1" type="radio" checked class="custom-control-input" id="rbcod">
                            <label class="custom-control-label" for="rbcod">Cash On Delivery</label></li>
                          </div>
                          <div class="custom-control custom-radio">
                            <li><input name="methodbayar" value="2" type="radio" class="custom-control-input" id="rbtransfer">
                            <label class="custom-control-label" for="rbtransfer">Transfer Bank</label></li>
                          </div>
                        </ul>
                        </div>
                      </div>
                      <hr/>
                      <input type="submit" class="btn btn-info" value="Lakukan Pembayaran">

                    </div>
              </div>
            </div>
          </div>
          
        </form> 
      </div>
    </section><!-- #about -->

  </main>

@include('layout.footer')