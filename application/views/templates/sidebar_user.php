<!-- Sidebar -->
<ul class="navbar-nav bg-gray-800 sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index">
        <div class="sidebar-brand-icon">
            <i class="fas fa-university"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SITAPERA</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('user/index'); ?>">
            <i class="fas fa-fw fas fa-home"></i>
            <span>Beranda</span></a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        <?php echo $user['level']; ?>
    </div>

    <li class="nav-item">

    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw far fa-envelope"></i>
                    <span>Daftar Permintaan</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo base_url('user/permintaan_terkirim'); ?>">Permintaan Terkirim</a>
                        <a class="collapse-item" href="<?php echo base_url('user/permintaan_selesai'); ?>">Permintaan Selesai</a>
                    </div>
                </div>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('user/permintaan'); ?>">
            <i class="fas fa-fw fas fa-home"></i>
            <span>Permintaan</span></a>
    </li>


    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        END
    </div>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('auth/logout'); ?>" id="tombol-logout">
            <i class="fas fa-fw fa-sign-out-alt text-danger"></i>
            <span>Logout</span></a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->