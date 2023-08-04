<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="<?= base_url(); ?>sip.png" />
    <title>SIP | <?= $title; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Sweet Alert 2 -->
    <link rel="stylesheet" href="<?= base_url('adminlte/'); ?>plugins/sweetalert2/sweetalert2.min.css">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url('adminlte/'); ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('adminlte/'); ?>bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url('adminlte/'); ?>bower_components/Ionicons/css/ionicons.min.css">

    <!-- DataTables -->
    <link rel="stylesheet"
        href="<?= base_url('adminlte/'); ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url('adminlte/'); ?>bower_components/select2/dist/css/select2.min.css">
    <!-- Date Picker -->
    <link rel="stylesheet"
        href="<?= base_url('adminlte/'); ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet"
        href="<?= base_url('adminlte/'); ?>bower_components/bootstrap-daterangepicker/daterangepicker.css">

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('adminlte/'); ?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url('adminlte/'); ?>dist/css/skins/_all-skins.min.css">

    <!-- SCRIP -->
    <!-- jQuery 3
    <script src="<?= base_url('adminlte/'); ?>bower_components/jquery/dist/jquery.min.js"></script> -->
    <!-- jQuery 3.6.4 -->
    <script src="<?= base_url('adminlte/'); ?>bower_components/jquery/dist/jquery_3.6.4.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url('adminlte/'); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="<?= base_url('adminlte/'); ?>bower_components/select2/dist/js/select2.full.min.js"></script>
    <!-- Sweet Alert 2 -->
    <script src="<?= base_url('adminlte/'); ?>plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <!-- DataTables -->
    <script src="<?= base_url('adminlte/'); ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('adminlte/'); ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js">
    </script>

    <!-- daterangepicker -->
    <script src="<?= base_url('adminlte/'); ?>bower_components/moment/min/moment.min.js"></script>
    <script src="<?= base_url('adminlte/'); ?>bower_components/bootstrap-daterangepicker/daterangepicker.js">
    </script>
    <!-- datepicker -->
    <script
        src="<?= base_url('adminlte/'); ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js">
    </script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('adminlte/'); ?>dist/js/adminlte.min.js"></script>
    <!-- untuk format angka -->
    <?= view('layouts/partials/formating'); ?>
</head>

<body
    class="hold-transition skin-blue sidebar-mini <?php if ($menu1 != '000100' and $menu1 != '010000') echo 'sidebar-collapse' ?>">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="/" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>SI</b>P</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>SI</b> Penjualan</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <?= view('layouts/partials/navbar'); ?>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <?= view('layouts/partials/sidebar'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1><?= $title; ?></h1>
                <ol class="breadcrumb">
                    <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
                    <?= $breadcrumb; ?>

                </ol>
            </section>

            <!-- Main content -->
            <div class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <?= view($content); ?>
                    </div>
                </div>
            </div>
        </div> <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.18
            </div>
            <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
            reserved.
        </footer>

    </div>
    <!-- ./wrapper -->


</body>
<script>
$(document).ready(function() {
    $("#<?= $menu1; ?>").attr("class", "treeview menu-open active");
    $("#<?= $menu2; ?>").attr("class", "active");
});

function previewimg() {
    const foto = document.querySelector('#foto');
    const fotolabel = document.querySelector('.custom-file-label');
    const imgpreview = document.querySelector('.img-preview');

    fotolabel.textContent = foto.files[0].name;
    const filefoto = new FileReader();
    filefoto.readAsDataURL(foto.files[0]);
    filefoto.onload = function(e) {
        imgpreview.src = e.target.result;
    }

}
$(function() {
    $('#table').DataTable();
    $('.select2').select2();
    //Date picker
    $('#datepicker').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
    })

    <?php
        $pesan = session()->getFlashdata('pesan');
        // echo $pesan;
        if (!empty($pesan)) {
            $msgbox = 'Swal.fire(
                        "' . $pesan . '",
                        "",
                        "success"
                    )';
            echo $msgbox;
        }
        $error = session()->getFlashdata('error');
        if (!empty($error)) {
            $msgbox = 'Swal.fire(
                        "' . $error . '",
                        "",
                        "error"
                    )';
            echo $msgbox;
        }
        ?>
});

$('.tombol-hapus').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href');
    const value = $(this).attr('value');
    Swal.fire({
        title: 'Hapus Data',
        text: "Apakah yakin mau menghapus data " + value + "?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus',
        cancelButtonText: 'Batal',
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = href;
        }
    })
});
$('#keluar').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href');
    Swal.fire({
        title: 'Keluar Sistem',
        text: "Apakah yakin mau keluar dari sistem ???",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal',
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = href;
        }
    })

    function formatAngka(angka) {
        if (typeof(angka) != 'string') angka = angka.toString();
        var reg = new RegExp('([0-9]+)([0-9]{3})');
        while (reg.test(angka)) angka = angka.replace(reg, '$1.$2');
        return angka;
    }

    $('.input-rupiah').on('keypress', function(e) {
        var c = e.keyCode || e.charCode;
        switch (c) {
            case 8:
            case 9:
            case 27:
            case 13:
                return;
            case 65:
                if (e.ctrlKey === true) return;
        }
        if (c < 48 || c > 57) e.preventDefault();
    }).on('keyup', function() {
        var inp = $(this).val().replace(/\./g, '');
        $(this).val(formatAngka(inp));
    });
});

function formatAngka(angka) {
    if (typeof(angka) != 'string') angka = angka.toString();
    var reg = new RegExp('([0-9]+)([0-9]{3})');
    while (reg.test(angka)) angka = angka.replace(reg, '$1.$2');
    return angka;
}

$('.input-rupiah').on('keypress', function(e) {
    var c = e.keyCode || e.charCode;
    switch (c) {
        case 8:
        case 9:
        case 27:
        case 13:
            return;
        case 65:
            if (e.ctrlKey === true) return;
    }
    if (c < 48 || c > 57) e.preventDefault();
}).on('keyup', function() {
    var inp = $(this).val().replace(/\./g, '');
    $(this).val(formatAngka(inp));
});

function popupCenter(url, title, w, h) {
    const dualScreenLeft = window.screenLeft !== undefined ? window.screenLeft : window.screenX;
    const dualScreenTop = window.screenTop !== undefined ? window.screenTop : window.screenY;

    const width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document
        .documentElement.clientWidth : screen.width;
    const height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document
        .documentElement.clientHeight : screen.height;

    const systemZoom = width / window.screen.availWidth;
    const left = (width - w) / 2 / systemZoom + dualScreenLeft
    const top = (height - h) / 2 / systemZoom + dualScreenTop
    const newWindow = window.open(url, title,
        `
            scrollbars=yes,
            width     =${w / systemZoom}, 
            height    =${h / systemZoom}, 
            top       =${top}, 
            left      =${left}
            `
    )

    if (window.focus) newWindow.focus();
}
</script>

</html>