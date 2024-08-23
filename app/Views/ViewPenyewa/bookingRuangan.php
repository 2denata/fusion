<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fusion | Booking Studio</title>
    <!-- <link rel="stylesheet" href="styleHalaman.css"> -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap');
        @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            background: url(fotoStudio.jpg) center / cover;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        main.table {
            width: 82vw;
            height: 90vh;
            background-color: #fff5;

            backdrop-filter: blur(7px);
            box-shadow: 0 .4rem .8rem #0005;
            border-radius: .8rem;

            overflow: hidden;
        }

        .table__header {
            width: 100%;
            height: 10%;
            background-color: #fff4;
            padding: .8rem 1rem;

            display: flex;
            justify-content: space-between;
        }

        .buttonBooking {
            margin-left: auto;
        }

        .body2 {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 80px;
            padding-top: 50px;
            margin: .2rem auto;
            border-radius: .6rem;
            overflow: auto;
            overflow: overlay;
        }

        .body2::-webkit-scrollbar {
            width: 0.5rem;
            height: 0.5rem;
        }

        .body2::-webkit-scrollbar-thumb {
            border-radius: .5rem;
            background-color: #0004;
            visibility: hidden;
        }

        .body2:hover::-webkit-scrollbar-thumb {
            visibility: visible;
        }

        table {
            width: 100%;
        }

        td img {
            width: 36px;
            height: 36px;
            margin-right: .5rem;
            border-radius: 50%;

            vertical-align: middle;
        }

        table,
        th,
        td {
            border-collapse: collapse;
            padding: 1rem;
            text-align: left;
        }

        thead th {
            position: sticky;
            top: 0;
            left: 0;
            background-color: #d5d1defe;
            cursor: pointer;
            text-transform: capitalize;
        }

        tbody tr:nth-child(even) {
            background-color: #0000000b;
        }

        tbody tr {
            --delay: .1s;
            transition: .5s ease-in-out var(--delay), background-color 0s;
        }

        tbody tr:hover {
            background-color: #fff6 !important;
        }

        @media (max-width: 1000px) {
            td:not(:first-of-type) {
                min-width: 12.1rem;
            }
        }

        thead th:hover {
            color: #ff512f;
        }

        .btnn {
            font-weight: 800;
            font-size: 15px;
            line-height: 20px;
            text-transform: uppercase;
            width: 100px;
            height: fit-content;
            padding: 5px;
            border-radius: 15px;
            transition: 0.5s ease;
            text-decoration: none;
            text-align: center;
        }

        .btnn:hover {
            background: linear-gradient(to right,
                    #ff512f,
                    #f09819);
        }

        .btnn {
            color: white;
            border: 2px solid
        }

        .btnnBooking {
            font-weight: 800;
            font-size: 15px;
            line-height: 20px;
            text-transform: uppercase;
            width: 100px;
            padding: 5px;
            border-radius: 15px;
            transition: 0.5s ease;
            text-decoration: none;
            text-align: center;
            margin-left: 580px;
        }

        .btnnBooking:hover {
            background: linear-gradient(to right,
                    #ff512f,
                    #f09819);
        }

        .btnnBooking {
            color: white;
            border: 2px solid
        }

        .container {
            max-width: 700px;
            width: 100%;
            margin-top: 40%;
            background-color: rgba(255, 255, 255, 0.13);
            border: 2px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(1000px);
            box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
            padding: 8px 30px;
            border-radius: 5px;
        }

        .container form .user-details {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        form .user-details .input-box {
            margin-bottom: 15px;
            width: calc(100% / 2 - 20px);
        }

        .user-details .input-box input {
            height: 45px;
            width: 100%;
            outline: none;
            border-radius: 5px;
            border: 1px solid #ccc;
            background-color: rgba(255, 255, 255, 0.07);
            padding-left: 15px;
            font-size: 16px;
            border-bottom-width: 2px;
            transition: all 0.3s ease;
        }

        .user-details .details {
            font-weight: 900;
            font-size: 17px;
        }

        .input .bukti {
            border: none;
        }

        .user-details .input-box details {
            display: block;
            margin-bottom: 10px;
        }

        form .button {
            height: 45px;
            margin: 45px 0;
            margin-bottom: 60px;

        }

        form .button input {
            height: 100%;
            width: 100%;
            outline: none;
            color: #080710;
            border: none;
            font-weight: 700;
            font-size: 18px;
            border-radius: 5px;
            letter-spacing: 1px;
            background-color: #ffff;
            margin-top: 0.5px;
            cursor: pointer;
        }

        form .button input:hover {
            background: linear-gradient(-135deg,
                    #ff512f,
                    #f09819);
            color: #FFF;
            
        }

        @media (max-width : 584px) {
            .container {
                max-width: 100%;
            }

            form .user-details .input-box {
                margin-bottom: 15px;
                width: 100%;
            }

            .container form .user-details {
                max-height: 300px;
                overflow-y: scroll;
            }

            user-details::-webkit-scrollbar {
                width: 0;
            }
        }
    </style>
</head>

<body>
    <main class="table">
        <section class="table__header">
            <h1>Booking Ruangan Studio</h1>
            <!-- <a href="#" class="btnnBooking">Booking</a> -->
            <a href="home" class="btnn">Kembali</a>
        </section>
        <div class="body2">
            <div class="container">
                <form action="prosesBookingRuangan" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="email" id="email" value="<?= session()->get('username')['email']; ?>">
                    <input type="hidden" name="studio" id="kodeRuangan" value="<?= $studio; ?>">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Nama </span>
                            <input type="text" name="nama" value="<?= session()->get('username')['nama']; ?>" readonly>
                        </div>
                        <div class="input-box">
                            <span class="details">Studio </span>
                            <input type="hidden" name="studio" value="<?= $studio; ?>">
                            <input type="text" name="studio1" value="Studio <?= $studio; ?>" readonly>
                        </div>
                        <div class="input-box">
                            <span class="details">Tanggal Pakai Studio</span>
                            <input type="text" name="tgl_pakai" value="<?= $tgl_pakai; ?>" readonly>
                        </div>
                        <div class="input-box">
                            <span class="details">Durasi </span>
                            <input type="text" name="durasi" value="<?= $durasi; ?> jam" readonly>
                        </div>
                        <div class="input-box">
                            <span class="details">Jam Pakai Studio </span>
                            <input type="text" name="jam_pakai" value="<?= $jam_pakai; ?>.00-<?= $jam_pakai+$durasi; ?>.00" readonly>
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
        </section>
    </main>

</body>

</html>