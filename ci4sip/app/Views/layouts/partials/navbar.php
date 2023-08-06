<!-- Header Navbar -->
<nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <li>
                <a href="#"><?= session()->get('sip_instansi_name'); ?></a>
            </li>
            <li class="user-menu"><a href="<?= base_url()."login/dologout"; ?>" id="keluar" class="btn btn-flat"><i class="fa fa-sign-out"></i>
                    Keluar</a></li>
        </ul>
    </div>
</nav>