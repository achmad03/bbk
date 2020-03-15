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
          <h3 class="section-title">Katalog Produk Supplier</h3>
          <span class="section-divider"></span>
          <p class="section-description">Keperluan bagi peternak bebek.</p>
        </div>

        <div class="row">

        @foreach($produk_supplier as $ps)
          <div class="col-lg-3">
            <a href="/produk/rincian/{{ $ps->id_produk }}">
              <div class="box wow fadeInLeft">
                <h7 class="title" style="font-weight:700;">
                  {{ $ps->nama_produk }}
                </h7><hr/>
                <div class="icon">
                  <img style="height:auto;width:100%;margin-left:auto;margin-right:auto;" src="{{ $ps->foto_produk }}">
                </div>
                <h8 class="title" style="font-weight:500;">
                  Rp.{{ $ps->harga_jual }},
                </h8>            
              </div>
             </a>
          </div>
        @endforeach

        </div>
      </div>
    </section><!-- #more-features -->
    <div style="width:100%;margin-left:50%;margin-right:50%">{{ $produk_supplier->render() }}</div>
    </main>

@include('layout.footer')