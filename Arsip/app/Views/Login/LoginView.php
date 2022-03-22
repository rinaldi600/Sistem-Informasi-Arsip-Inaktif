<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Selamat Datang di Arsip Bappeda Kudus</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">



    <!-- Bootstrap core CSS -->
    <link href="<?= base_url() ?>/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="<?= base_url() ?>/css/signin.css" rel="stylesheet">
    <link href="<?= base_url() ?>/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: rgb(245,245,245)" class="text-center">

<main class="form-signin">
    <form action="/dataLogin" method="post">
        <img class="mb-4" src="<?= base_url() ?>/img/Lambang_Kabupaten_Kudus.png" alt="" width="72" height="85">
        <h1 class="h3 mb-3 fw-normal">Masuk</h1>

        <div class="form-floating">
            <input type="text" class="form-control <?= session()->getFlashdata('username') ? 'is-invalid' : '' ?>" id="username" name="username" value="<?= old('username') ?>">
            <label for="username">Username</label>

            <div id="validationServer03Feedback" class="invalid-feedback">
                <?= session()->getFlashdata('username') ?>
            </div>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control <?= session()->getFlashdata('password') ? 'is-invalid' : '' ?>" id="password" name="password" value="<?= old('password') ?>">
            <label for="password">Password</label>

            <div id="validationServer03Feedback" class="invalid-feedback">
                <?= session()->getFlashdata('password') ?>
            </div>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    </form>
</main>

<script src="<?= base_url() ?>/js/bootstrap.bundle.min.js"></script>
</body>
</html>

