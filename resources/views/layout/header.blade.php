<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Beeiiibek Store</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="/avilon/img/favicon.png" rel="icon">
  <link href="/avilon/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="/avilon/lib/bootstrap/css/bootstrap.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="/avilon/lib/animate/animate.min.css" rel="stylesheet">
  <link href="/avilon/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="/avilon/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="/avilon/lib/magnific-popup/magnific-popup.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="/avilon/css/style.css" rel="stylesheet">
  
  <!-- Form Validator -->
  <script src="/gen_validatorv4.js" type="text/javascript"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


  <!-- =======================================================
    Theme Name: Avilon
    Theme URL: https://bootstrapmade.com/avilon-bootstrap-landing-page-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <img src="/images/bebek-logo.png" alt="">
        <img src="/images/bebek-nama.png" alt="">
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#intro"><img src="img/logo.png" alt="" title=""></a> -->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="/" class="menu">Beranda</a></li>
          <li><a href="/about" class="menu">Tentang Kami</a></li>
          @if (Route::has('login'))
            @auth
              @if(Auth::user()->role=="1")
              <li><a href="#" class="menu">Supplier</a>
                <ul style="background-color:#1dc8cd;">
                  <li>
                    <a style="color:#fff;" class="menu" href="/daftar/perlengkapan">Daftar Kebutuhan Ternak</a>
                  </li>
                  <li>
                    <a style="color:#fff;" class="menu" href="#">#Penjualan Kebutuhan Ternak</a>
                  </li>
                </ul>
              </li>
              @endif
              @if(Auth::user()->role=="2")
              <li><a href="#" class="menu">Peternak</a>
                <ul style="background-color:#1dc8cd;">
                  <li>
                    <a style="color:#fff;" class="menu" href="/daftar/produk">Daftar Hasil Ternak</a>
                  </li>
                  <li>
                    <a style="color:#fff;" class="menu" href="#">#Penjualan Hasil Ternak</a>
                  </li>
                  <li>
                    <a style="color:#fff;" class="menu" href="/daftar/perlengkapan">Daftar Keperluan Ternak</a>
                  </li>
                  <li>
                    <a style="color:#fff;" class="menu" href="/keranjang/perlengkapan">Keranjang Keperluan Ternak</a>
                  </li>
                </ul>
              </li>
              @endif
              @if(Auth::user()->role=="3")
              <li><a href="#" class="menu">Konsumen</a>
                <ul style="background-color:#1dc8cd">
                  <li>
                    <a style="color:#fff;" class="menu" href="/daftar/produk">Daftar Hasil Ternak</a>
                  </li>
                  <li>
                    <a style="color:#fff;" class="menu" href="/keranjang/produk">Keranjang Hasil Ternak</a>
                  </li>
                  <li>
                    <a style="color:#fff;" class="menu" href="#">#Musim Telur</a>
                  </li>
                </ul>
              </li>
              @endif
              @if(Auth::user()->role=="4")
              <li><a href="#" class="menu">Admin Penjualan</a>
                <ul style="background-color:#1dc8cd">
                  <li>
                    <a style="color:#fff;" class="menu" href="/admin/produk">Penjualan Hasil Ternak</a>
                  </li>
                  <li>
                    <a style="color:#fff;" class="menu" href="/admin/perlengkapan">Penjualan Kebutuhan Ternak</a>
                  </li>
                </ul>
              </li>
              @endif
            @endauth
          @endif
          <!--<li class="menu-has-children"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="menu-has-children"><a href="#">Drop Down 2</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>
            </ul>
          </li>-->   
          @if (Route::has('login'))
                    @auth
                    <li><a href="#" class="menu"><img style='width:30px;height:auto;' src="/images/icon.png"></a>
                      <ul style="background-color:#1dc8cd;">
                        <li>
                          <a style="color:#fff;" class="menu" href="/profile/0">Profil
                            @if(Auth::user()->role=="")
                                <b style="background-color:red;padding:2px 2px;margin-top:10px;font-size:10px;" class="icons">!</b>
                            @endif
                          </a>
                        </li>
                        <li><a style="color:#fff;" class="menu" href="/logout">Keluar</a></li>
                      </ul>
                    </li>
                      
                      
                    @else
                      <li><a class="menu" href="/masuk">Masuk</a></li>
                      <li><a class="menu" href="/daftar">Daftar</a></li>
                    @endauth
            @endif
          </ul> 
          
        
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->