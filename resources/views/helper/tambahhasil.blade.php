            <div class="row-flex">
              <form id="frmHasil" method="post" action="/hasil/tambah/simpan" enctype="multipart/form-data">
              {{ csrf_field() }}

                  <div class="row-flex2">
                    <div style="height:100%;" class="float-mod-left about-img wow fadeInLeft">
                    <hr/>
                    <div>
                      @if($id1=="produk")
                        <label class="tebal" style="padding-left:0;">Nama Hasil Ternak</label><br>
                        <input type="text" name="nama" style="width:70%;" placeholder="Masukkan Nama Hasil Ternak">
                      @else
                        <label class="tebal" style="padding-left:0;">Nama Kebutuhan Ternak</label><br>
                        <input type="text" name="nama" style="width:70%;" placeholder="Masukkan Nama Kebutuhan Ternak">
                      @endif  
                      <hr/>
                    </div>
                    <div>
                      <label class="tebal" style="padding-left:0;">Foto</label>
                      <br/><img src='#' id='dumfoto' style='display:none;'>
                      <hr/>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="foto" name='foto'>
                        <label class="custom-file-label" for="foto">Pilih Foto</label>
                      </div>
                    </div>
                    <div>
                      <hr/>
                      <label class="tebal" style="padding-left:0;">Deskripsi</label>
                      <p style="height:auto;">
                      @if($id1=="produk")
                        <textarea rows="4" cols="50" name="deskripsi" placeholder="Masukkan Deskripsi Hasil Ternak"></textarea>               
                      @else
                        <textarea rows="4" cols="50" name="deskripsi" placeholder="Masukkan Deskripsi Perlengkapan Ternak"></textarea>               
                      @endif 
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
                          @if($id1=="produk")
                            <ul>
                                <div class="custom-control custom-radio">
                                    <li><input name="rb1" value="1" type="radio" class="custom-control-input" id="rb1" checked >
                                      <label class="custom-control-label" for="rb1">Telur Bebek</label></li>
                                </div>
                                <div class="custom-control custom-radio">
                                    <li><input name="rb1" value="2" type="radio"  class="custom-control-input" id="rb2">
                                      <label class="custom-control-label" for="rb2">Bebek Afkir</label></li>
                                </div>
                            </ul>         
                          @else
                            <ul>
                                <div class="custom-control custom-radio">
                                    <li><input name="rb1" value="0" type="radio" class="custom-control-input" id="rb1" checked >
                                      <label class="custom-control-label" for="rb1">Pakan Bebek</label></li>
                                </div>
                                <div class="custom-control custom-radio">
                                    <li><input name="rb1" value="1" type="radio"  class="custom-control-input" id="rb2">
                                      <label class="custom-control-label" for="rb2">Obat Bebek</label></li>
                                </div>
                                
                                <div class="custom-control custom-radio">
                                    <li><input name="rb1" value="2" type="radio"  class="custom-control-input" id="rb3">
                                      <label class="custom-control-label" for="rb3">Bebek Anakan</label></li>
                                </div>                              
                                <div class="custom-control custom-radio">
                                    <li><input name="rb1" value="3" type="radio"  class="custom-control-input" id="rb4">
                                      <label class="custom-control-label" for="rb4">Bebek Siap Telur</label></li>
                                </div>
                                <div class="custom-control custom-radio">
                                    <li><input name="rb1" value="4" type="radio"  class="custom-control-input" id="rb5">
                                      <label class="custom-control-label" for="rb5">Perlengkapan Kandang / (10 m X 10 m)</label></li>
                                </div>
                            </ul>                          
                          @endif 
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