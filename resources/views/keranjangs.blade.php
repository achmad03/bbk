@include('layout.header')

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro" style="height:100px;">

  </section><!-- #intro -->

  <main id="main">

<!--==========================
      More Features Section
    ============================-->
    <section id="more-features" class="section-bg">
      <div class="container">

        <div class="section-header">
        @if($id1=='produk')
          <h3 class="section-title">Keranjang Hasil Peternakan</h3>
        @elseif($id1=='perlengkapan')
          <h3 class="section-title">Keranjang Perlengkapan Peternakan</h3>
        @endif
          <span class="section-divider"></span>
          <p class="section-description"></p>
        </div>

        <div class="row">
        <form style="width:100%;" id="frmKeranjang" method="post" action="/keranjang/{{$id1}}/bayar" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row" style="width:100%;">
              <div class="box1 wow fadeInLeft" style="width:100%;">
              <a href="/daftar/{{$id1}}" class="btn btn-info">Tambah Belanjaan</a>
              <input id="btnbayar" disabled name='btn' type="submit" value="Lakukan Pembayaran" class="btn btn-success">
                <table style="text-align:center;width:100%;">
                <tr>
                    <th class="kolkeranjang1">
                        Pilih
                    </th>
                    <th class="kolkeranjang2">
                        Nama
                    </th>
                    <th class="kolkeranjang3">
                        Foto
                    </th>
                    <th class="kolkeranjang4">
                        Quantity
                    </th>
                    <th class="kolkeranjang5">
                        Harga Satuan
                    </th>
                    <th class="kolkeranjang6">
                        Sub-Total
                    </th>
                </tr>
                @if($id>0)
                @for ($i = 0; $i < count($id); $i++)
                <input type="hidden" value="{{$data[$i]->persediaan}}" id="persediaan1{{$i}}">
                        <tr class="btnrow" for="cb{{$i}}">
                            <td class="kolkeranjang1">
                            <div style="" class="checkbx custom-control custom-checkbox">
                                <input name="index[]" enabled=false type="checkbox" value="{{$i}}" onclick="valcheck({{$i}})" id="defaultUnchecked{{$i}}"  class="custom-control-input indexhasilternak">
                                <label class="custom-control-label" for="defaultUnchecked{{$i}}"></label>
                                <input type='hidden' id="jmll" value="{{count($id)}}">
                            </div>
                            </td>
                            <td class="kolkeranjang2">
                              <label class="custom-control-label" for="defaultUnchecked{{$i}}">
                                <h7 class="title" style="font-weight:700;">{{$nama[$i]}}</h7>
                              </label>
                            </td>
                            <td class="kolkeranjang3">
                              <label class="custom-control-label" for="defaultUnchecked{{$i}}">
                                <?php
                                    $dum=$foto[$i];
                                    $cc=null;
                                    if($id1=='produk'){
                                        $cc=str_split($dum,12);
                                    }elseif($id1=='perlengkapan'){
                                        $cc=str_split($dum,14);
                                    }
                                    echo cl_image_tag($cc[0], array("version"=>$cc[1]))
                                ?>
                              </label>
                            </td>
                            <td class="kolkeranjang4">
                                <input class="in1 btn btn-secondary" onclick="kurang({{$i}})" type="button" value="-" id="btnmin{{$i}}">
                                <input class="in1" type="text" name="jmlpesan[]" id="jmlpesan{{$i}}" style="text-align:center;" value="{{$jmlpesan[$i]}}" onchange='ganti({{$i}})' size=2 onKeyPress="return hanyaAngka(this)"/>
                                <input class="in1 btn btn-secondary" onclick="tambah({{$i}})" type="button" value="+" id="btnadd{{$i}}"></li>
                            </td>
                            <td class="kolkeranjang5">
                              <label class="custom-control-label" for="defaultUnchecked{{$i}}">
                                <h7 class="title" style="font-weight:700;">Rp.{{number_format($harga_jual[$i],2,",",".")}} / Unit</h7>
                                <input type="hidden" value="{{$harga_jual[$i]}}" id="hargajual{{$i}}">
                              </label>
                            </td>
                            <td class="kolkeranjang6">
                              <label class="custom-control-label" for="defaultUnchecked{{$i}}">
                                <h7 class="title" id="totalbayar{{$i}}" style="font-weight:700;">Rp.{{number_format($jmlpesan[$i]*$harga_jual[$i],2,",",".")}},-</h7>
                              </label>
                            </td>
                        </tr>
                @endfor
                @endif
                @include('helper.keranjang2')
                @include('helper.enablebutton')
                </table>  
              </div>
        </div>
        </form>

        </div>
      </div>
    </section><!-- #more-features -->
    <div style="width:100%;margin-left:50%;margin-right:50%"></div>
    </main>
<script>
window.onload = function(){    
    var arr = document.getElementsByClassName("indexhasilternak");
    var cont=arr.length;
		// disable submit button on page load using javascript
		document.getElementById('btnbayar').disabled = true;

    var jmll=document.getElementById('jmll').value;
    for(i=0;i<jmll;i++){
      document.getElementsByClassName('indexhasilternak')[i].checked=false;
    }
}</script>
@include('layout.footer')