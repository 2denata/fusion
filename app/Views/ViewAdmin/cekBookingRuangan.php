<!DOCTYPE html>
<html lang="en">

<head>
    <title>Booking Ruangan | Admin Fusion</title>
    <link href="img/fav.ico" rel="icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- font icons -->
    <link rel="stylesheet" href="assetsIndex/vendors/themify-icons/css/themify-icons.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <!-- Bootstrap + Creative Studio main styles -->
    <link rel="stylesheet" href="assetsIndex/css/creative-studio.css">
    <style>
        .popup {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.9);
        }

        .popup-content {
            margin: auto;
            display: block;
            max-width: 90%;
            max-height: 90%;
        }

        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        .popup-img {
            cursor: pointer;
            width: 100px;
            /* Atur lebar tetap sesuai kebutuhan */
            height: auto;
            /* Biarkan ketinggian mengikuti rasio aspek gambar */
        }

        img {
            cursor: pointer;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

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

<!-- About Section -->


<body>
    <section id="about">

        <div class="container mt-3">
            <a href="admin" class="btn btn-dark">Kembali</a>
            <h2>Daftar Booking Ruangan</h2>
            <table class="table table-bordered" style="overflow-y: auto;" id="tabelAlat">
                <thead>
                    <tr>
                        <th style="cursor: pointer;" onclick="sortTable(0)">Kode Booking Ruangan</th>
                        <th style="cursor: pointer;" onclick="sortTable(1)">Bukti Pembayaran</th>
                        <th style="cursor: pointer;" onclick="sortTable(2)">Email</th>
                        <th style="cursor: pointer;" onclick="sortTable(3)">Status Pembayaran</th>
                        <th style="cursor: pointer;" onclick="sortTable(4)">Kode Ruangan</th>
                        <th style="cursor: pointer;" onclick="sortTable(5)">Tanggal Pesan</th>
                        <th style="cursor: pointer;" onclick="sortTable(6)">Tanggal Pembayaran</th>
                        <th style="cursor: pointer;" onclick="sortTable(7)">Tanggal Pakai</th>
                        <th style="cursor: pointer;" onclick="sortTable(8)">Jam Pakai</th>
                        <th style="cursor: pointer;" onclick="sortTable(9)">Durasi</th>
                        <th style="cursor: pointer;" onclick="sortTable(10)">Total Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($booking as $j) : ?>
                        <tr>
                            <td><?= $j['kode_booking_ruangan']; ?></td>

                            <td>
                                <img src="img/bukti_pembayaran/<?= $j['bukti_pembayaran']; ?>" class="popup-img" onclick="showPopup(this.src)">
                                <div id="image-popup<?= $i; ?>" class="popup">
                                    <span class="close" onclick="closePopup()">&times;</span>
                                    <img src="img/bukti_pembayaran/<?= $j['bukti_pembayaran']; ?>" id="popup-img<?= $i; ?>" class="popup-content">
                                </div>
                                <script>
                                    function showPopup(imageSrc) {
                                        var popup = document.getElementById('image-popup<?= $i; ?>');
                                        var popupImg = document.getElementById('popup-img<?= $i; ?>');

                                        popup.style.display = 'block';
                                        popupImg.src = imageSrc;
                                    }

                                    function closePopup() {
                                        var popup = document.getElementById('image-popup<?= $i; ?>');
                                        popup.style.display = 'none';
                                    }
                                </script>
                                <?php $i++; ?>
                            </td>

                            <td><?= $j['email']; ?></td>
                            <td><?= $j['status_pembayaran']; ?></td>
                            <td><?= $j['kode_ruangan']; ?></td>
                            <td><?= $j['tgl_pesan']; ?></td>
                            <td><?= $j['tgl_pembayaran']; ?></td>
                            <td><?= $j['tgl_pakai']; ?></td>
                            <td><?= $j['jam_pakai']; ?></td>
                            <td><?= $j['durasi']; ?></td>
                            <td><?= $j['total_harga']; ?></td>
                            <td>
                                <?php if ($j['status_pembayaran'] == 'Belum Diverifikasi') : ?>
                                    <form action="verifikasiBookingRuangan" method="post">
                                        <input type="hidden" name="kodeBookingRuangan" value="<?= $j['kode_booking_ruangan']; ?>">
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal<?= $i; ?>">Periksa</button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal<?= $i++; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Periksa Data Booking</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Verifikasi data booking dengan kode booking <?= $j['kode_booking_ruangan']; ?>?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" name="periksa" value="verifikasi" class="btn btn-success">Verifikasi</button>
                                                        <button type="submit" name="periksa" value="tolak" class="btn btn-danger">Tolak</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                <?php elseif ($j['status_pembayaran'] == 'Terverifikasi') : ?>
                                    <form action="batalkanBookingRuangan" method="post">
                                        <input type="hidden" name="kodeBookingRuangan" value="<?= $j['kode_booking_ruangan']; ?>">
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?= $i; ?>"> Batalkan</button>
                                        <p></p>
                                        <a href="https://wa.me/+62<?= $j['no_hp']; ?>?text=Halo%20<?= $j['nama']; ?>,%20<?= $pesan; ?>%20<?= $j['jam_pakai']; ?>.00,%20Terimakasih" target="_blank"><button type="button" class="btn btn-success"><i class="bi bi-whatsapp"></i> WA</button>
                                        </a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal<?= $i++; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Batalkan Data Booking</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Batalkan data booking dengan kode booking <?= $j['kode_booking_ruangan']; ?>?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger">Batalkan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                <?php else : ?>
                                    -
                                <?php endif; ?>



                            </td>
                        </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>

        </div>

    </section>
    <!-- End of About Section -->

    <!-- script sort -->
    <script>
        function sortTable(n) {
            var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
            table = document.getElementById("tabelAlat");
            switching = true;
            // Set the sorting direction to ascending:
            dir = "asc";
            /* Make a loop that will continue until
            no switching has been done: */
            while (switching) {
                // Start by saying: no switching is done:
                switching = false;
                rows = table.rows;
                /* Loop through all table rows (except the
                first, which contains table headers): */
                for (i = 1; i < (rows.length - 1); i++) {
                    // Start by saying there should be no switching:
                    shouldSwitch = false;
                    /* Get the two elements you want to compare,
                    one from current row and one from the next: */
                    x = rows[i].getElementsByTagName("TD")[n];
                    y = rows[i + 1].getElementsByTagName("TD")[n];
                    /* Check if the two rows should switch place,
                    based on the direction, asc or desc: */
                    if (dir == "asc") {
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            // If so, mark as a switch and break the loop:
                            shouldSwitch = true;
                            break;
                        }
                    } else if (dir == "desc") {
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            // If so, mark as a switch and break the loop:
                            shouldSwitch = true;
                            break;
                        }
                    }
                }
                if (shouldSwitch) {
                    /* If a switch has been marked, make the switch
                    and mark that a switch has been done: */
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                    // Each time a switch is done, increase this count by 1:
                    switchcount++;
                } else {
                    /* If no switching has been done AND the direction is "asc",
                    set the direction to "desc" and run the while loop again. */
                    if (switchcount == 0 && dir == "asc") {
                        dir = "desc";
                        switching = true;
                    }
                }
            }
        }
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