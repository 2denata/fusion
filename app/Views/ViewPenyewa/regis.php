<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regis | Fusion</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <style media="screen">
        *,
        *:before,
        *:after {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background-image: url('fotoStudio.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            /* background-color: #080710; */
        }

        .background {
            width: 430px;
            height: 520px;
            position: absolute;
            transform: translate(-50%, -50%);
            left: 50%;
            top: 50%;
        }

        .background .shape {
            height: 200px;
            width: 200px;
            position: absolute;
            border-radius: 50%;
        }

        .shape:first-child {
            background: linear-gradient(#ff512f,
                    #f09819);
            left: -80px;
            top: -80px;
        }

        .shape:last-child {
            background: linear-gradient(to right,
                    #ff512f,
                    #f09819);
            right: -30px;
            bottom: -80px;
        }

        form {
            height: 580px;
            width: 400px;
            background-color: rgba(255, 255, 255, 0.13);
            position: absolute;
            transform: translate(-50%, -50%);
            top: 50%;
            left: 50%;
            border-radius: 10px;
            backdrop-filter: blur(50px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
            padding: 50px 35px;
            overflow: auto;
        }

        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            background: #666;
        }

        ::-webkit-scrollbar-thumb {
            background: #232323;
        }

        form * {
            font-family: 'Poppins', sans-serif;
            color: #ffffff;
            letter-spacing: 0.5px;
            outline: none;
            border: none;
        }

        form h3 {
            font-size: 32px;
            font-weight: 500;
            line-height: 42px;
            text-align: center;
        }

        label {
            display: block;
            margin-top: 30px;
            font-size: 16px;
            font-weight: 500;
        }

        input {
            display: block;
            height: 50px;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.07);
            border-radius: 3px;
            padding: 0 10px;
            margin-top: 8px;
            font-size: 14px;
            font-weight: 300;
        }

        ::placeholder {
            color: #e5e5e5;
        }

        button {
            margin-top: 50px;
            width: 100%;
            background-color: #ffffff;
            color: #080710;
            padding: 15px 0;
            font-size: 18px;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: linear-gradient(to right,
                    #ff512f,
                    #f09819);
            color: #ffffff;
        }

        .social {
            margin-top: 30px;
            display: flex;
        }

        .social div {
            background: red;
            width: 150px;
            border-radius: 3px;
            padding: 5px 10px 10px 5px;
            background-color: rgba(255, 255, 255, 0.27);
            color: #eaf0fb;
            text-align: center;
        }

        .social div:hover {
            background-color: rgba(255, 255, 255, 0.47);
        }

        .social .fb {
            margin-left: 25px;
        }

        .social i {
            margin-right: 4px;
        }

        p {
            text-align: center;
            margin-top: 10%;
        }
    </style>
</head>

<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="prosesSignUp" method="post">
        <h3>Regis Here</h3>
        <label for="username">Email</label>
        <input type="text" placeholder="Email" id="username" name="email">
        <span style="color: #FF0000;">
            <?php if (session()->getFlashdata('validation')) : ?>
                <?= $validation->getError('email'); ?>
            <?php endif; ?>
        </span>

        <label for="nama">Nama</label>
        <input type="text" placeholder="Nama" id="nama" name="nama">
        <span style="color: #FF0000;">
            <?php if (session()->getFlashdata('validation')) : ?>
                <?= $validation->getError('nama'); ?>
            <?php endif; ?></span>

        <label for="number">Number Phone</label>
        <input type="text" placeholder="Number Phone" id="number" name="no_hp">
        <span style="color: #FF0000;">
            <?php if (session()->getFlashdata('validation')) : ?>
                <?= $validation->getError('no_hp'); ?>
            <?php endif; ?>
        </span>

        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="password" name="password">
        <span style="color: #FF0000;">
            <?php if (session()->getFlashdata('validation')) : ?>
                <?= $validation->getError('password'); ?>
            <?php endif; ?>
        </span>

        <button type="submit">Register</button>
        <p>
            <a>Sudah punya akun? </a><a href="/login">Login yuk!</a>
        </p>
        </div>
    </form>
</body>

</html>