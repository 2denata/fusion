<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Creative Studio landing page.">
    <meta name="author" content="Devcrud">
    <title>Home | Admin Fusion</title>

    <link href="img/fav.ico" rel="icon">
    <!-- font icons -->
    <link rel="stylesheet" href="assetsIndex/vendors/themify-icons/css/themify-icons.css">

    <!-- Bootstrap + Creative Studio main styles -->
    <link rel="stylesheet" href="assetsIndex/css/creative-studio.css">

</head>

<!-- End Of Page Navigation -->

<!-- Page Header -->
<header class="header">
    <div class="overlay">
        <h6 class="subtitle">Admin Page</h6>
        <h1 class="title">Fusion</h1>
        <div class="buttons text-center">
            <a href="adminCekAlat" class="btn btn-outline-light rounded w-lg btn-lg my-1">Cek Alat</a>
            <a href="adminBookingAlat" class="btn btn-outline-light rounded w-lg btn-lg my-1">Booking Alat</a>
            <a href="adminCekRuangan" class="btn btn-outline-light rounded w-lg btn-lg my-1">Cek Ruangan</a>
            <a href="adminBookingRuangan" class="btn btn-outline-light rounded w-lg btn-lg my-1">Booking Ruangan</a>
            <!-- <a href="laporanPDF" target="_blank" class="btn btn-outline-light rounded w-lg btn-lg my-1">Rekapitulasi</a> -->
            <button class="btn btn-outline-light rounded w-lg btn-lg my-1" data-toggle="modal" data-target="#rekapitulasi">Rekapitulasi</button>
            <a href="logout" class="btn btn-outline-light rounded w-lg btn-lg my-1">Logout</a>
        </div>
    </div>
</header>
<!-- End Of Page Header -->

<!-- Modal -->
<div class="modal fade" id="rekapitulasi" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Laporan Bulanan Fusion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/laporanPDF" method="POST" target="_blank">
                <input type="hidden" name="tahun" id="tahun" value="<?= $tahun; ?>">
                <div class="modal-body">
                    <select name="bulan" id="bulan" class="form-control" required>
                        <option value="" selected disabled>Pilih bulan</option>
                        <option value="1">Januari <?= $tahun; ?></option>
                        <option value="2">Februari <?= $tahun; ?></option>
                        <option value="3">Maret <?= $tahun; ?></option>
                        <option value="4">April <?= $tahun; ?></option>
                        <option value="5">Mei <?= $tahun; ?></option>
                        <option value="6">Juni <?= $tahun; ?></option>
                        <option value="7">Juli <?= $tahun; ?></option>
                        <option value="8">Agustus <?= $tahun; ?></option>
                        <option value="9">September <?= $tahun; ?></option>
                        <option value="10">Oktober <?= $tahun; ?></option>
                        <option value="11">November <?= $tahun; ?></option>
                        <option value="12">Desember <?= $tahun; ?></option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Rekap Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- About Section -->

<!-- core  -->
<script src="assetsIndex/vendors/jquery/jquery-3.4.1.js"></script>
<script src="assetsIndex/vendors/bootstrap/bootstrap.bundle.js"></script>

<!-- bootstrap affix -->
<script src="assetsIndex/vendors/bootstrap/bootstrap.affix.js"></script>

<!-- Creative Studio js -->
<script src="assetsIndex/js/creative-studio.js"></script>

</body>

</html>