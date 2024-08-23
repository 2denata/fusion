<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fusion | Jadwal Studio</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="bookingAlatMusik" method="post" id="formBooking">
        <main class="table">
            <input type="hidden" name="bulan" id="bulan" value="<?= $bulan; ?>">
            <input type="hidden" name="tahun" id="bulan" value="<?= $tahun; ?>">
            <input type="hidden" name="kodeAlat" id="kodeAlat" value="<?= $kodeAlat; ?>">
            <input type="hidden" name="jenisAlat" id="jenisAlat" value="<?= $jenisAlat; ?>">
            <input type="hidden" name="namaAlat" id="namaAlat" value="<?= $namaAlat; ?>">
            <?php foreach ($hargaAwal as $ha) : ?>
                <input type="hidden" name="hargaAwal" id="" value="<?= $ha; ?>">
            <?php endforeach; ?>
            <section class="table__header">
                <h1>Jadwal <?= $bulanString; ?></h1>
                <a class="btnnBooking" id="submitLink" style="cursor: pointer;">Booking</a>
                <a href="/home" class="btnn">Kembali</a>
            </section>

            <section class="table__body">
                <table>
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Penyewa</th>
                            <th>Booking</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 0; ?>
                        <?php $tempStatus; ?>
                        <?php $tempNama; ?>
                        <?php for ($i = 1; $i <= $dataTanggal; $i++) : ?>
                            <tr>
                                <td><?= $i; ?> <?= $bulanString; ?></td>
                                <td>
                                    <?php if ($count > 0) : ?>
                                        <?= $tempStatus; ?>
                                    <?php else : ?>
                                        <?php foreach ($jadwal as $j) : ?>
                                            <?php if ($j['tanggal'] == $i) : ?>
                                                Terbooking
                                                <?php $count = $j['durasi']; ?>
                                                <?php $tempStatus = 'Terbooking'; ?>
                                                <?php $tempNama = $j['nama']; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($count > 0) : ?>
                                        <?= $tempNama; ?>
                                    <?php else : ?>
                                        <?php foreach ($jadwal as $j) : ?>
                                            <?php if ($j['tanggal'] == $i) : ?>
                                                <?= $j['nama']; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($count > 0) : ?>

                                        <?php $count--;?>
                                    <?php else : ?>
                                        <?php foreach ($jadwal as $j) : ?>
                                            <?php if ($j['tanggal'] == $i) : ?>

                                            <?php else : ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <div class="wrapper">
                                            <input type="checkbox" id="check" name="tanggal[]" value="<?= $i; ?>" />
                                        </div>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>

            </section>
        </main>
    </form>

    <script>
        // Menggunakan JavaScript untuk menangani peristiwa klik pada link
        document.getElementById('submitLink').addEventListener('click', function(event) {
            // Mencegah tindakan default dari link (navigasi)
            event.preventDefault();

            // Menjalankan fungsi yang menangani submit form
            submitForm();
        });

        // Fungsi untuk menangani submit form
        function submitForm() {
            // Mendapatkan formulir
            var form = document.getElementById('formBooking');

            // Menjalankan submit form
            form.submit();
        }
    </script>
</body>

</html>