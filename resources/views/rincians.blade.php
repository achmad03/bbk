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
            <h3 class="section-title">Rincian Hasil Ternak</h3>
          @elseif($id1=="perlengkapan")
            <h3 class="section-title">Rincian Keperluan Ternak</h3>
          @endif
          <span class="section-divider"></span>
        </div>
        <br/>
        
        <div class="row">
        @if($id2=="tambah")
          @include('helper.tambahhasil')
        @else
            @foreach($data as $data1)
              @if($id2=="rincian")
                @include('helper.rincianhasil')
                @include('helper.numberinput')
              @elseif($id2=="edit")
                  @include('helper.edithasil')
                  @include('helper.foto')
                  @include('helper.modal2')
              @endif
            @endforeach
        @endif
        </div>
      </div>
    </section><!-- #about -->

  </main>

@include('layout.footer')