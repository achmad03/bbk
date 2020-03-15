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

          <div class="row">
            <div class="row-flex">
              <div class="row-flex2">
                <div style="height:100%;" class="float-mod-left about-img wow fadeInLeft">
                  <h2>Panduan Pembayaran</h2>
                  <hr/>
                 @if($methodbayar==1)
                  <div id="panduan1">
                    <h6>Pembayaran Dengan Cash On Delivery</h6>
                    <ol>
                        <li>Pembayaran dilakukan saat pembeli mengambil barang ke lokasi peternak.</li>
                        <li>Pembayaran dilakukan saat peternak mengantar pesanan ke pembeli.</li>
                    </ol>
                  </div>
                  @else
                  <div id="panduan2">
                    <h6>Pembayaran Dengan Transfer Bank</h6>
                    <ol>
                        <li>Pembayaran ini menggunakan perantara Beeiiibek dalam menyalurkan pembayaran.</li>
                        <li>Pembeli akan menerima Nomor Rekening sebagai tujuan awal transfer.</li>
                        <li>Proses transfer hanya bisa dilakukan maksimal 24 jam setelah pemesanan.</li>
                        <li>Akan dilakukan konfirmasi oleh pihak Beeiiibek bahwa transfer diterima.</li>
                        <li>Pembeli akan mendapat informasi untuk pengiriman pesanan.</li>
                        <li>Transfer uang ke peternak dilakukan setelah pembeli melakukan konfirmasi penerimaan.</li>
                    </ol>
                  </div>
                  @endif
                </div>

                <div class="float-mod-right content wow fadeInRight">
                  <h2>Proses Transaksi</h2>
                  <hr/>
                  <h6>Rincian Biaya</h6>
                    <table style="width:100%">
                        <tr>
                            <th>Nama Biaya</th><th>Sub-Total</th>
                        </tr>
                        <tr>
                            <td>Pembelian Hasil Ternak
                                <ul class="texttabel" style="padding-left:5%;">
                                    @foreach($nama_hasil as $nama)
                                        <li>{{$nama}}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>Rp.{{number_format($total,2,",",".")}},-
                                <ul class="texttabel">
                                    <?php 
                                        for($i=0;$i<count($jmlpesan);$i++){
                                            echo "<li>Rp.".number_format($jmlpesan[$i]*$hargajual[$i],2,",",".")."</li>";
                                        }
                                    ?>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>Pengantaran</td><td>Rp.{{number_format($biayaantar,2,",",".")}},-</td>
                        </tr>
                        <tr>
                            <td>Administrasi</td><td>Rp.{{number_format($biayaakomodasi,2,",",".")}},-</td>
                        </tr>
                            
                    </table>
                  <hr/>
                    <div class="tebal" style="text-align:left;width:100%;padding-left:0;">Total Biaya : Rp.{{number_format($total1,2,",",".")}},-</div>
                  <hr/>
                  <h6>Nomor Rekening</h6>
                    <div class="tebal" style="text-align:left;">Bank Mandiri<br>
                    1625-2716-726<br>
                    Atas Nama "Beeiiibek Dev".</div>
                  <hr/>
                  
                  <form id="frmTransaksi" method="get" action="/hasil/keranjang/pembayaran/simpan">
                        @foreach($indek as $indeks)
                            <input type="hidden" value="{{$indeks}}" name="indek[]">
                        @endforeach  
                        <input type="hidden" value="{{$methodbayar}}" name="methodbayar">
                        <input type="hidden" value="{{$methodkirim}}" name="methodkirim">
                    <a style="color:#fff;" class="btn btn-info" data-toggle="modal" data-target="#myModal2">Pembayaran</a>
                    @include('helper.modals1')
                  </form>

              </div>
            </div>
          </div>
          
        </form> 
      </div>
    </section><!-- #about -->

  </main>


@include('layout.footer')