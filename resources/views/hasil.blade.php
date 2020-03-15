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
          <h3 class="section-title">Katalog Hasil Peternakan</h3>
          <span class="section-divider"></span>
          <p class="section-description">Telur bebek dan bebek afkir yang siap untuk dipesan konsumen.</p>
        </div>

        <div class="row">

        @foreach($hasil_ternak as $ht)
          <div class="col-lg-3">
            <a href="/hasil/rincian/{{ $ht->id_hasil_ternak }}">
              <div class="box wow fadeInLeft">
                <h7 class="title" style="font-weight:700;">
                  {{ $ht->nama_hasil }}
                </h7><hr/>
                <div class="icon">
                  <img style="height:auto;width:100%;margin-left:auto;margin-right:auto;" src="{{ $ht->foto_produk }}">
                </div>
                <h8 class="title" style="font-weight:500;">
                  Rp.{{ $ht->harga_jual }},
                </h8>            
              </div>
             </a>
          </div>
        @endforeach

        </div>
      </div>
    </section><!-- #more-features -->
    <div style="width:100%;margin-left:50%;margin-right:50%">{{ $hasil_ternak->render() }}</div>
    </main>

@include('layout.footer')