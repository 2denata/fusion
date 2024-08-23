<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Creative Studio landing page.">
    <meta name="author" content="Devcrud">
    <title>Spesifikasi Alat | Admin Fusion</title>
    <link href="img/fav.ico" rel="icon">
    <!-- font icons -->
    <link rel="stylesheet" href="assetsIndex/vendors/themify-icons/css/themify-icons.css">

    <!-- Bootstrap + Creative Studio main styles -->
    <link rel="stylesheet" href="assetsIndex/css/creative-studio.css">

    <style>
        #fileInput {
            display: none;
        }
    </style>
</head>

<body>

    <!-- About Section -->
    <div class="container">
        <form action="adminEditAlat" method="post" enctype="multipart/form-data">
            <a href="adminCekAlat" class="btn btn-primary rounded w-lg btn-lg my-4">Kembali</a>
            <?php foreach ($alat as $a) : ?>
                <div class="row align-items-center">
                    <div class="col-md-5 col-lg-4">
                        <img src="img/alat/<?= $a['foto']; ?>" alt="<?= $a['nama']; ?>" class="w-100 img-thumbnail mb-3" id="previewImage">
                        <input type="file" id="fileInput" onchange="displayFileName(this)" accept="image/*" name="foto">
                        <button id="upload" type="button" class="btn btn-secondary btn-block" onclick="openFileInput()"><?= $a['foto']; ?></button>
                        <input type="hidden" name="currentFoto" id="currentFoto" value="<?= $a['foto']; ?>">
                        <span id="fileName"></span>
                    </div>

                    <div class="col-md-7 col-lg-8">
                        <div class="form-floating mb-3">
                            <label for="kode">Kode Alat</label>
                            <input type="text" class="form-control" id="kode" value="<?= $a['kode_alat']; ?>" name="kode" disabled>
                            <input type="hidden" name="kodeAlat" id="kodeAlat" value="<?= $a['kode_alat']; ?>">
                            <div class="error">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="Nama Alat" value="<?= $a['nama']; ?>" name="nama">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="jenis">Jenis Alat</label>
                            <select class="form-control" name="jenis" id="jenis">
                                <option disabled selected>Pilih jenis alat</option>
                                <option value="Gitar" <?php echo ($a['jenis'] == 'Gitar') ? 'selected' : ''; ?>>Gitar</option>
                                <option value="Drum" <?php echo ($a['jenis'] == 'Drum') ? 'selected' : ''; ?>>Drum</option>
                                <option value="Bass" <?php echo ($a['jenis'] == 'Bass') ? 'selected' : ''; ?>>Bass</option>
                                <option value="Piano" <?php echo ($a['jenis'] == 'Piano') ? 'selected' : ''; ?>>Piano</option>
                                <option value="Ampli" <?php echo ($a['jenis'] == 'Ampli') ? 'selected' : ''; ?>>Ampli</option>
                            </select>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="harga">Harga Sewa</label>
                            <input type="text" class="form-control" id="harga" placeholder="Harga Sewa Alat" value="<?= $a['harga']; ?>" name="harga">
                        </div>
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-danger" type="submit">Simpan</button>
                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>
        </form>


        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Yakin ingin menghapus <?= $a['nama']; ?> ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <form action="adminHapusAlat" method="post">
                            <input type="hidden" name="kodeAlat" id="kodeAlat" value="<?= $a['kode_alat']; ?>">
                            <button type="submit" class="btn btn-primary">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        </div>


        <!-- End of About Section -->

        <script>
            function displayFileName(input) {
                var tombol = document.getElementById("upload");
                var fileName = document.getElementById("fileName");
                // fileName.textContent = input.files[0].name;
                tombol.innerText = input.files[0].name;
            }

            function openFileInput() {
                document.getElementById("fileInput").click();
            }

            // Mendapatkan elemen input file dan elemen gambar
            var fileInput = document.getElementById("fileInput");
            var previewImage = document.getElementById("previewImage");

            // Menambahkan event listener untuk perubahan pada input file
            fileInput.addEventListener("change", function() {
                // Memastikan bahwa file telah dipilih
                if (fileInput.files && fileInput.files[0]) {
                    // Membaca file yang dipilih
                    var reader = new FileReader();

                    // Mengatur callback ketika proses membaca selesai
                    reader.onload = function(e) {
                        // Mengganti sumber gambar pada elemen img dengan gambar yang baru
                        previewImage.src = e.target.result;
                    };

                    // Membaca file sebagai URL data
                    reader.readAsDataURL(fileInput.files[0]);
                }
            });
        </script>

        <!-- core  -->
        <script src="assetsIndex/vendors/jquery/jquery-3.4.1.js"></script>
        <script src="assetsIndex/vendors/bootstrap/bootstrap.bundle.js"></script>

        <!-- bootstrap affix -->
        <script src="assetsIndex/vendors/bootstrap/bootstrap.affix.js"></script>

        <!-- Creative Studio js -->
        <script src="assetsIndex/js/creative-studio.js"></script>

</body>

</html>