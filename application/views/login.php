<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Sarpras <?= $title ? $title->nama_sekolah : '' ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login_v6/vendor/bootstrap/css/bootstrap.min.css') ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login_v6/fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login_v6/fonts/iconic/css/material-design-iconic-font.min.css') ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login_v6/vendor/animate/animate.css') ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login_v6/vendor/css-hamburgers/hamburgers.min.css') ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login_v6/vendor/animsition/css/animsition.min.css') ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login_v6/vendor/select2/select2.min.css') ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login_v6/vendor/daterangepicker/daterangepicker.css') ?>">
    <!--===============================================================================================-->

    <link rel="icon" href="<?= base_url('assets/img/logo.png') ?>" type="image/png">

    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login_v6/css/util.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login_v6/css/main.css') ?>">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-b-20">
                <form class="login100-form validate-form" method="POST" action="<?= base_url('auth/login_admin') ?>">
                    <span class="login100-form-avatar">
                        <img src="<?= base_url('assets/img/logo.png') ?>" alt="Logo Grisa">
                    </span>
                    <span class="login100-form-title p-t-20">
                        LOGIN ADMIN
                    </span>

                    <div class="m-b-50">
                        <div class="wrap-input100 validate-input m-t-45 m-b-35" data-validate="Masukan Username">
                            <input class="input100" type="text" name="username">
                            <span class="focus-input100" data-placeholder="Username"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Masukan password">
                            <input class="input100" type="password" name="password">
                            <span class="focus-input100" data-placeholder="Password"></span>
                        </div>

                    </div>

                    <div class="container-login100-form-btn mb-5">
                        <button class="login100-form-btn" type="submit">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!--===============================================================================================-->
    <script src="<?= base_url('assets/login_v6/vendor/jquery/jquery-3.2.1.min.js') ?>"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url('assets/login_v6/vendor/animsition/js/animsition.min.js') ?>"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url('assets/login_v6/vendor/bootstrap/js/popper.js') ?>"></script>
    <script src="<?= base_url('assets/login_v6/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url('assets/login_v6/vendor/select2/select2.min.js') ?>"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url('assets/login_v6/vendor/daterangepicker/moment.min.js') ?>"></script>
    <script src="<?= base_url('assets/login_v6/vendor/daterangepicker/daterangepicker.js') ?>"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url('assets/login_v6/vendor/countdowntime/countdowntime.js') ?>"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url('assets/login_v6/js/main.js') ?>"></script>

</body>

</html>