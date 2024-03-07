@extends('layouts.main')

@section('carousel')
<div id="hero-carousel">
    <div class="carousel-inner">
      <div class="carousel-item active c-item">
        <img src="/img/1.jpg" class="d-block w-100 c-img" alt="Slide1">
        <div class="carousel-caption top-0 mt-5 d-none d-md-block ">
            <p class="mt-5 fs-3 text-uppercase">Selamat Datang di</p>
            <h1 class="display-1 fw-border text-capitalize"><b>ANGGREK WIDARAKANDANG</b></h1>
            <button class="btn btn-primary px-4 py-2 fs-5 mt-5">Lihat Anggrek</button>
        </div>
      </div>
    </div>
</div>
@endsection

{{-- konten --}}
@section('container')
@include('partials.navnews')
<div class="row row-cols-md-3 row-cols-3">
    @foreach ($artikel as $artikels)
    <div class="col mb-4">
      <div class="card">
        <img src="/img/{{ $artikels["gambar"] }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{ $artikels->title }}</h5>
          <p class="card-text">{{ $artikels->minibody }}</p>
          <div class="d-flex justify-content-between align-items-center">
            <p class="tgl"><small class="text-muted">15 November 2023</small></p>
            <a href="dartikel/{{ $artikels->id }}" class="btn btn-primary">Selengkapnya</a>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <div class="text-center">
    <a href="#">Lihat Lebih Banyak</a>
  </div>
{{-- Service --}}
<section class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col text-center mb-0">
               <h1 class="display-3 font-weight-bolder">Pelayanan yang Tersedia</h1>
        <p class="lead">Anggrek Widarakandang Memiliki Beberapa Produk Layanan Seperti Berikut</p>
            </div>
          </div>
    </div>
<div class="service ">
    <div class="card__container">
        <article class="card__article">
            <img src="/img/bersama.jpg" alt="image" class="card__img">
            <div class="card__data">
                <span class="card__description">Poto Anggrek INI</span>
                    <h2 class="card_title">Sewa Anggrek</h2>
                    <a href="" class="card__button">Read More</a>
                </span>
            </div>
        </article>

        <article class="card__article">
            <img src="/img/bersama.jpg" alt="image" class="card__img">
            <div class="card__data">
                <span class="card__description">Poto Anggrek INI</span>
                    <h2 class="card_title">Pot Arrangment</h2>
                    <a href="" class="card__button">Read More</a>
                </span>
            </div>
        </article>

        <article class="card__article">
            <img src="/img/bersama.jpg" alt="image" class="card__img">
            <div class="card__data">
                <span class="card__description">Poto Anggrek INI</span>
                    <h2 class="card_title">Anggrek Nutrition</h2>
                    <a href="" class="card__button">Read More</a>
                </span>
            </div>
        </article>
    </div>
</div>
</section>
<section>
    <div class="service">
        <div class="card__container"><article class="card__article">
            <img src="/img/bersama.jpg" alt="image" class="card__img">
            <div class="card__data">
                <span class="card__description">Poto Anggrek INI</span>
                    <h2 class="card_title">Sewa Anggrek</h2>
                    <a href="" class="card__button">Read More</a>
                </span>
            </div>
        </article></div>
    </div>
</section>
@endsection
