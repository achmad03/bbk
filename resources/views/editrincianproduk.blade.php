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
        
        
        <form id="frmEditProduk" method="POST" action="/produk/edit/simpan" enctype="multipart/form-data">
        
        {{ csrf_field() }}
        @foreach($produk_supplier as $ps)
        <div class="row">
          <div class="row-flex">
            <div class="row-flex2">
              <div style="height:100%;" class="float-mod-left about-img wow fadeInLeft">
              <hr/>
                <label class="tebal" style="padding-left:0;">Nama Produk</label><br>
                  <input type="text" name="nama" style="width:70%;" value="{{ $ps->nama_produk }}">  
              <hr/>
                <img src="{{ $ps->foto_produk }}" alt=""><hr/>
                <input id="foto" type="file" class="form-control" name="foto" required>
                <hr/>
                    <label class="tebal" style="padding-left:0;">Deskripsi</label>
                <p style="height:auto;">
                  <textarea rows="4" cols="50" name="deskripsi">{{ $ps->deskripsi }}</textarea>               
                </p>
              </div>

              <div class="float-mod-right content wow fadeInRight">
                
                <hr/>
                <div class="main-konten">
                  <input type="hidden" name="idproduk" value="{{ $ps->id_produk }}">
                  <div class="konten" style="height:180px;">
                    <div class="konten-kiri">
                      <label class="field tebal">Jenis</label>
                    </div>
                    <div class="konten-kanan" style="height:40px;">
                    <ul>
                        <div class="custom-control custom-radio">
                            <li><input name="rbpakan" value="0" type="radio" class="custom-control-input" id="rb1" @if( $ps->jenis_produk==0 ) checked @endif >
                              <label class="custom-control-label" for="rb1">Pakan Bebek</label></li>
                        </div>
                        <div class="custom-control custom-radio">
                            <li><input name="rbpakan" value="1" type="radio"  class="custom-control-input" id="rb2" @if( $ps->jenis_produk==1 ) checked @endif >
                              <label class="custom-control-label" for="rb2">Obat Bebek</label></li>
                        </div>
                        
                        <div class="custom-control custom-radio">
                            <li><input name="rbpakan" value="2" type="radio"  class="custom-control-input" id="rb3" @if( $ps->jenis_produk==2 ) checked @endif >
                              <label class="custom-control-label" for="rb3">Bebek Anakan</label></li>
                        </div>
                        
                        <div class="custom-control custom-radio">
                            <li><input name="rbpakan" value="3" type="radio"  class="custom-control-input" id="rb4" @if( $ps->jenis_produk==3 ) checked @endif >
                              <label class="custom-control-label" for="rb4">Bebek Siap Telur</label></li>
                        </div>

                        
                        <div class="custom-control custom-radio">
                            <li><input name="rbpakan" value="4" type="radio"  class="custom-control-input" id="rb5" @if( $ps->jenis_produk==4 ) checked @endif >
                              <label class="custom-control-label" for="rb5">Perlengkapan Kandang / (10 m X 10 m)</label></li>
                        </div>
                    </ul>         
                    </div>
                  </div>
                  <hr/>
                  <div class="konten">
                    <div class="konten-kiri">
                      <label class="field tebal">Harga Jual</label>
                    </div>
                    <div class="konten-kanan">
                        Rp.<input style="width:30%;text-align:center;" class="field" type="number" size="7" value="{{ $ps->harga_jual }}" name='hargajual'>,- / Unit
                    </div>
                  </div>
                  <hr/>
                  <div class="konten">
                    <div class="konten-kiri">
                      <label class="field tebal">Persediaan</label>
                    </div>
                    <div class="konten-kanan">
                        <label class="field tebal">{{ $ps->persediaan }}</label>
                    </div>
                  </div>
                  <hr/>
                  <input type="submit" class="btn btn-info" value="Simpan">
                </div>
              </div>
            </div>
          </div>
          @endforeach
         </form>
        </div>
      </div>
    </section><!-- #about -->

  </main>

@include('helper.numberinput1')
@include('layout.footer')