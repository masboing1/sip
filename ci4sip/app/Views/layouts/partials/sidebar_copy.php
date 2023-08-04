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
            <li class="<?php if ($menu1 == '000100') echo "active"; ?>">
                <a href="/"><i class="fa fa-home"></i><span>Home</span></a>
            </li>
            <?php if ($sip_level == 'administrator') { ?>
                <li class="treeview <?php if ($menu1 == '010000') echo "menu-open active"; ?>">
                    <a href="#"><i class="fa fa-windows"></i><span>Data Master</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php if ($menu2 == '010100') echo "active"; ?>">
                            <a href="/instansi"><i class="fa fa-bank"></i>Instansi</a>
                        </li>
                        <li class="<?php if ($menu2 == '010200') echo "active"; ?>">
                            <a href="/user"><i class="fa fa-users"></i>User</a>
                        </li>
                        <li class="<?php if ($menu2 == '010300') echo "active"; ?>">
                            <a href="/level"><i class="fa fa-balance-scale"></i>Level</a>
                        </li>
                    </ul>
                </li>
            <?php } ?>
            <?php if ($sip_level == 'administrator' or $sip_level == 'manajer') { ?>
                <li class="treeview <?php if ($menu1 == '020000') echo "menu-open active"; ?>">
                    <a href="#"><i class="fa fa-bookmark"></i><span>Referensi</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php if ($menu2 == '020100') echo "active"; ?>">
                            <a href="/satuan"><i class="fa fa-circle-o"></i>Satuan</a>
                        </li>
                        <li class="<?php if ($menu2 == '020200') echo "active"; ?>">
                            <a href="/kategori"><i class="fa fa-circle-o"></i>Kategori</a>
                        </li>
                        <li class="<?php if ($menu2 == '020300') echo "active"; ?>">
                            <a href="/jenisoperasional"><i class="fa fa-circle-o"></i>Jenis
                                Operasional</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview <?php if ($menu1 == '030000') echo "menu-open active"; ?>">
                    <a href="#"><i class="fa fa-folder"></i><span>Data</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php if ($menu2 == '030100') echo "active"; ?>">
                            <a href="/barang"><i class="fa fa-cubes"></i>Barang</a>
                        </li>
                        <li class="<?php if ($menu2 == '030200') echo "active"; ?>">
                            <a href="/pelanggan"><i class="fa fa-smile-o"></i>Pelanggan</a>
                        </li>
                        <li class="<?php if ($menu2 == '030300') echo "active"; ?>">
                            <a href="/suplier"><i class="fa fa-support"></i>Suplier</a>
                        </li>
                    </ul>
                </li>
            <?php } ?>
            <li class="treeview <?php if ($menu1 == '040000') echo "menu-open active"; ?>">
                <a href="#"><i class="fa fa-shopping-cart"></i><span>Transaksi</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if ($menu2 == '040100') echo "active"; ?>">
                        <a href="/pembelian"><i class="fa fa-archive"></i>Pembelian</a>
                    </li>
                    <li class="<?php if ($menu2 == '040200') echo "active"; ?>">
                        <a href="/pembelianlist"><i class="fa fa-archive"></i>List Pembelian</a>
                    </li>
                    <li class="<?php if ($menu2 == '040300') echo "active"; ?>">
                        <a href="/penjualan"><i class="fa fa-cart-plus"></i>Penjualan</a>
                    </li>
                    <li class="<?php if ($menu2 == '040400') echo "active"; ?>">
                        <a href="penjualanlist"><i class="fa fa-cart-plus"></i>List Penjualan</a>
                    </li>
                    <li class="<?php if ($menu2 == '040500') echo "active"; ?>">
                        <a href="/returpenjualan"><i class="fa fa-exchange"></i>Retur Penjualan</a>
                    </li>
                    <li class="<?php if ($menu2 == '040600') echo "active"; ?>">
                        <a href="/operasional"><i class="fa fa-book"></i>Operasional</a>
                    </li>
                </ul>
            </li>
            <li class="treeview <?php if ($menu1 == '050000') echo "menu-open active"; ?>">
                <a href="#"><i class="fa fa-file"></i><span>Laporan</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if ($menu2 == '050100') echo "active"; ?>">
                        <a href="/laporan/pembelian"><i class="fa fa-archive"></i>Pembelian</a>
                    </li>
                    <li class="<?php if ($menu2 == '050200') echo "active"; ?>">
                        <a href="/laporan/penjualan"><i class="fa fa-cart-plus"></i>Penjualan</a>
                    </li>
                    <li class="<?php if ($menu2 == '050300') echo "active"; ?>">
                        <a href="/laporan/labarugi"><i class="fa fa-money"></i>Laba Rugi</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>