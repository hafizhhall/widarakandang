<nav class="navbar navbar-expand-lg navbar-dark position-sticky">
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
        <div>
            <button class="button-secondary">Daftar</button>
            <button class="button-primary">Masuk</button>
        </div>
      </div>
    </div>
  </nav>
