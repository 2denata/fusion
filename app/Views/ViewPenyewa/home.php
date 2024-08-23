<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Home - Fusion</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="img/fav.ico" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <!-- =======================================================
  * Template Name: Append
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/append-bootstrap-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page" data-bs-spy="scroll" data-bs-target="#navmenu">

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="/home" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <span> </span>
        <img src="assets/img/logo.png" alt="">
      </a>

      <!-- Nav Menu -->
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#ruangan" class="active">Cek Ruangan</a></li>
          <li><a href="#alat">Cek Alat Musik</a></li>
        </ul>

        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav><!-- End Nav Menu -->

      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span class="nama">Halo, <?= $nama['nama']; ?></span>
      <a class="btn-getstarted" href="logout">Logout</a>

    </div>
  </header><!-- End Header -->

  <main id="main">
    <!-- Hero Section - Home Page -->
    <section id="ruangan" class="hero">

      <img src="https://cdn.shopify.com/s/files/1/0465/5549/6598/files/The-Right-Home-Music.jpg?v=1623318672" alt="" data-aos="fade-in">

      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h2 data-aos="fade-up" data-aos-delay="100">Rasakan Sensasi Bermain Musik di Studio Kami</h2>
            <p data-aos="fade-up" data-aos-delay="200">Cek Jadwal Sekarang Juga!</p>
          </div>
          <div class="col-lg-6">
            <form action="/cekJadwal" method="post" class="sign-up-form d-flex" data-aos="fade-up" data-aos-delay="300">
              <input type="date" name="tanggal" class="form-control" placeholder="Enter email address">
              <select name="studio" id="studio" class="form-select me-1" style="border: none;">
                <option disabled selected>Pilih Ruangan</option>
                <option value="S1">Studio 1</option>
                <option value="S2">Studio 2</option>
              </select>
              <input type="submit" class="btn btn-danger" value="Lihat Jadwal">
            </form>
          </div>
        </div>
      </div>

    </section><!-- End Hero Section -->

  <!-- Hero Section - Home Page -->
  <section id="alat" class="hero">

<img src="https://images.unsplash.com/photo-1564186763535-ebb21ef5277f?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" data-aos="fade-in">

<div class="container">
  <div class="row">
    <div class="col-lg-10">
      <h2 data-aos="fade-up" data-aos-delay="100">Tak Punya Alat?</h2>
      <p data-aos="fade-up" data-aos-delay="200">Sewa alat musik berkualitas di studio kami</p>
    </div>
    <div class="col-lg-5">
      <form action="/alatMusik" method="post" class="sign-up-form d-flex" data-aos="fade-up" data-aos-delay="300">
        <select class="form-control" name="jenis" id="">
          <option>Pilih alat musik</option>
          <option value="Gitar">Gitar</option>
          <option value="Piano">Piano</option>
          <option value="Drum">Drum</option>
          <option value="Bass">Bass</option>
          <option value="Ampli">Ampli</option>
        </select>

        <input type="submit" class="btn btn-danger" value="Cari Alat">
      </form>
    </div>
  </div>
</div>

</section><!-- End Hero Section -->

    <!-- Clients Section - Home Page -->
    <section id="clients" class="clients">

      <div class="container-fluid" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="assets/img/clients/fender.jpg" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="https://www.cortguitars.com/thema/Basic/img/logo_.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="https://w7.pngwing.com/pngs/609/969/png-transparent-yamaha-corporation-logo-yamaha-music-square-yamaha-motor-company-piano-piano-purple-blue-furniture.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/34/Ibanez_logo.svg/2560px-Ibanez_logo.svg.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/25/Roland_Corporation_logo.svg/512px-Roland_Corporation_logo.svg.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b0/Zildjian_Logo.svg/2560px-Zildjian_Logo.svg.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

        </div>

      </div>

    </section><!-- End Clients Section -->


    <!-- Scroll Top Button -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>