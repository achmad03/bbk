<div class="row-flex">
            @if($id1=="produk")
                <h2>Nomor Faktur : {{ $data1->id_pemesanan_out }}</h2>
            @elseif($id1=="perlengkapan")
                <h2>Nomor Faktur : {{ $data1->id_pemesanan_in }}</h2>
            @endif
                    <div class="row-flex2">
                      <div style="height:100%;" class="float-mod-left about-img wow fadeInLeft">
                        <hr/>
                        <h4>::Informasi Pembeli::</h4>
                          @if($id1=='produk')
                            <label class="tebal" style="padding-left:0;">Konsumen</label>
                          @elseif($id1=='perlengkapan')
                            <label class="tebal" style="padding-left:0;">Peternak</label>
                          @endif
                        <table border=1 style="text-align:center;font-size:12px;width:100%;">
                        <tr>
                          @if($id1=='produk')
                            <th>Nama Peternak</th>
                          @elseif($id1=='perlengkapan')
                            <th>Nama Konsumen</th>
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
                        
                        <h4>::Informasi Penjual::</h4>
                        @if($id1=='produk')
                            <label class="tebal" style="padding-left:0;">Peternak</label>
                        @elseif($id1=='perlengkapan')
                            <label class="tebal" style="padding-left:0;">Supplier</label>
                        @endif
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
                        <?php 
                            $dum=$data1->bukti_bayar;
                            $cc=null;
                            if($id1=='produk'){
                                $cc=str_split($dum,12);
                            }elseif($id1=='perlengkapan'){
                                $cc=str_split($dum,14);
                            }
                            echo cl_image_tag($cc[0], array("version"=>$cc[1])); 
                            //echo $cc[0]."-".$cc[1];
                            //foreach($cc as $ab){
                            //  echo $ab."<br/>";
                            //}
                        ?>         
                      </div>

                      <div class="float-mod-right content wow fadeInRight">
                        
                        <hr/>
                        <div class="main-konten">
                          <form id="frmPesanan" method="post" action="/admin/{{$id1}}/simpan" enctype="multipart/form-data">
                          {{ csrf_field() }}
                          <input type="hidden" value="{{$id2}}" name="idpenjualan">
                          <div class="konten">
                            <h4>Rincian Pemesanan</h4>
                            <table border=1 style="text-align:center;font-size:12px;width:100%;">
                            @foreach($penjualan as $data2)
                            <tr>
                                <th style="text-align:center;width:40%;">
                                    Nama Barang
                                </th>
                                <th style="text-align:center;width:5%;">
                                    Qty
                                </th>
                                <th style="text-align:center;width:20%;">
                                    Harga
                                </th>
                                <th style="text-align:center;width:30%;">
                                    Sub-Total
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    @if($id1=="produk")
                                        {{$data2->nama_hasil}}
                                    @elseif($id1=="perlengkapan")
                                        {{$data2->nama_produk}}
                                    @endif
                                </td>
                                <td>
                                    {{$data2->jml}}
                                </td>
                                <td>
                                    Rp. {{number_format($data2->harga_beli,2,",",".")}}
                                </td>
                                <td>
                                    Rp. {{number_format($data2->sub_total,2,",",".")}}
                                </td>
                            </tr>
                            @endforeach
                            </table>
                          </div>
                          <hr/><br/>
                            <h5>Total Bayar | <div id='totalbayar'>
                                    Rp. {{number_format($data1->total_biaya,2,",",".")}}
                            </div></h5>
                          <hr/>
                          <input type="submit" class="btn btn-info" value="Konfirmasi Pembayaran">
                          </form>
                        </div>
                      </div>
                    </div>
                </div>