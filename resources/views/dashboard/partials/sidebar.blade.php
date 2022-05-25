<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
                            <span data-feather="home" class="align-text-bottom"></span>
                            <i class="fa-solid fa-gauge"></i> Dashboard
                        </a>
                    </li>
                    @can('melihat-catatan-transaksi')
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('catatan_transaksi') ? 'active' : '' }}" href="/catatan_transaksi">
                            <i class="fa-solid fa-credit-card"></i> Catatan Transaksi
                        </a>
                    </li>
                    @endcan
                    @can('mengelola-menu')
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('menu*') ? 'active' : '' }}" href="/menu">
                            <i class="fa-solid fa-bars"></i> Menu
                        </a>
                    </li>
                    @endcan
                    @can('melihat-laporan-pendapatan')
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('laporan_pendapatan') ? 'active' : '' }}" href="/laporan_pendapatan">
                            <i class="fa-solid fa-flag"></i> Laporan Pendapatan
                        </a>
                    </li>
                    @endcan
                    @can('mengelola-user')
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('user*') ? 'active' : '' }}" href="/user">
                            <i class="fa-solid fa-users"></i> Users
                        </a>
                    </li>
                    @endcan
                    @can('melihat-log-aktivitas-pegawai')
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('log_aktivitas') ? 'active' : '' }}" href="/log_aktivitas">
                            <i class="fa-solid fa-chart-line"></i> Log Aktivitas Pegawai
                        </a>
                    </li>
                    @endcan
                </ul>
  
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                    <span>Profile</span>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('profile') ? 'active' : '' }}" href="/profile">
                            <i class="fa-solid fa-user"></i> My Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('edit_profile') ? 'active' : '' }}" href="/edit_profile">
                            <span data-feather="file-text" class="align-text-bottom"></span>
                            <i class="fa-solid fa-user-pen"></i> Edit Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/reset_password') ? 'active' : '' }}" href="/reset_password">
                            <i class="fa-solid fa-key"></i> Reset Password
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>