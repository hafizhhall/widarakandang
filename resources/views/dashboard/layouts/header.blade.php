<header class="header-navbar fixed">
    <div class="header-wrapper">
        <div class="header-left">
            <div class="sidebar-toggle action-toggle"><i class="fas fa-bars"></i></div>
        </div>
        <div class="header-content">
            <div class="theme-switch-icon"></div>

            <div class="dropdown dropdown-menu-end">
                <a href="#" class="user-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="label">
                        <span></span>
                        <div>Admin</div>
                    </div>
                    <img class="img-user" src="{{ asset('') }}assets/images/avatar1.png" alt="user"srcset="">
                </a>
                <ul class="dropdown-menu small">
                    <!-- <li class="menu-header">
                        <a class="dropdown-item" href="#">Notifikasi</a>
                    </li> -->
                    <li class="menu-content ps-menu">
                        <a href="#">
                            <div class="description">
                                <i class="ti-user"></i> Profile
                            </div>
                        </a>
                        <a href="#">
                            <div class="description">
                                <i class="ti-settings"></i> Setting
                            </div>
                        </a>
                        <a href="#">
                            <div class="description">
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="link" style="border: none; background: none">
                                        <i class="ti-power-off"></i> Logout
                                    </button>
                                </form>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</header>
