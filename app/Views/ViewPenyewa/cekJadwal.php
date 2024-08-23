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
    <?php $i = 10; ?>
    <form action="/bookingRuangan" method="post" id="formBooking">
        <input type="hidden" name="studio" id="studio" value="<?= $studio; ?>">
        <input type="hidden" name="tgl_pakai" id="tgl_pakai" value="<?= $tgl_pakai; ?>">
        <?php foreach ($hargaAwal as $ha) : ?>
            <input type="hidden" name="hargaAwal" id="" value="<?= $ha; ?>">
        <?php endforeach; ?>
        <main class="table">
            <section class="table__header">
                <h1>Jadwal Ruangan Studio</h1>
                <a href="#" class="btnnBooking" id="submitLink">Booking</a>
                <a href="/home" class="btnn">Kembali</a>
            </section>

            <section class="table__body">
                <table>
                    <thead>
                        <tr>
                            <th>Jam</th>
                            <th>Status</th>
                            <th>Penyewa</th>
                            <th>Booking</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 0; ?>
                        <?php $tempStatus; ?>
                        <?php $tempNama; ?>
                        <tr>
                            <td> 10.00-11.00 </td>
                            <td>
                                <?php if ($count > 0) : ?>
                                    <?= $tempStatus; ?>
                                <?php else : ?>
                                    <?php foreach ($jadwal as $hasil) : ?>
                                        <?php if ($hasil['jam_pakai'] == 10) : ?>
                                            Terbooking
                                            <?php $count = $hasil['durasi']; ?>
                                            <?php $tempStatus = 'Terbooking'; ?>
                                            <?php $tempNama = $hasil['nama']; ?>

                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($count > 0) : ?>
                                    <?= $tempNama; ?>
                                <?php else : ?>
                                    <?php foreach ($jadwal as $hasil) : ?>
                                        <?php if ($hasil['jam_pakai'] == 10) : ?>
                                            <?= $hasil['nama']; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </td>

                            <td>
                                <?php if ($count > 0) : ?>
                                    -
                                    <?php $count--; $i++;?>
                                <?php else : ?>
                                    <?php foreach ($jadwal as $hasil) : ?>
                                        <?php if ($hasil['jam_pakai'] == 10) : ?>
                                            -
                                        <?php else : ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <div class="wrapper">
                                        <input type="checkbox" id="check" name="jam[]" value="<?= $i++; ?>" />
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>

                        <tr>
                            <td> 11.00-12.00 </td>
                            <td>
                                <?php if ($count > 0) : ?>
                                    <?= $tempStatus; ?>
                                <?php else : ?>
                                    <?php foreach ($jadwal as $hasil) : ?>
                                        <?php if ($hasil['jam_pakai'] == 11) : ?>
                                            Terbooking
                                            <?php $count = $hasil['durasi']; ?>
                                            <?php $tempStatus = 'Terbooking'; ?>
                                            <?php $tempNama = $hasil['nama']; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($count > 0) : ?>
                                    <?= $tempNama; ?>
                                <?php else : ?>
                                    <?php foreach ($jadwal as $hasil) : ?>
                                        <?php if ($hasil['jam_pakai'] == 11) : ?>
                                            <?= $hasil['nama']; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </td>

                            <td>
                                <?php if ($count > 0) : ?>
                                    -
                                    <?php $count--; $i++;?>
                                <?php else : ?>
                                    <?php foreach ($jadwal as $hasil) : ?>
                                        <?php if ($hasil['jam_pakai'] == 11) : ?>
                                            -
                                        <?php else : ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <div class="wrapper">
                                        <input type="checkbox" id="check" name="jam[]" value="<?= $i++; ?>" />
                                    </div>
                                <?php endif; ?>
                            </td>

                        </tr>
                        <tr>
                            <td> 12.00-13.00</td>
                            <td>
                                <?php if ($count > 0) : ?>
                                    <?= $tempStatus; ?>
                                <?php else : ?>
                                    <?php foreach ($jadwal as $hasil) : ?>
                                        <?php if ($hasil['jam_pakai'] == 12) : ?>
                                            Terbooking
                                            <?php $count = $hasil['durasi']; ?>
                                            <?php $tempStatus = 'Terbooking'; ?>
                                            <?php $tempNama = $hasil['nama']; ?>

                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($count > 0) : ?>
                                    <?= $tempNama; ?>
                                <?php else : ?>
                                    <?php foreach ($jadwal as $hasil) : ?>
                                        <?php if ($hasil['jam_pakai'] == 12) : ?>
                                            <?= $hasil['nama']; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </td>

                            <td>
                                <?php if ($count > 0) : ?>
                                    -
                                    <?php $count--; $i++;?>
                                <?php else : ?>
                                    <?php foreach ($jadwal as $hasil) : ?>
                                        <?php if ($hasil['jam_pakai'] == 12) : ?>
                                            -
                                        <?php else : ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <div class="wrapper">
                                        <input type="checkbox" id="check" name="jam[]" value="<?= $i++; ?>" />
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>13.00-14.00</td>
                            <td>
                                <?php if ($count > 0) : ?>
                                    <?= $tempStatus; ?>
                                <?php else : ?>
                                    <?php foreach ($jadwal as $hasil) : ?>
                                        <?php if ($hasil['jam_pakai'] == 13) : ?>
                                            Terbooking
                                            <?php $count = $hasil['durasi']; ?>
                                            <?php $tempStatus = 'Terbooking'; ?>
                                            <?php $tempNama = $hasil['nama']; ?>

                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($count > 0) : ?>
                                    <?= $tempNama; ?>
                                <?php else : ?>
                                    <?php foreach ($jadwal as $hasil) : ?>
                                        <?php if ($hasil['jam_pakai'] == 13) : ?>
                                            <?= $hasil['nama']; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </td>

                            <td>
                                <?php if ($count > 0) : ?>
                                    -
                                    <?php $count--; $i++;?>
                                <?php else : ?>
                                    <?php foreach ($jadwal as $hasil) : ?>
                                        <?php if ($hasil['jam_pakai'] == 13) : ?>
                                            -
                                        <?php else : ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <div class="wrapper">
                                        <input type="checkbox" id="check" name="jam[]" value="<?= $i++; ?>" />
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td> 14.00-15.00</td>
                            <td>
                                <?php if ($count > 0) : ?>
                                    <?= $tempStatus; ?>
                                <?php else : ?>
                                    <?php foreach ($jadwal as $hasil) : ?>
                                        <?php if ($hasil['jam_pakai'] == 14) : ?>
                                            Terbooking
                                            <?php $count = $hasil['durasi']; ?>
                                            <?php $tempStatus = 'Terbooking'; ?>
                                            <?php $tempNama = $hasil['nama']; ?>

                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($count > 0) : ?>
                                    <?= $tempNama; ?>
                                <?php else : ?>
                                    <?php foreach ($jadwal as $hasil) : ?>
                                        <?php if ($hasil['jam_pakai'] == 14) : ?>
                                            <?= $hasil['nama']; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </td>

                            <td>
                                <?php if ($count > 0) : ?>
                                    -
                                    <?php $count--; $i++;?>
                                <?php else : ?>
                                    <?php foreach ($jadwal as $hasil) : ?>
                                        <?php if ($hasil['jam_pakai'] == 14) : ?>
                                            -
                                        <?php else : ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <div class="wrapper">
                                        <input type="checkbox" id="check" name="jam[]" value="<?= $i++; ?>" />
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td> 15.00-16.00</td>
                            <td>
                                <?php if ($count > 0) : ?>
                                    <?= $tempStatus; ?>
                                <?php else : ?>
                                    <?php foreach ($jadwal as $hasil) : ?>
                                        <?php if ($hasil['jam_pakai'] == 15) : ?>
                                            Terbooking
                                            <?php $count = $hasil['durasi']; ?>
                                            <?php $tempStatus = 'Terbooking'; ?>
                                            <?php $tempNama = $hasil['nama']; ?>

                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($count > 0) : ?>
                                    <?= $tempNama; ?>
                                <?php else : ?>
                                    <?php foreach ($jadwal as $hasil) : ?>
                                        <?php if ($hasil['jam_pakai'] == 15) : ?>
                                            <?= $hasil['nama']; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </td>

                            <td>
                                <?php if ($count > 0) : ?>
                                    -
                                    <?php $count--; $i++;?>
                                <?php else : ?>
                                    <?php foreach ($jadwal as $hasil) : ?>
                                        <?php if ($hasil['jam_pakai'] == 15) : ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <div class="wrapper">
                                        <input type="checkbox" id="check" name="jam[]" value="<?= $i++; ?>" />
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td> 16.00-17.00</td>
                            <td>
                                <?php if ($count > 0) : ?>
                                    <?= $tempStatus; ?>
                                <?php else : ?>
                                    <?php foreach ($jadwal as $hasil) : ?>
                                        <?php if ($hasil['jam_pakai'] == 16) : ?>
                                            Terbooking
                                            <?php $count = $hasil['durasi']; ?>
                                            <?php $tempStatus = 'Terbooking'; ?>
                                            <?php $tempNama = $hasil['nama']; ?>

                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($count > 0) : ?>
                                    <?= $tempNama; ?>
                                <?php else : ?>
                                    <?php foreach ($jadwal as $hasil) : ?>
                                        <?php if ($hasil['jam_pakai'] == 16) : ?>
                                            <?= $hasil['nama']; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </td>

                            <td>
                                <?php if ($count > 0) : ?>
                                    -
                                    <?php $count--; $i++;?>
                                <?php else : ?>
                                    <?php foreach ($jadwal as $hasil) : ?>
                                        <?php if ($hasil['jam_pakai'] == 16) : ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <div class="wrapper">
                                        <input type="checkbox" id="check" name="jam[]" value="<?= $i++; ?>" />
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td> 17.00-18.00</td>
                            <td>
                                <?php if ($count > 0) : ?>
                                    <?= $tempStatus; ?>
                                <?php else : ?>
                                    <?php foreach ($jadwal as $hasil) : ?>
                                        <?php if ($hasil['jam_pakai'] == 17) : ?>
                                            Terbooking
                                            <?php $count = $hasil['durasi']; ?>
                                            <?php $tempStatus = 'Terbooking'; ?>
                                            <?php $tempNama = $hasil['nama']; ?>

                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($count > 0) : ?>
                                    <?= $tempNama; ?>
                                <?php else : ?>
                                    <?php foreach ($jadwal as $hasil) : ?>
                                        <?php if ($hasil['jam_pakai'] == 17) : ?>
                                            <?= $hasil['nama']; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </td>

                            <td>
                                <?php if ($count > 0) : ?>
                                    -
                                    <?php $count--; $i++;?>
                                <?php else : ?>
                                    <?php foreach ($jadwal as $hasil) : ?>
                                        <?php if ($hasil['jam_pakai'] == 17) : ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <div class="wrapper">
                                        <input type="checkbox" id="check" name="jam[]" value="<?= $i++; ?>" />
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td> 18.00-19.00</td>
                            <td>
                                <?php if ($count > 0) : ?>
                                    <?= $tempStatus; ?>
                                <?php else : ?>
                                    <?php foreach ($jadwal as $hasil) : ?>
                                        <?php if ($hasil['jam_pakai'] == 18) : ?>
                                            Terbooking
                                            <?php $count = $hasil['durasi']; ?>
                                            <?php $tempStatus = 'Terbooking'; ?>
                                            <?php $tempNama = $hasil['nama']; ?>

                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($count > 0) : ?>
                                    <?= $tempNama; ?>
                                <?php else : ?>
                                    <?php foreach ($jadwal as $hasil) : ?>
                                        <?php if ($hasil['jam_pakai'] == 18) : ?>
                                            <?= $hasil['nama']; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </td>

                            <td>
                                <?php if ($count > 0) : ?>
                                    -
                                    <?php $count--; $i++;?>
                                <?php else : ?>
                                    <?php foreach ($jadwal as $hasil) : ?>
                                        <?php if ($hasil['jam_pakai'] == 18) : ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <div class="wrapper">
                                        <input type="checkbox" id="check" name="jam[]" value="<?= $i++; ?>" />
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td> 19.00-20.00</td>
                            <td>
                                <?php if ($count > 0) : ?>
                                    <?= $tempStatus; ?>
                                <?php else : ?>
                                    <?php foreach ($jadwal as $hasil) : ?>
                                        <?php if ($hasil['jam_pakai'] == 19) : ?>
                                            Terbooking
                                            <?php $count = $hasil['durasi']; ?>
                                            <?php $tempStatus = 'Terbooking'; ?>
                                            <?php $tempNama = $hasil['nama']; ?>

                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($count > 0) : ?>
                                    <?= $tempNama; ?>
                                <?php else : ?>
                                    <?php foreach ($jadwal as $hasil) : ?>
                                        <?php if ($hasil['jam_pakai'] == 19) : ?>
                                            <?= $hasil['nama']; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </td>

                            <td>
                                <?php if ($count > 0) : ?>
                                    -
                                    <?php $count--; $i++;?>
                                <?php else : ?>
                                    <?php foreach ($jadwal as $hasil) : ?>
                                        <?php if ($hasil['jam_pakai'] == 19) : ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <div class="wrapper">
                                        <input type="checkbox" id="check" name="jam[]" value="<?= $i++; ?>" />
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td> 20.00-21.00</td>
                            <td>
                                <?php if ($count > 0) : ?>
                                    <?= $tempStatus; ?>
                                <?php else : ?>
                                    <?php foreach ($jadwal as $hasil) : ?>
                                        <?php if ($hasil['jam_pakai'] == 20) : ?>
                                            Terbooking
                                            <?php $count = $hasil['durasi']; ?>
                                            <?php $tempStatus = 'Terbooking'; ?>
                                            <?php $tempNama = $hasil['nama']; ?>

                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($count > 0) : ?>
                                    <?= $tempNama; ?>
                                <?php else : ?>
                                    <?php foreach ($jadwal as $hasil) : ?>
                                        <?php if ($hasil['jam_pakai'] == 20) : ?>
                                            <?= $hasil['nama']; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </td>

                            <td>
                                <?php if ($count > 0) : ?>
                                    <div class="wrapper">
                                        -
                                    </div>
                                    <?php $count--; $i++;?>
                                <?php else : ?>
                                    <?php foreach ($jadwal as $hasil) : ?>
                                        <?php if ($hasil['jam_pakai'] == 20) : ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <div class="wrapper">
                                        <input type="checkbox" id="check" name="jam[]" value="<?= $i++; ?>" />
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td> 21.00-22.00</td>
                            <td>
                                <?php if ($count > 0) : ?>
                                    <?= $tempStatus; ?>
                                <?php else : ?>
                                    <?php foreach ($jadwal as $hasil) : ?>
                                        <?php if ($hasil['jam_pakai'] == 21) : ?>
                                            Terbooking
                                            <?php $count = $hasil['durasi']; ?>
                                            <?php $tempStatus = 'Terbooking'; ?>
                                            <?php $tempNama = $hasil['nama']; ?>

                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($count > 0) : ?>
                                    <?= $tempNama; ?>
                                <?php else : ?>
                                    <?php foreach ($jadwal as $hasil) : ?>
                                        <?php if ($hasil['jam_pakai'] == 21) : ?>
                                            <?= $hasil['nama']; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </td>

                            <td>
                                <?php if ($count > 0) : ?>
                                    -
                                    <?php $count--; $i++;?>
                                <?php else : ?>
                                    <?php foreach ($jadwal as $hasil) : ?>
                                        <?php if ($hasil['jam_pakai'] == 21) : ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <div class="wrapper">
                                        <input type="checkbox" id="check" name="jam[]" value="<?= $i++; ?>" />
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
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