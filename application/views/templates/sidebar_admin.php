        <!-- Sidebar -->
        <ul class="navbar-nav bg-gray-800 sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-university"></i>
                </div>
                <div class="sidebar-brand-text mx-3">KelurahanKu</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('admin/index'); ?>">
                    <i class="fas fa-fw fas fa-home"></i>
                    <span>Beranda</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Administrator
            </div>

            <!-- Nav Item - Pages Collapse Menu -->

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/man_user'); ?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Master Pengguna</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/mst_unit'); ?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Master Unit Kerja</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/mst_petugas'); ?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Master Petugas</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/mst_kategori'); ?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Master Kategori</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/mst_sub_kategori'); ?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Master Sub Kategori</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-fw fa-copy"></i>
                    <span>Proses</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo base_url('admin/dokumen'); ?>">Dokumen</a>
                        <a class="collapse-item" href="<?php echo base_url('admin/data_warga'); ?>">Data Warga</a>
                    </div>
                </div>
    </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                    <i class="fas fa-fw far fa-flag"></i>
                    <span>History</span>
                </a>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo base_url('admin/history_dokumen'); ?>">Dokumen</a>
                    </div>
                </div>
            </li>
            <div class="sidebar-heading">
                Pengaturan
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                    <i class="fas fa-fw fas fa-cogs"></i>
                    <span>Pengaturan</span>
                </a>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo base_url('admin/profile_desa'); ?>">Profile Desa</a>
                        <a class="collapse-item" href="<?php echo base_url('admin/pesan'); ?>">Pesan</a>
                    </div>
                </div>
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

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->