<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Creative Studio landing page.">
    <meta name="author" content="Devcrud">
    <title>Alat Musik | Admin Fusion</title>
    <link href="img/fav.ico" rel="icon">

    <!-- font icons -->
    <link rel="stylesheet" href="assetsIndex/vendors/themify-icons/css/themify-icons.css">

    <!-- Bootstrap + Creative Studio main styles -->
    <link rel="stylesheet" href="assetsIndex/css/creative-studio.css">

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
<section id="about">
    <html lang="en">

    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <body>
        <div class="container mt-3">
            <a href="admin" class="btn btn-dark">Kembali</a>
            <a style="justify-content: center;" href="adminInsertAlat" class="btn btn-primary rounded w-lg btn-lg my-1">Insert Alat</a> <br>
            <br>
            <h2>Daftar Alat</h2>
            <table class="table table-bordered" id="tabelAlat">
                <thead>
                    <tr>
                        <th style="cursor: pointer;" onclick="sortTable(0)">Kode Alat</th>
                        <th style="cursor: pointer;" onclick="sortTable(1)">Nama</th>
                        <th style="cursor: pointer;" onclick="sortTable(2)">Jenis Alat</th>
                        <th style="cursor: pointer;" onclick="sortTable(3)">Harga Sewa</th>
                        <th style="cursor: pointer;" onclick="sortTable(4)">Spesifikasi Alat</th>
                    </tr>
                </thead>

                <tbody>


                    <?php foreach ($alat as $a) : ?>
                        <tr>
                            <td>
                                <?= $a['kode_alat']; ?>
                            </td>
                            <td>
                                <img src="img/alat/<?= $a['foto']; ?>" alt="" width="100">
                                <?= $a['nama']; ?>
                            </td>
                            <td>
                                <?= $a['jenis']; ?>
                            </td>
                            <td>
                                <?= $a['harga']; ?>
                            </td>
                            <td>
                                <form action="adminLihatAlat" method="post">
                                    <input type="hidden" value="<?= $a['kode_alat']; ?>" name="kode">
                                    <button type="submit" class="btn btn-primary">Lihat</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>

    </body>

    </html>
    </table>
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