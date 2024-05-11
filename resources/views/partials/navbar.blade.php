<nav class="navbar navbar-expand-lg navbar-dark">
<link rel="stylesheet" href="/css/responsive.css">
    <div class="container">
      <a href="#" class="navbar-brand">
        <img src="/img/logo.png" alt="" width="150" class="d-inline-block align-text-top me-3">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item mx-2">
            <a class="nav-link {{ ($title === "Home") ? 'active': '' }}" href="/">Home</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link  {{ ($title === "Katalog") ? 'active': '' }}" href="/katalog">Katalog</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link {{ ($title === "About") ? 'active': '' }}" href="/about">Layanan</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link {{ ($title === "About") ? 'active': '' }}" href="/about">Tentang</a>
          </li>
        </ul>

        @auth
        <ul class="navbar-nav">
        <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Hi, {{ auth()->user()->name }}</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item">
                        <i class="material-symbols-outlined">Logout</i>
                    </button>
                </form>
                </li>
            </ul>
          </li>
        </ul>
            @else
            <div><a href="/daftar" class="nav-link"><button class="button-secondary">Daftar</button></a></div>
            <div>
            <a href="/login" class="nav-link {{ ($title === "login") ? 'active': '' }}"><button class="button-primary">Masuk</button></a>
            </div>
        @endauth
      </div>
    </div>
  </nav>
