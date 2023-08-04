<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIP | Login</title>
    <link rel="shortcut icon" href="<?= base_url(); ?>sip.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url('adminlte/'); ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('adminlte/'); ?>bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url('adminlte/'); ?>bower_components/Ionicons/css/ionicons.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url('adminlte/'); ?>plugins/iCheck/square/blue.css">

    <!-- Bootstrap 3.3.7 -->
    <script srv="<?= base_url('adminlte/'); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- jQuery 3 -->
    <script srv="<?= base_url('adminlte/'); ?>bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('adminlte/'); ?>dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <script srv="<?= base_url('adminlte/'); ?>plugins/iCheck/icheck.min.js"></script>
    <!--Sweetalert Plugin --->
    <script srv="<?= base_url('adminlte/'); ?>bower_components/sweetalert/sweetalert.js"></script>


    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <b>Sistem Informasi</b> Penjualan
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <h4 class="login-box-msg">Silahkan Login</h4>

            <form action="login" method="post">
                <?php csrf_field(); ?>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Username" name="username" required autofocus>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="text-muted text-center btn-block btn btn-primary btn-rect" name="btn_login">Log In</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->



</body>
<!-- Sweet Alert 2 -->
<script src="<?= base_url('adminlte/'); ?>plugins/sweetalert2/sweetalert2.all.min.js"></script>
<!-- jQuery 3 -->
<script src="<?= base_url('adminlte/'); ?>bower_components/jquery/dist/jquery.min.js"></script>


<script>
    $(function() {
        <?php
        $pesan = session()->getFlashdata('error');
        // $pesan = "Login Gagal";
        if (!empty($pesan)) {
            $msgbox = 'Swal.fire(
                        "' . $pesan . '",
                        "",
                        "error"
                    )';
            echo $msgbox;
        }
        ?>
    });
</script>

</html>