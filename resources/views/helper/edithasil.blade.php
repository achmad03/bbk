                <div class="row-flex">
                    <form id="frmPesanan" method="POST" action="/hasil/edit/simpan" enctype="multipart/form-data">
                    {{ csrf_field() }}
                      <div class="row-flex2">
                        <div style="height:100%;" class="float-mod-left about-img wow fadeInLeft">
                          <hr/>
                          @if($id1=='produk')
                            <!--@if(Auth::user()->role==2||Auth::user()->role==4)-->
                              <label class="tebal" style="padding-left:0;">Nama Hasil Ternak</label><br>
                              <input type="text" name="nama" style="width:70%;" value="{{ $data1->nama_hasil }}">  
                            <!--@endif-->
                          @elseif($id1=='perlengkapan')
                            <label class="tebal" style="padding-left:0;">Nama Produk</label><br>
                            <input type="text" name="nama" style="width:70%;" value="{{ $data1->nama_produk }}">
                          @endif  
                          <hr/>
                          <div id="imghide">
                            <?php 
                              $cc=null;
                              if($id1=='produk'){
                                $cc=str_split($data1->foto_produk,12);
                              }elseif($id1=='perlengkapan'){
                                $cc=str_split($data1->foto_produk,14);
                              }
                              echo cl_image_tag($cc[0], array("version"=>$cc[1]));
                              //echo $cc[0];
                            ?>
                          </div>
                          <img src='#' id='dumfoto' style='display:none;'>
                        <hr/>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="foto" name='foto'>
                            <label class="custom-file-label" for="foto">Choose file</label>
                          </div>
                            <hr/>
                            <label class="tebal" style="padding-left:0;">Deskripsi</label>
                            
                              <textarea rows="4" cols="50" name="deskripsi">{{ $data1->deskripsi }}</textarea>               
                            
                          </div>

                          <div class="float-mod-right content wow fadeInRight">
                            
                            <hr/>
                            <div class="main-konten">

                            @if($id1=='produk')
                              <input type="hidden" name="id" value="{{ $data1->id_hasil_ternak }}">
                            @elseif($id1=='perlengkapan')
                              <input type="hidden" name="id" value="{{ $data1->id_produk }}">
                            @endif
                              <div class="konten" @if($id1=='perlengkapan') style='height:200px;' @endif>
                                <div class="konten-kiri">
                                  <label class="field tebal">Jenis</label>
                                </div>
                                <div class="konten-kanan">
                                @if($id1=='produk')
                                  <ul>
                                      <div class="custom-control custom-radio">
                                          <li><input name="rbjenis" value="1" type="radio" class="custom-control-input" id="rb1" @if( $data1->jenis_hasil==1 ) checked @endif >
                                            <label class="custom-control-label" for="rb1">Telur Bebek</label></li>
                                      </div>
                                      <div class="custom-control custom-radio">
                                          <li><input name="rbjenis" value="2" type="radio"  class="custom-control-input" id="rb2" @if( $data1->jenis_hasil==2 ) checked @endif >
                                            <label class="custom-control-label" for="rb2">Bebek Afkir</label></li>
                                      </div>
                                  </ul>
                                @elseif($id1=='perlengkapan')
                                  <ul>
                                      <div class="custom-control custom-radio">
                                          <li><input name="rbpakan" value="0" type="radio" class="custom-control-input" id="rb1" @if( $data1->jenis_produk==0 ) checked @endif >
                                            <label class="custom-control-label" for="rb1">Pakan Bebek</label></li>
                                      </div>
                                      <div class="custom-control custom-radio">
                                          <li><input name="rbpakan" value="1" type="radio"  class="custom-control-input" id="rb2" @if( $data1->jenis_produk==1 ) checked @endif >
                                            <label class="custom-control-label" for="rb2">Obat Bebek</label></li>
                                      </div>
                                      
                                      <div class="custom-control custom-radio">
                                          <li><input name="rbpakan" value="2" type="radio"  class="custom-control-input" id="rb3" @if( $data1->jenis_produk==2 ) checked @endif >
                                            <label class="custom-control-label" for="rb3">Bebek Anakan</label></li>
                                      </div>
                                      
                                      <div class="custom-control custom-radio">
                                          <li><input name="rbpakan" value="3" type="radio"  class="custom-control-input" id="rb4" @if( $data1->jenis_produk==3 ) checked @endif >
                                            <label class="custom-control-label" for="rb4">Bebek Siap Telur</label></li>
                                      </div>

                                      
                                      <div class="custom-control custom-radio">
                                          <li><input name="rbpakan" value="4" type="radio"  class="custom-control-input" id="rb5" @if( $data1->jenis_produk==4 ) checked @endif >
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
                                Rp.<input style="width:30%;text-align:center;" class="field" type="number" size="7" value="{{ $data1->harga_jual }}" name='hargajual'>,- / Unit
                                </div>
                              </div>
                              <hr/>
                              <div class="konten">
                                <div class="konten-kiri">
                                  <label class="field tebal">Persediaan</label>
                                </div>
                                <div class="konten-kanan">
                                    <label class="field tebal">{{ $data1->persediaan }}</label>
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