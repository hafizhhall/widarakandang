<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <img src="/img/logo.png" alt="" width="150" class="mr-3">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Home") ? 'active': '' }}" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link  {{ ($title === "Katalog") ? 'active': '' }}" href="/katalog">Katalog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "About") ? 'active': '' }}" href="/about">About</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
