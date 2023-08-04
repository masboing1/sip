<html lang="en" moznomarginboxes mozdisallowselectionprint>

<head>
    <title><?= $title; ?></title>
    <meta charset="utf-8">
    <link rel="icon" href="<?= base_url('sip.png'); ?>" type="image/x-icon" />
    <link rel="stylesheet" href="<?= base_url('adminlte/dist/css/laporan.css') ?>" />
    <?= view('layouts/partials/formating'); ?>
</head>

<body onload="window.print();" style="font-family:monospace; font-size: 12px;">
    <div id="laporan">
        <table border="0" align="center" style="width:900px; border:none;margin-top:5px;margin-bottom:0px;">
            <tr>
                <td style="text-align: center;">
                    <h3><?= $title . "<br>" . $instansi_name; ?></h3>
                    Periode : <?= TanggalIndoPanjang($tanggal1) . " - " . TanggalIndoPanjang($tanggal2); ?>
                </td>
            </tr>
        </table>
        <?= view($content); ?>
    </div>
</body>

</html>