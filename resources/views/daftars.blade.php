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
            <h3 class="section-title">Katalog Hasil Ternak</h3>
          @elseif($id1=='perlengkapan')
            <h3 class="section-title">Katalog Produk Supplier</h3>
          @endif
          <span class="section-divider"></span>
        </div>
        <hr/>
        <div class="row">

        @foreach($data as $data1)
          <div class="col-lg-3  pilihan">
            @if($id1=='produk')
              
            @elseif($id1=='perlengkapan')
              
            @endif
              <div class="box wow fadeInLeft" style="height:250px;margin-bottom:5px;">
                <div id="kepala" style="height:10%;">
                  <h7 class="title" style="font-weight:700;">
                  @if($id1=='produk')
                    {{ $data1->nama_hasil }}
                  @elseif($id1=='perlengkapan')
                    {{ $data1->nama_produk }}
                  @endif
                  </h7>
                </div>
                <hr/>
                <div class="icon"  id='fotoss' style="height:65%;">
                  <?php 
                      $dum=$data1->foto_produk;
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
                <div id="kaki" style="height:25%;">
                  <h8 class="title" style="font-weight:500;">
                    Rp.{{ number_format($data1->harga_jual,2,",",".") }}
                  </h8>
                </div>            
              </div>
            </a>
          </div>
        @endforeach

        </div>
      </div>
    </section><!-- #more-features -->
    <div style="width:100%;margin-left:50%;margin-right:50%">{{ $data->render() }}</div>
    </main>

@include('layout.footer')