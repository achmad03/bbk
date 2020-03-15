@include('layout.header')

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">

    <div class="intro-text">
      <h2>Selamat Datang Di Beeiiibek</h2>
      <p>Market place bebek pertama di Indonesia</p>
      <a href="#" class="btn-get-started scrollto">Bergabung</a>
    </div>

    <div class="product-screens">

      <div class="product-screen-1 wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="0.6s">
        <img src="avilon/img/product-screen-1.png" alt="">
      </div>

      <div class="product-screen-2 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="0.6s">
        <img src="avilon/img/product-screen-2.png" alt="">
      </div>

      <div class="product-screen-3 wow fadeInUp" data-wow-duration="0.6s">
        <img src="avilon/img/product-screen-3.png" alt="">
      </div>

    </div>

  </section><!-- #intro -->

  <main id="main">

    <!--==========================
      Product Featuress Section
    ============================-->
    <section id="features">
      <div class="container">

        <div class="row">

          <div class="col-lg-8 offset-lg-4">
            <div class="section-header wow fadeIn" data-wow-duration="1s">
              <h3 class="section-title">Fitur Pada Website</h3>
              <span class="section-divider"></span>
            </div>
          </div>

          <div class="col-lg-4 col-md-5 features-img">
            <img src="/avilon/img/product-features.png" alt="" class="wow fadeInLeft">
          </div>

          <div class="col-lg-8 col-md-7 ">

            <div class="row">

              <div class="col-lg-6 col-md-6 box wow fadeInRight">
                <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
                <h4 class="title"><a href="">Penjualan dan Pembelian Hasil Ternak</a></h4>
                <p class="description">Dengan website ini maka konsumen akan bisa mencari telur bebek sesuai kebutuhan dan peternak bisa menuliskan hasil ternak untuk dijual tiap harinya.</p>
              </div>
              <div class="col-lg-6 col-md-6 box wow fadeInRight" data-wow-delay="0.1s">
                <div class="icon"><i class="ion-ios-flask-outline"></i></div>
                <h4 class="title"><a href="">Penjualan dan Pembelian Perlangkapan Ternak</a></h4>
                <p class="description">Peternak juga bisa membeli perlengkapan ternak dari supplier. Selain perlengkapan juga bisa dilakukan pembelian bibit bebek ataupun bebek yang siap untuk bertelur.</p>
              </div>
              <div class="col-lg-6 col-md-6 box wow fadeInRight" data-wow-delay="0.2s">
                <div class="icon"><i class="ion-social-buffer-outline"></i></div>
                <h4 class="title"><a href="">Musim Telur</a></h4>
                <p class="description">Untuk permintaan telur bebek yang banyak bisa dibuka musim telur dalam waktu tertentu. Hal ini bertujuan agar konsumen tidak terus menerus mencari hasil ternak melainkan peternak yang akan aktif mencukupi permintaan ini.</p>
              </div>
              <div class="col-lg-6 col-md-6 box wow fadeInRight" data-wow-delay="0.3s">
                <div class="icon"><i class="ion-ios-analytics-outline"></i></div>
                <h4 class="title"><a href="">Analisis Bagi Peternak Baru</a></h4>
                <p class="description">Bagi peternak baru akan mendapatkan setup berupa perkiraan biaya untuk memulai beternak bebek berdasarkan modal dana dan lahan yang dimiliki.</p>
              </div>
            </div>

          </div>

        </div>

      </div>

    </section><!-- #features -->

    <!--==========================
      Call To Action Section
    ============================-->
    <section id="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-left">
            <h3 class="cta-title">Tutorial Penggunaan Website</h3>
            <p class="cta-text"> Berikut terdapat modul yang berisi mengenai fungsi di aplikasi dan cara penggunaannya.</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#">Download Modul</a>
          </div>
        </div>

      </div>
    </section><!-- #call-to-action -->



  

  </main>

  @include('layout.footer')