<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Rekapitulasi Data</title>
</head>

<body>

    <div class="container">


        <h2>Rekapitulasi Data Studio Fusion</h2>
        <br>
        <h4>Data Booking Ruangan</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Kode Booking</th>
                            <th>Bukti Pembayaran</th>
                            <th>Email</th>
                            <th>Status Pembayaran</th>
                            <th>Kode Ruangan</th>
                            <th>Tanggal Pesan</th>
                            <th>Tanggal Pembayaran</th>
                            <th>Tanggal Pakai</th>
                            <th>Jam Pakai</th>
                            <th>Durasi</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($bookRuangan as $br) : ?>
                            <tr>
                                <td><?= $br['kode_booking_ruangan']; ?></td>
                                <td><?= $br['bukti_pembayaran']; ?></td>
                                <td><?= $br['email']; ?></td>
                                <td><?= $br['status_pembayaran']; ?></td>
                                <td><?= $br['kode_ruangan']; ?></td>
                                <td><?= $br['tgl_pesan']; ?></td>
                                <td><?= $br['tgl_pembayaran']; ?></td>
                                <td><?= $br['tgl_pakai']; ?></td>
                                <td><?= $br['jam_pakai']; ?></td>
                                <td><?= $br['durasi']; ?></td>
                                <td><?= $br['total_harga']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
    </div>
</body>

</html>