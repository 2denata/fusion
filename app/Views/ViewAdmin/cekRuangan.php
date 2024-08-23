<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ruangan Studio | Admin Fusion</title>
    <link href="img/fav.ico" rel="icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

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
        </div>
    </div>
</header>
<!-- End Of Page Header -->

<body>
    <section id="about">
        <div class="container mt-3">
            <h2>Daftar Ruangan</h2>
            <table class="table table-bordered" id="tabelAlat">
                <thead>
                    <tr>
                        <th>Kode Ruangan</th>
                        <th>Harga Sewa Ruangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ruangan as $r) : ?>
                        <tr>
                            <td><?= $r['kode_ruangan']; ?></td>
                            <td><?= $r['harga']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="admin" class="btn btn-dark">Kembali</a>
        </div>
    </section>
    
    <!-- core  -->
    <script src="assetsIndex/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="assetsIndex/vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- bootstrap affix -->
    <script src="assetsIndex/vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- Creative Studio js -->
    <script src="assetsIndex/js/creative-studio.js"></script>
</body>

</html>