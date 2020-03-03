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
      <div class="container-fluid" style="margin-top:5px;">
        <div class="section-header">
          <h3 class="section-title">Masuk</h3>
          <span class="section-divider"></span>
        </div>

        <br><div class="row">
          <div class="col-lg-6 about-img wow fadeInLeft">
            <img src="/avilon/img/about-img.jpg" alt="">
          </div>

          <div class="col-lg-6 content wow fadeInRight">
            <form style="padding-top:3%;" action="/daftar_buku/simpan_1" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Nama Pengguna</label>
                    <input type="text" class="form-control" placeholder="Masukkan Nama Pengguna..." name="nama" required="required">
                    @if($errors->has('judul'))
                        <div class="text-danger">
                            {{ $errors->first('judul')}}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Kata Sandi</label>
                        <input type="text" class="form-control" placeholder="Masukkan Kata Sandi..." name="sandi" required="required">
                            @if($errors->has('pengarang'))
                                <div class="text-danger">
                                    {{ $errors->first('pengarang')}}
                                </div>
                            @endif
                </div><br/>
                <div style="text-align:center;"><a href="/daftar_buku"  class="btn btn-info">Daftar</a>
                <a style="color:#fff;" class="btn btn-success"  data-toggle="modal" data-target="#myModal2">Masuk</a></div>
            </form>
          </div>
        </div>

      </div>
    </section><!-- #about -->

  </main>

  @include('layout.footer')