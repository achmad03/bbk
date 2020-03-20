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
        
        <form id="frmPesanan" method="POST" action="/hasil/edit/simpan" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="row">
            @foreach($hasil_ternak as $ht)
              <div class="row-flex">
                <div class="row-flex2">
                <div style="height:100%;" class="float-mod-left about-img wow fadeInLeft">
                  <hr/>
                    <label class="tebal" style="padding-left:0;">Nama Hasil Ternak</label><br>
                      <input type="text" name="nama" style="width:70%;" value="{{ $ht->nama_hasil }}">  
                  <hr/>
                  <?php echo cl_image_tag($ht->foto_produk, array("secure"=>true, "transformation"=>array(array("width"=>640, "height"=>480)))); ?>
                    <input id="foto" type="file" class="form-control" name="foto" required>
                    <hr/>
                    <label class="tebal" style="padding-left:0;">Deskripsi</label>
                    
                      <textarea rows="4" cols="50" name="deskripsi">{{ $ht->deskripsi }}</textarea>               
                    
                  </div>

                  <div class="float-mod-right content wow fadeInRight">
                    
                    <hr/>
                    <div class="main-konten">
                      <input type="hidden" name="idhasil" value="{{ $ht->id_hasil_ternak }}">
                      <div class="konten">
                        <div class="konten-kiri">
                          <label class="field tebal">Jenis</label>
                        </div>
                        <div class="konten-kanan">

                        <ul>
                            <div class="custom-control custom-radio">
                                <li><input name="rbjenis" value="1" type="radio" class="custom-control-input" id="rb1" @if( $ht->jenis_hasil==1 ) checked @endif >
                                  <label class="custom-control-label" for="rb1">Telur Bebek</label></li>
                            </div>
                            <div class="custom-control custom-radio">
                                <li><input name="rbjenis" value="2" type="radio"  class="custom-control-input" id="rb2" @if( $ht->jenis_hasil==2 ) checked @endif >
                                  <label class="custom-control-label" for="rb2">Bebek Afkir</label></li>
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
                        Rp.<input style="width:30%;text-align:center;" class="field" type="number" size="7" value="{{ $ht->harga_jual }}" name='hargajual'>,- / Unit
                        </div>
                      </div>
                      <hr/>
                      <div class="konten">
                        <div class="konten-kiri">
                          <label class="field tebal">Persediaan</label>
                        </div>
                        <div class="konten-kanan">
                            <label class="field tebal">{{ $ht->persediaan }}</label>
                        </div>
                      </div>
                      <hr/>
                      <input type="submit" class="btn btn-info" value="Simpan">
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
         </form>
    </section><!-- #about -->

  </main>

@include('helper.numberinput')
@include('layout.footer')