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
        
        <div class="row">
          @if($id1=="tambah")
            <div class="row-flex">
              <form id="frmProduk" method="post" action="/produk/tambah/simpan" enctype="multipart/form-data">
              {{ csrf_field() }}

                  <div class="row-flex2">
                    <div style="height:100%;" class="float-mod-left about-img wow fadeInLeft">
                    <hr/>
                    <div>
                      <label class="tebal" style="padding-left:0;">Nama Produk</label><br>
                      <input type="text" name="nama" style="width:70%;" placeholder="Masukkan Nama Produk">  
                      <hr/>
                    </div>
                    <div>
                      <label class="tebal" style="padding-left:0;">Foto Produk</label>
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
                        <div class="konten" style="height:180px;">
                          <div class="konten-kiri">
                            <label class="field tebal">Jenis</label>
                          </div>
                          <div class="konten-kanan">
                          <ul>
                              <div class="custom-control custom-radio">
                                  <li><input name="rbjenis" value="0" type="radio" class="custom-control-input" id="rb1" checked >
                                    <label class="custom-control-label" for="rb1">Pakan Bebek</label></li>
                              </div>
                              <div class="custom-control custom-radio">
                                  <li><input name="rbjenis" value="1" type="radio"  class="custom-control-input" id="rb2">
                                    <label class="custom-control-label" for="rb2">Obat Bebek</label></li>
                              </div>
                              
                              <div class="custom-control custom-radio">
                                  <li><input name="rbjenis" value="2" type="radio"  class="custom-control-input" id="rb3">
                                    <label class="custom-control-label" for="rb3">Bebek Anakan</label></li>
                              </div>
                              
                              <div class="custom-control custom-radio">
                                  <li><input name="rbjenis" value="3" type="radio"  class="custom-control-input" id="rb4">
                                    <label class="custom-control-label" for="rb4">Bebek Siap Telur</label></li>
                              </div>

                              
                              <div class="custom-control custom-radio">
                                  <li><input name="rbjenis" value="4" type="radio"  class="custom-control-input" id="rb5">
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
                                <label class="custom-control-label" for="cb11">Diantar Oleh Supplier</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="cb12" name="cbantar[]" value="2">
                                <label class="custom-control-label" for="cb12">Diambil Oleh Peternak</label>
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
            @foreach($produk_supplier as $ps)
              @if($id1=="daftar")
                <div class="row-flex">
                  <h2>{{ $ps->nama_produk }}</h2>
                  <div class="row-flex2">
                    <div style="height:100%;" class="float-mod-left about-img wow fadeInLeft">
                          <?php 
                            $cc=str_split($ps->foto_produk,14);
                            echo cl_image_tag($cc[0], array("version"=>$cc[1]));
                          ?>
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
                              <input type="text" name="jmlpesan" id="jmlpesan" style="text-align:center;" value=1 size=3 onKeyPress="return hanyaAngka(this,2)"/>
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
                
                @include('helper.numberinput1')
              @else
                <div class="row-flex">
                  <form id="frmPesanan" method="POST" action="/produk/edit/simpan" enctype="multipart/form-data">
                  {{ csrf_field() }}
                    <div class="row-flex2">
                      <div style="height:100%;" class="float-mod-left about-img wow fadeInLeft">
                      <hr/>
                        <label class="tebal" style="padding-left:0;">Nama Produk</label><br>
                          <input type="text" name="nama" style="width:70%;" value="{{ $ps->nama_produk }}">  
                      <hr/>
                          <div id="imghide">
                            <?php 
                              $cc=str_split($ps->foto_produk,14);
                              echo cl_image_tag($cc[0], array("version"=>$cc[1]));
                              //echo $cc[0];
                            ?>
                          </div>
                          <img src='#' id='blah'>
                        <hr/>
                        <!--<a style="color:#fff;" class="btn btn-info" data-toggle="modal" data-target="#myModal2">Ganti Foto</a>-->
                        <input type='file' name="foto" id="imgInp"/>
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
                                Rp.<input style="width:30%;text-align:center;margin-top:2%;" class="field" type="number" size="7" value="{{ $ps->harga_jual }}" name='hargajual'>,- / Unit
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
                  </form>
                </div>
                @include('helper.foto')
              @endif
            @endforeach
          @endif
        </div>
      </div>
    </section><!-- #about -->

  </main>

@include('layout.footer')