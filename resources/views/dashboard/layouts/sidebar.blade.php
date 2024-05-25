<nav class="main-sidebar ps-menu">
    <!-- <div class="sidebar-toggle action-toggle">
        <a href="#">
            <i class="fas fa-bars"></i>
        </a>
    </div> -->
    <!-- <div class="sidebar-opener action-toggle">
        <a href="#">
            <i class="ti-angle-right"></i>
        </a>
    </div> -->
    <div class="sidebar-header">
        <div class="ms-4"><img src="/img/logoHitam.png" alt="" width="150" class=""></div>
        <div class="close-sidebar action-toggle">
            <i class="ti-close"></i>
        </div>
    </div>
    <div class="sidebar-content">
        <ul>
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                <a href="/dashboard" class="link">
                    <i class="ti-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="menu-category">
                <span class="text-uppercase">Data Master Anggrek</span>
            </li>
            <li class="">
                <a href="#" class="main-menu has-dropdown">
                    <i class="ti-desktop"></i>
                    <span>Master</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="/dashboard/katalog" class="link"><span>Katalog Anggrek</span></a></li>
                    <li><a href="/dashboard/jenis" class="link"><span>Kategori Anggrek</span></a></li>
                    <li><a href="/dashboard/supplier" class="link"><span>Supplier</span></a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="main-menu has-dropdown">
                    <i class="ti-truck"></i>
                    <span>Supply</span>
                </a>
                <ul class="sub-menu ">
                    <li><a href="/dashboard/entry" class="link">
                            <span>Anggrek Masuk</span></a>
                    </li>
                    <li><a href="/dashboard/output" class="link">
                            <span>Anggrek Keluar</span></a>
                    </li>
                </ul>
            </li>
            <li class="menu-category">
                <span class="text-uppercase">Penjualan</span>
            </li>
            <li class="">
                <a href="#" class="main-menu has-dropdown">
                    <i class="ti-desktop"></i>
                    <span>Master</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="/dashboard/katalog" class="link"><span>Katalog Anggrek</span></a></li>
                    <li><a href="/dashboard/jenis" class="link"><span>Kategori Anggrek</span></a></li>
                    <li><a href="/dashboard/supplier" class="link"><span>Supplier</span></a></li>
                </ul>
            </li>
            <li class="menu-category">
                <span class="text-uppercase">Blog Master</span>
            </li>
            <li>
                <a href="/dashboard/artikel" class="link">
                    <i class="ti-agenda"></i>
                    <span>Artiekl</span>
                </a>
            </li>
            @can('admin')
            <li>
                <a href="/dashboard/kategori" class="link">
                    <i class="ti-archive"></i>
                    <span>Kategori Artikel</span>
                </a>
            </li>
            @endcan

            <li class="menu-category">
                <span class="text-uppercase">Kelola Akun</span>
            </li>
            <li>
                <a href="charts.html" class="link">
                    <i class="ti-bar-chart"></i>
                    <span>Charts</span>
                </a>
            </li>
            <li>
                <a href="fullcalendar.html" class="link">
                    <i class="ti-calendar"></i>
                    <span>Calendar</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
