<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Admin </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Menu Home -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin'); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Home</span>
            </a>
        </li>
        <hr class="sidebar-divider my-0">

        <!-- Menu Produk -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/produk'); ?>">
                <i class="fas fa-fw fa-list"></i>
                <span>Produk</span>
            </a>
        </li>
        <hr class="sidebar-divider my-0">

        <!-- Menu Pembelian -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/pembelian'); ?>">
                <i class="fas fa-fw fa-money-check"></i>
                <span>Pembelian</span>
            </a>
        </li>
        <hr class="sidebar-divider my-0">

        <!-- Menu Laporan -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/laporan'); ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Laporan</span>
            </a>
        </li>
        <hr class="sidebar-divider my-0">

        <!-- Menu Pelanggan -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/pelanggan'); ?>">
                <i class="fas fa-fw fa-user"></i>
                <span>Pelanggan</span>
            </a>
        </li>
        <hr class="sidebar-divider my-0">

        <!-- Menu Logout -->
        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>LogOut</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->