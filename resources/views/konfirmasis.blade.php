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
        
          @if($id1=="produk")
            <h3 class="section-title">Pemesanan Hasil Ternak</h3>
          @elseif($id1=="perlengkapan")
            <h3 class="section-title">Pemesanan Keperluan Ternak</h3>
          @endif
          <span class="section-divider"></span>
        </div>
        <br/>
        
        <div class="row">
        @if($id2=="tambah")
          @include('helper.tambahhasil')
        @else
            @foreach($penjualan as $data1)
                @include('helper.rinciankonfirmasi')
            @endforeach
        @endif
        </div>
      </div>
    </section><!-- #about -->
    </main>

@include('layout.footer')