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
        
        <div class="row">
        @if($id1=="tambah")
            <div class="row-flex">
              <form id="frmHasil" method="post" action="/hasil/tambah/simpan" enctype="multipart/form-data">
              {{ csrf_field() }}

                  <div class="row-flex2">
                    <div style="height:100%;" class="float-mod-left about-img wow fadeInLeft">
                    <hr/>
                    <div>
                      <label class="tebal" style="padding-left:0;">Nama Hasil Ternak</label><br>
                      <input type="text" name="nama" style="width:70%;" placeholder="Masukkan Nama Produk">  
                      <hr/>
                    </div>
                    <div>
                      <label class="tebal" style="padding-left:0;">Foto</label>
                      <br/><img src='#' id='dumfoto' style='display:none;'>
                      <hr/>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="foto" name='foto'>
                        <label class="custom-file-label" for="foto">Choose file</label>
                      </div>
                    </div>
                    <div>
                      <hr/>
                      <label class="tebal" style="padding-left:0;">Deskripsi</label>
                      <p style="height:auto;">
                        <textarea rows="4" cols="50" name="deskripsi" placeholder="Masukkan Deskripsi Produk"></textarea>               
                      </p>
                    </div>
                  </div>

                    <div class="float-mod-right content wow fadeInRight">
                      
                      <hr/>
                      <div class="main-konten">
                        <div class="konten" style="height:80px;">
                          <div class="konten-kiri">
                            <label class="field tebal">Jenis</label>
                          </div>
                          <div class="konten-kanan">
                          <ul>
                              <div class="custom-control custom-radio">
                                  <li><input name="rbjenis" value="1" type="radio" class="custom-control-input" id="rb1" checked >
                                    <label class="custom-control-label" for="rb1">Telur Bebek</label></li>
                              </div>
                              <div class="custom-control custom-radio">
                                  <li><input name="rbjenis" value="2" type="radio"  class="custom-control-input" id="rb2">
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
                              Rp.<input style="width:30%;text-align:center;margin-top:2%;" placeholder='5000' class="field" type="number" size="7" name='hargajual'>,- / Unit
                          </div>
                        </div>
                        <hr/>
                        <div class="konten">
                          <div class="konten-kiri">
                            <label class="field tebal">Persediaan</label>
                          </div>
                          <div class="konten-kanan">
                            <ul class="setnumber" style="margin-top:2%;">
                                <li><input type="button" value="-" id="btnmin">
                                <input type="text" name="persediaan" style="text-align:center;" value=1 id="persediaan" size=3 onKeyPress="return hanyaAngka(this,2)"/>
                                <input type="button" value="+" id="btnadd"></li>
                            </ul>  
                          </div>
                        </div>
                        <hr/>
                        <div class="konten">
                          <div class="konten-kiri">
                            <label class="field tebal">Metode Pembayaran</label>
                          </div>
                          <div class="konten-kanan" style="margin-top:2%;">
                          <ul>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="cb1" name="cbbayar[]" value="1">
                                <label class="custom-control-label" for="cb1">Cash On Delivery</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="cb2" name="cbbayar[]" value="2">
                                <label class="custom-control-label" for="cb2">Transfer Bank</label>
                              </div>
                          </ul>         
                          </div>
                        </div>
                        <hr/>
                        <div class="konten">
                          <div class="konten-kiri">
                            <label class="field tebal">Metode Pengiriman</label>
                          </div>
                          <div class="konten-kanan" style="margin-top:2%;">
                          <ul>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="cb11" name="cbantar[]" value="1">
                                <label class="custom-control-label" for="cb11">Diantar Oleh Peternak</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="cb12" name="cbantar[]" value="2">
                                <label class="custom-control-label" for="cb12">Diambil Oleh Pembeli</label>
                              </div>
                          </ul>         
                          </div>
                        </div>
                        <hr/>
                        <input type="submit" class="btn btn-info" value="Simpan">
                      </div>
                    </div>
                  </div>
              </form>
            </div>
            @include('helper.foto1')
        @else
            @foreach($hasil_ternak as $ht)
              @if($id1=="daftar")
                <div class="row-flex">
                  <h2>{{ $ht->nama_hasil }}</h2>
                    <div class="row-flex2">
                      <div style="height:100%;" class="float-mod-left about-img wow fadeInLeft">
                      <?php 
                        $cc=str_split($ht->foto_produk,12);
                        echo cl_image_tag($cc[0], array("version"=>$cc[1]));
                      ?>
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
                @include('helper.numberinput')
              @else
                  <div class="row-flex">
                    <form id="frmPesanan" method="POST" action="/hasil/edit/simpan" enctype="multipart/form-data">
                    {{ csrf_field() }}
                      <div class="row-flex2">
                        <div style="height:100%;" class="float-mod-left about-img wow fadeInLeft">
                          <hr/>
                            <label class="tebal" style="padding-left:0;">Nama Hasil Ternak</label><br>
                              <input type="text" name="nama" style="width:70%;" value="{{ $ht->nama_hasil }}">  
                              <hr/>
                          <div id="imghide">
                            <?php 
                              $cc=str_split($ht->foto_produk,12);
                              echo cl_image_tag($cc[0], array("version"=>$cc[1]));
                              //echo $cc[0];
                            ?>
                          </div>
                          <img src='#' id='dumfoto'>
                        <hr/>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="foto" name='foto'>
                            <label class="custom-file-label" for="foto">Choose file</label>
                          </div>
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
                    </form>
                  </div>
                  @include('helper.foto1')
                  @include('helper.modal2')
              @endif
            @endforeach
        @endif
        </div>
      </div>
    </section><!-- #about -->

  </main>

@include('layout.footer')