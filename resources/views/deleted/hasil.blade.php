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
        <a href="/hasil/tambah" style="color:#fff;" class="btn btn-info">Tambah Hasil Ternak</a>
        <hr/>
        <div class="row">

        @foreach($hasil_ternak as $ht)
          <div class="col-lg-3">
            <a href="/hasil/rincian/{{$id}}/{{ $ht->id_hasil_ternak }}">
              <div class="box wow fadeInLeft" style="width:100%;">
                <h7 class="title" style="font-weight:700;">
                  {{ $ht->nama_hasil }}
                </h7><hr/>
                <div class="icon">
                  <?php 
                    $dum=$ht->foto_produk;
                    $cc=str_split($dum,12);
                    echo cl_image_tag($cc[0], array("version"=>$cc[1])); 
                    //echo $ht->foto_produk."-".$cc[0]."-".$cc[1];
                    //foreach($cc as $ab){
                    //  echo $ab."<br/>";
                    //}
                  ?>
                </div><hr/>
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

/Bebek/300011584453631-/Bebek/3000-11584453631
Rp.1930,