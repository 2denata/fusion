<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fusion | Booking Alat</title>
    <link rel="stylesheet" href="styleHalaman.css">
</head>

<body>
    <main class="table">
        <section class="table__header">
            <h1>Booking <?= $namaAlat; ?></h1>
            <!-- <a href="#" class="btnnBooking">Booking</a> -->
            <a href="/home" class="btnn">Kembali</a>
        </section>
        <div class="body2">
            <div class="container">
                <form action="prosesBookingAlat" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="email" id="email" value="<?= session()->get('username')['email']; ?>">
                    <input type="hidden" name="kodeAlat" id="email" value="<?= $kodeAlat; ?>">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details"> Penyewa </span>
                            <input type="text" name="nama" value="<?= session()->get('username')['nama']; ?>" readonly>
                        </div>
                        <div class="input-box">
                            <span class="details"> Jenis Alat</span>
                            <input type="text" name="jenis" value="<?= $jenisAlat; ?>" readonly>
                        </div>
                        <div class="input-box">
                            <span class="details">Nama Alat</span>
                            <input type="text" name="namaAlat" value="<?= $namaAlat; ?>" readonly>
                        </div>
                        <div class="input-box">
                            <span class="details">Durasi Sewa </span>
                            <input type="text" name="durasi" value="<?= $durasi; ?> hari" readonly>
                        </div>
                        <div class="input-box">
                            <span class="details">Tanggal Pakai </span>
                            <input type="hidden" name="tgl_pakai" value="<?= $tgl_pakai; ?>" readonly>
                            <input type="text" name="pake" value="<?= $tanggal[0]; ?> <?= $bulanString; ?>" readonly>
                        </div>
                        <div class="input-box">
                            <span class="details">Tanggal Selesai </span>
                            <input type="hidden" name="tgl_selesai" value="<?= $tgl_selesai; ?>" readonly>
                            <input type="text" name="kelar" value="<?= $tanggal[$durasi-1]; ?> <?= $bulanString; ?>" readonly>
                        </div>
                        <div class="input-box">
                            <span class="details">Total Harga </span>
                            <input type="text" name="total_harga" value="<?= $total_harga; ?>" readonly>
                        </div>
                        <div class="input-box">
                            <span class="details">Bukti Pembayaran </span>
                            <input type="file" name="bukti_pembayaran" accept="image/*" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Qris Studio</span>
                            <p></p>
                            <img src="img/qris.jpg" alt="Qris" style="width:300px; justify-content: center;">
                        </div>
                    </div>
                    <div class="button">
                        <input type="submit" value="Booking">
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>