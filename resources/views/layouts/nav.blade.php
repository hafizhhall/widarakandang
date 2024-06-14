<div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
    <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
        <div class="col-lg-6 px-5 text-start">
            <small><i class="fa fa-map-marker-alt me-2"></i>Jl.Hibrida, Umbulharjo, Yogyakarta</small>
            <small class="ms-4"><i class="fa fa-envelope me-2"></i>widarakandang@gamil.com</small>
        </div>
        <div class="col-lg-6 px-5 text-end">
            <small>Follow us:</small>
            <a class="text-body ms-3" href=""><i class="fab fa-facebook-f"></i></a>
            <a class="text-body ms-3" href=""><i class="fab fa-whatsapp"></i></a>
            <a class="text-body ms-3" href=""><i class="fab fa-instagram"></i></a>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="/" class="navbar-brand ms-4 ms-lg-0">
            <h2 class="fw-bold text-primary m-0">WidaraKandang</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="/" class="nav-item nav-link active">Home</a>
                <a href="/blog" class="nav-item nav-link">Blog</a>
                <a href="/katalog" class="nav-item nav-link">Katalog</a>
                <a href="#footer" class="nav-item nav-link">Contact Us</a>
            </div>
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <div class="dropdown">
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <small class="fa fa-user text-body"></small>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg-end">
                        @can('pengelola')
                        <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                        <li><hr class="dropdown-divider"></li>
                        @endcan
                        @can('pelanggan')
                        <li><a class="dropdown-item" href="/order">Order</a></li>
                        <li><a class="dropdown-item" href="/user">My Account</a></li>
                        <li><hr class="dropdown-divider"></li>
                        @endcan
                        @auth
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item bg-danger" style="border: none; background: none">
                                <i class="ti-power-off"></i> Logout
                            </button>
                        </form>
                        @else
                        <li><a class="dropdown-item" href="/login">login</a></li>
                        <li><a class="dropdown-item" href="/register">register</a></li>
                        @endauth
                    </ul>
                </div>
                @can('pelanggan')
                <a class="btn-sm-square bg-white rounded-circle ms-3 position-relative me-4 my-auto" href="/chart">
                    <small class="fa fa-shopping-bag"></small>
                    <span class="position-absolute bg-danger rounded-circle d-flex align-items-center justify-content-center text-white px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;">{{ $charts->count() }}</span>
                </a>
                @endcan
            </div>
        </div>
    </nav>
</div>
