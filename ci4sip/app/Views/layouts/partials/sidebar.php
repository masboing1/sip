<?php
$sip_username      = session()->get('sip_username');
$sip_name      = session()->get('sip_name');
$sip_level      = session()->get('sip_level');
$sip_foto      = session()->get('sip_foto');

?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= base_url('adminlte/'); ?>dist/img/<?= $sip_foto; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= $sip_name; ?> <a href="password" class="btn bg-purple btn-xs"><i class="fa fa-key"></i></a>
                </p>
                <a href="#"><i class="fa fa-circle text-success"></i> <?= $sip_level; ?></a>

            </div>
        </div>
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU</li>
            <!-- Optionally, you can add icons to the links -->
            <li id="000100">
                <a href="/"><i class="fa fa-home"></i><span>Home</span></a>
            </li>
            <?php $qmenu1 = db_connect()->query("SELECT tm_menu.*,tb_access.* FROM tb_access,tm_menu WHERE id = menu_id and level = '$sip_level' and group_menu = '0'");
            foreach ($qmenu1->getresultArray() as $rs1) { ?>
                <li class="treeview" id="<?= $rs1['id']; ?>">
                    <a href="#"><i class="<?= $rs1['icon']; ?>"></i><span><?= $rs1['menu']; ?></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php
                        $menuid = $rs1['id'];
                        $qmenu2 = db_connect()->query("SELECT tm_menu.*,tb_access.* FROM tb_access,tm_menu WHERE id = menu_id and level = '$sip_level' and group_menu = '$menuid'");
                        foreach ($qmenu2->getresultArray() as $rs2) { ?>
                            <li id="<?= $rs2['id']; ?>">
                                <a href="<?= $rs2['href']; ?>"><i class="<?= $rs2['icon']; ?>"></i><?= $rs2['menu']; ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>
            <!-- <li class="treeview" id="020000">
                <a href="#"><i class="fa fa-bookmark"></i><span>Referensi</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li id="020100">
                        <a href="/satuan"><i class="fa fa-circle-o"></i>Satuan</a>
                    </li>
                    <li id="020200">
                        <a href="/kategori"><i class="fa fa-circle-o"></i>Kategori</a>
                    </li>
                    <li id="020300">
                        <a href="/jenisoperasional"><i class="fa fa-circle-o"></i>Jenis
                            Operasional</a>
                    </li>
                </ul>
            </li>
            <li class="treeview" id="030000">
                <a href="#"><i class="fa fa-folder"></i><span>Data</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li id="030100">
                        <a href="/barang"><i class="fa fa-cubes"></i>Barang</a>
                    </li>
                    <li id="030200">
                        <a href="/pelanggan"><i class="fa fa-smile-o"></i>Pelanggan</a>
                    </li>
                    <li id="030300">
                        <a href="/suplier"><i class="fa fa-support"></i>Suplier</a>
                    </li>
                </ul>
            </li>
            <li class="treeview" id="040000">
                <a href="#"><i class="fa fa-shopping-cart"></i><span>Transaksi</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li id="040100">
                        <a href="/pembelian"><i class="fa fa-archive"></i>Pembelian</a>
                    </li>
                    <li id="040200">
                        <a href="/pembelianlist"><i class="fa fa-archive"></i>List Pembelian</a>
                    </li>
                    <li id="040300">
                        <a href="/penjualan"><i class="fa fa-cart-plus"></i>Penjualan</a>
                    </li>
                    <li id="040400">
                        <a href="penjualanlist"><i class="fa fa-cart-plus"></i>List Penjualan</a>
                    </li>
                    <li id="040500">
                        <a href="/returpenjualan"><i class="fa fa-exchange"></i>Retur Penjualan</a>
                    </li>
                    <li id="040600">
                        <a href="/operasional"><i class="fa fa-book"></i>Operasional</a>
                    </li>
                </ul>
            </li>
            <li class="treeview" id="050000">
                <a href="#"><i class="fa fa-file"></i><span>Laporan</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li id="050100">
                        <a href="/laporan/pembelian"><i class="fa fa-archive"></i>Pembelian</a>
                    </li>
                    <li id="050200">
                        <a href="/laporan/penjualan"><i class="fa fa-cart-plus"></i>Penjualan</a>
                    </li>
                    <li id="050300">
                        <a href="/laporan/labarugi"><i class="fa fa-money"></i>Laba Rugi</a>
                    </li>
                </ul>
            </li> -->
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>