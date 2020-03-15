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
          <h3 class="section-title">Rincian Hasil Ternak</h3>
          <span class="section-divider"></span>
        </div>
        <br/>
        
        @foreach($hasil_ternak as $ht)
        <div class="row">
          <div class="row-flex">
          <h2>{{ $ht->nama_hasil }}</h2>
            <div class="row-flex2">
              <div style="height:100%;" class="float-mod-left about-img wow fadeInLeft">
                <img src="{{ $ht->foto_produk }}" alt="">
                <hr/>
                <label class="tebal" style="padding-left:0;">Informasi Peternak</label>
                <table border=1 style="text-align:center;font-size:12px;width:100%;">
                <tr>
                  <th>Nama Peternak</th>
                  <th>Alamat</th>
                  <th>Nomor Whatsapp</th>
                  <th>Nomor Telepon</th>
                </tr>
                <tr>
                  <td>{{$ht->nama}}</td>
                  <td>{{$ht->alamat}}</td>
                  <td>{{$ht->no_wa}}</td>
                  <td>{{$ht->no_telp}}</td>
                </tr>
                </table>
                <hr/>
                <p style="height:auto;">
                  {{ $ht->deskripsi }}                
                </p>
              </div>

              <div class="float-mod-right content wow fadeInRight">
                
                <hr/>
                <div class="main-konten">
                  <form id="frmPesanan" method="get" action="/hasil/keranjang">
                  <input type="hidden" name="idhasil" value="{{ $ht->id_hasil_ternak }}">
                  <div class="konten">
                    <div class="konten-kiri">
                      <label class="field tebal">Jenis</label>
                    </div>
                    <div class="konten-kanan">
                    <label class="field">@if($ht->jenis_hasil==1) Telur Bebek @else Bebek Afkir @endif</label>
                    </div>
                  </div>
                  <hr/>
                  <div class="konten">
                    <div class="konten-kiri">
                      <label class="field tebal">Harga Jual</label>
                    </div>
                    <div class="konten-kanan">
                        <label class="field">Rp.{{ $ht->harga_jual }},- / @if($ht->jenis_hasil==1) Telur Bebek @else Bebek Afkir @endif</label>
                    </div>
                  </div>
                  <hr/>
                  <div class="konten">
                    <div class="konten-kiri">
                      <label class="field tebal">Persediaan</label>
                    </div>
                    <div class="konten-kanan">
                        <label class="field">{{ $ht->persediaan }}</label>
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

@include('helper.numberinput')
@include('layout.footer')