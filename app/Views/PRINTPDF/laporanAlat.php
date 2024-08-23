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
        <h4>Data Alat Musik</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Harga Sewa</th>
                    <th>Kode Alat</th>
                    <th>Foto</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alat as $a) : ?>
                    <tr>
                        <td><?= $a['kode_alat']; ?></td>
                        <td><?= $a['nama']; ?></td>
                        <td><?= $a['jenis']; ?></td>
                        <td><?= $a['harga']; ?></td>
                        <td><?= $a['foto']; ?></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>