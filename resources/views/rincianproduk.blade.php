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
          <h3 class="section-title">Rincian Produk Supplier</h3>
          <span class="section-divider"></span>
        </div>
        <br/>
        
        @foreach($produk_supplier as $ps)
        <div class="row">
          <div class="row-flex">
          <h2>{{ $ps->nama_produk }}</h2>
            <div class="row-flex2">
              <div style="height:100%;" class="float-mod-left about-img wow fadeInLeft">
                <img src="{{ $ps->foto_produk }}" alt="">
                <hr/>
                <label class="tebal" style="padding-left:0;">Informasi Peternak</label>
                <table border=1 style="text-align:center;font-size:12px;width:100%;">
                <tr>
                  <th>Nama Supplier</th>
                  <th>Alamat</th>
                  <th>Nomor Whatsapp</th>
                  <th>Nomor Telepon</th>
                </tr>
                <tr>
                  <td>{{$ps->name}}</td>
                  <td>{{$ps->alamat}}</td>
                  <td>{{$ps->no_wa}}</td>
                  <td>{{$ps->no_telp}}</td>
                </tr>
                </table>
                <hr/>
                    <label class="field tebal">Deskripsi</label>
                <p style="height:auto;">
                  {{ $ps->deskripsi }}                
                </p>
              </div>

              <div class="float-mod-right content wow fadeInRight">
                
                <hr/>
                <div class="main-konten">
                  <form id="frmPesanan" method="get" action="/produk/keranjang">
                  <input type="hidden" name="idproduk" value="{{ $ps->id_produk }}">
                  <div class="konten">
                    <div class="konten-kiri">
                      <label class="field tebal">Jenis</label>
                    </div>
                    <div class="konten-kanan">
                    <label class="field">@if($ps->jenis_produk==1) Pakan Bebek @else Obat Bebek @endif</label>
                    </div>
                  </div>
                  <hr/>
                  <div class="konten">
                    <div class="konten-kiri">
                      <label class="field tebal">Harga Jual</label>
                    </div>
                    <div class="konten-kanan">
                        <label class="field">Rp.{{ $ps->harga_jual }},- / Unit</label>
                    </div>
                  </div>
                  <hr/>
                  <div class="konten">
                    <div class="konten-kiri">
                      <label class="field tebal">Persediaan</label>
                    </div>
                    <div class="konten-kanan">
                        <label class="field">{{ $ps->persediaan }}</label>
                    </div>
                  </div>
                  <hr/>
                  <div class="konten">
                    <div class="konten-kiri">
                      <label class="field tebal">Jumlah Pemesanan</label>
                    </div>
                    <div class="konten-kanan">
                    <ul class="setnumber">
                        <li><input type="button" value="-" id="btnmin">
                        <input type="text" name="jmlpesan" id="jmlpesan" style="text-align:center;" value=1 id="persediaan" size=3 onKeyPress="return hanyaAngka(this,2)"/>
                        <input type="button" value="+" id="btnadd"></li>
                    </ul>
                    </div>
                  </div>
                  <hr/>
                  <input type="submit" class="btn btn-info" value="Masukkan Ke Keranjang">
                  </form>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section><!-- #about -->

  </main>

@include('helper.numberinput1')
@include('layout.footer')