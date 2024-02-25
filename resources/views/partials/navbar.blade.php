<nav class="navbar navbar-expand-lg navbar-dark ">
    <div class="container">
      <img src="/img/logo.png" alt="" width="150" class="mr-3">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Artikel") ? 'active': '' }}" href="/">Artikel</a>
          </li>
          <li class="nav-item">
            <a class="nav-link  {{ ($title === "Katalog") ? 'active': '' }}" href="/katalog">Katalog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "About") ? 'active': '' }}" href="/about">About</a>
          </li>
        </ul>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item nv-hoverArea">
                <a href="" class="nav-link active" style=""><b>Masuk</b></a>
            </li>
            <li class="nav-item">
                <b class="nav-link active">|</b>
            </li>
            <li class="nav-item nv-hoverArea">
                <a href="" class="nav-link active"><b>Daftar</b></a>
            </li>
        </ul>
      </div>
    </div>
  </nav>
