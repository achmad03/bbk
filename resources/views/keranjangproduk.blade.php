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
          <h3 class="section-title">Keranjang Produk Supplier</h3>
          <span class="section-divider"></span>
          <p class="section-description"></p>
        </div>

        <div class="row">
        <form style="width:100%;" id="frmKeranjang" method="get" action="/produk/keranjang/simpan">
        <div class="row" style="width:100%;">
              <div class="box wow fadeInLeft" style="width:100%;">
              <a href="/produk" class="btn btn-info">Tambah Belanjaan</a>
              <input id="btnbayar" name="btn" disabled type="submit" value="Lakukan Pembayaran" class="btn btn-success">
              <input id="btnbayar1" style="color:#fff;" name="btn" disabled type="submit" value="Hapus Belanjaan" class="btn btn-warning">
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
                @if($idproduk>0)
                @for ($i = 0; $i < count($idproduk); $i++)
                
                        <tr class="btnrow" for="cb{{$i}}">
                            <td class="kolkeranjang1">
                            <div style="" class="checkbx custom-control custom-checkbox">
                                <input unchecked=false name="indexproduk[]" type="checkbox" value="{{$i}}" onclick="valcheck({{$i}})" id="defaultUnchecked{{$i}}"  class="custom-control-input indexhasilternak">
                                <label class="custom-control-label" for="defaultUnchecked{{$i}}"> </label>
                            </div>
                            </td>
                            <td class="kolkeranjang2">
                                <h7 class="title" style="font-weight:700;">{{$nama_produk[$i]}}</h7>
                            </td>
                            <td class="kolkeranjang3">
                                <img style="height:auto;width:50%;margin-left:auto;margin-right:auto;" src="{{$foto_produk[$i]}}">
                            </td>
                            <td class="kolkeranjang4">
                                <input class="in1 btn btn-secondary" onclick="kurang({{$i}})" type="button" value="-" id="btnmin{{$i}}">
                                <input class="in1" type="text" name="jmlpesan[]" id="jmlpesan{{$i}}" style="text-align:center;" value="{{$jmlpesan[$i]}}" id="persediaan" size=2 onKeyPress="return hanyaAngka(this,2)"/>
                                <input class="in1 btn btn-secondary" onclick="tambah({{$i}})" type="button" value="+" id="btnadd{{$i}}"></li>
                            </td>
                            <td class="kolkeranjang5">
                                <h7 class="title" style="font-weight:700;">Rp.{{$harga_jual[$i]}},- / Unit</h7>
                                <input type="hidden" value="{{$harga_jual[$i]}}" id="hargajual{{$i}}">
                            </td>
                            <td class="kolkeranjang6">
                                <h7 class="title" id="totalbayar{{$i}}" style="font-weight:700;">Rp.{{$jmlpesan[$i]*$harga_jual[$i]}},-</h7>
                            </td>
                        </tr>
                @include('helper.keranjang2')
                @include('helper.enablebutton')
                @endfor
                @endif
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
    var arr = document.getElementsByClassName("indexproduk");
    var cont=arr.length;
		// disable submit button on page load using javascript
		document.getElementById('btnbayar').disabled = true;

}</script>
@include('layout.footer')