<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Creative Studio landing page.">
    <meta name="author" content="Devcrud">
    <title>Tambah Alat Musik | Admin Fusion</title>
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
        <form action="adminInsertAlat" method="post" enctype="multipart/form-data">
            <a href="adminCekAlat" class="btn btn-primary rounded w-lg btn-lg my-4">Kembali</a>
            <div class="row align-items-center">
                <div class="col-md-5 col-lg-4">
                    <img src="img/upload.png" alt="" class="w-100 img-thumbnail mb-3" id="previewImage">
                    <input name="foto" type="file" id="fileInput" accept="image/*">
                    <button id="upload" type="button" class="btn btn-secondary btn-block" onclick="openFileInput()">Pilih File</button>
                    <span id="fileName"></span>
                </div>

                <div class="col-md-7 col-lg-8">
                    <div class="form-floating mb-3">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" placeholder="Nama Alat" name="nama" required>
                    </div>
                    <div class="form-floating mb-3">
                        <label for="jenis">Jenis Alat</label>
                        <select class="form-control" name="jenis" id="jenis" required> 
                            <option disabled selected>Pilih jenis alat</option>
                            <option value="Gitar">Gitar</option>
                            <option value="Drum">Drum</option>
                            <option value="Bass">Bass</option>
                            <option value="Piano">Piano</option>
                            <option value="Ampli">Ampli</option>
                        </select>
                    </div>
                    <div class="form-floating mb-3">
                        <label for="harga">Harga Sewa</label>
                        <input type="number" class="form-control" id="harga" placeholder="Harga Sewa Alat" name="harga" required>
                    </div>
                    <button type="submit" class="btn btn-danger">Simpan</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </div>
        </form>
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