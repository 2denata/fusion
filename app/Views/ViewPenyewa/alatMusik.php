<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Alat Musik - Fusion</title>
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

    <section id="call-to-action" class="call-to-action">

      <img src="assets/img/cta-bg.jpg" alt="">

      <div class="container">
        <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-xl-10">
            <div class="text-center">
              <h1 style="color: #FFFFFF"><?= $jenis; ?></h1>
              <!-- <p>Koleksi gitar yang tersedia di Fusion</p> -->
              <!-- <a class="cta-btn" href="#">Kembali</a> -->
            </div>
          </div>
        </div>
      </div>

    </section>
    <!-- Features Section - Home Page -->
    <section id="features" class="features">

      <!--  Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>KOLEKSI</h2>
        <p><?= $jenis; ?> yang tersedia di Fusion</p>
      </div><!-- End Section Title -->

      <div class="container">

        <?php foreach ($alat as $a) : ?>
          <div class="row gy-4 align-items-stretch justify-content-between features-item ">
            <div class="col-lg-6 d-flex align-items-center features-img-bg" data-aos="zoom-out">
              <img src="/img/alat/<?= $a['foto']; ?>" class="img-fluid" alt="">
            </div>
            <div class="col-lg-5 d-flex justify-content-center flex-column" data-aos="fade-up">
              <h3><?= $a['nama']; ?></h3>
              <h5>Harga Sewa : <?= $a['harga']; ?>/hari</h5>
              <form action="/cekJadwalAlat" method="post">
                <input type="hidden" name="namaAlat" value="<?= $a['nama']; ?>" id="namaAlat">
                <input type="hidden" name="jenisAlat" id="jenisAlat" value="<?= $jenis; ?>">
                <input type="hidden" name="kodeAlat" id="kodeAlat" value="<?= $a['kode_alat']; ?>">
                <input type="hidden" name="user" id="email" value="<?= session()->get('username')['email']; ?>">
                <br>
                <select name="bulan" class="form-select" id="bulan" required>
                  <option value="" disabled selected>Pilih Bulan</option>
                  <option value="12">Desember 2023</option>
                  <option value="1">Januari 2024</option>
                  <option value="2">Februari 2024</option>
                </select>
                <br>
                <button type="submit" class="btn btn-get-started align-self-start">Cek Jadwal!</button>
              </form>
            </div>
          </div>

        <?php endforeach; ?>
      </div>

    </section><!-- End Features Section -->

  </main>

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