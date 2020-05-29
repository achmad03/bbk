                <div class="row-flex">
                  @if($id1=='produk')
                    <h2>{{ $data1->nama_hasil }}</h2>
                  @elseif($id1=='perlengkapan')
                    <h2>{{ $data1->nama_produk}}</h2>
                  @endif
                    <div class="row-flex2">
                      <div style="height:100%;" class="float-mod-left about-img wow fadeInLeft">
                      <?php 
                        $dum=$data1->foto_produk;
                        $cc=null;
                        if($id1=='produk'){
                            $cc=str_split($dum,12);
                        }elseif($id1=='perlengkapan'){
                            $cc=str_split($dum,14);
                        }
                        echo cl_image_tag($cc[0], array("version"=>$cc[1]));
                      ?>
                        <hr/>
                        <label class="tebal" style="padding-left:0;">Informasi Peternak</label>
                        <table border=1 style="text-align:center;font-size:12px;width:100%;">
                        <tr>
                          @if($id1=='produk')
                            <th>Nama Peternak</th>
                          @elseif($id1=='perlengkapan')
                            <th>Nama Supplier</th>
                          @endif
                          <th>Alamat</th>
                          <th>Nomor Whatsapp</th>
                          <th>Nomor Telepon</th>
                        </tr>
                        <tr>
                          <td>{{$data1->name}}</td>
                          <td>{{$data1->alamat}}</td>
                          <td>{{$data1->no_wa}}</td>
                          <td>{{$data1->no_telp}}</td>
                        </tr>
                        </table>
                        <hr/>
                        <p style="height:auto;">
                          {{ $data1->deskripsi }}                
                        </p>
                      </div>

                      <div class="float-mod-right content wow fadeInRight">
                        
                        <hr/>
                        <div class="main-konten">
                          <form id="frmPesanan" method="post" action="/keranjang/simpan/{{$id1}}" enctype="multipart/form-data">
                          {{ csrf_field() }}
                          <input type='hidden' value="{{$id3}}" name="id">
                          <div class="konten">
                            <div class="konten-kiri">
                              <label class="field tebal">Jenis</label>
                            </div>
                            <div class="konten-kanan">
                            @if($id1=='produk')
                              <label class="field">@if($data1->jenis_hasil==1) Telur Bebek @else Bebek Afkir @endif</label>
                            @elseif($id1=='perlengkapan')
                              <label class="field">@if($data1->jenis_produk==1) Pakan Bebek @else Obat Bebek @endif</label>
                            @endif
                            </div>
                          </div>
                          <hr/>
                          <div class="konten">
                            <div class="konten-kiri">
                              <label class="field tebal">Harga Jual</label>
                            </div>
                            <div class="konten-kanan">
                                <label class="field">Rp.{{ number_format($data1->harga_jual,2,",",".") }} / @if($data1->jenis_hasil==1) Telur Bebek @else Bebek Afkir @endif</label>
                            </div>
                          </div>
                          <hr/>
                          <div class="konten">
                            <div class="konten-kiri">
                              <label class="field tebal">Persediaan</label>
                            </div>
                            <div class="konten-kanan">
                                <label class="field">{{ $data1->persediaan }}</label>
                            </div>
                          </div>
                          <hr/>
                          <div class="konten">
                            <div class="konten-kiri">
                              <label class="field tebal">Jumlah Pemesanan</label>
                            </div>
                            <input type='hidden' value='{{ $data1->persediaan }}' id='persediaan1'>
                            <div class="konten-kanan">
                            <ul class="setnumber">
                                <li><input class="in1 btn btn-secondary" type="button" value="-" id="btnmin">
                                <input type="text" name="jmlpesan" id="jmlpesan" style="text-align:center;" value=1 size=3 onchange='ganti()'  onKeyPress="return hanyaAngka(this)"/>
                                <input class="in1 btn btn-secondary" type="button" value="+" id="btnadd"></li>
                            </ul>
                            </div>
                          </div>
                          <hr/>
                            <h5>Total Bayar | <div id='totalbayar'></div></h5>
                          <hr/>
                          <input type="submit" class="btn btn-info" value="Masukkan Ke Keranjang">
                          </form>
                        </div>
                      </div>
                    </div>
                </div>