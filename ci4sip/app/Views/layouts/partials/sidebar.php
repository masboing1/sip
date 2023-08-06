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
                <a href="<?= base_url();?>"><i class="fa fa-home"></i><span>Home</span></a>
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
                                <a href="<?= base_url().$rs2['href']; ?>"><i class="<?= $rs2['icon']; ?>"></i><?= $rs2['menu']; ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>
            
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>