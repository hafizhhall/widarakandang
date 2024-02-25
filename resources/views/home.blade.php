@extends('layouts.main')

@section('carousel')
<div id="hero-carousel" class="carousel slide" data-bs-slide="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide1"></button>
      <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1" aria-label="Slide2"></button>
      <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="2" aria-label="Slide3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active c-item">
        <img src="/img/1.jpg" class="d-block w-100 c-img" alt="Slide1">
        <div class="carousel-caption top-0 mt-5 d-none d-md-block ">
            <p class="mt-5 fs-3 text-uppercase">Selamat Datang di</p>
            <h1 class="display-1 fw-border text-capitalize"><b>ANGGREK WIDARAKANDANG</b></h1>
            <button class="btn btn-primary px-4 py-2 fs-5 mt-5">Lihat Anggrek</button>
        </div>
      </div>
      <div class="carousel-item c-item">
        <img src="/img/2.jpg" class="d-block w-100 c-img" alt="Slide2">
        <div class="carousel-caption d-none d-md-block text-end">
          <h1 class="display-3">Sewa Anggrek</h1>
          <p class="mt-3 fs-4" style="font-size: 12pt">Anggrek Widarakandang Melayani jasa persewaan anggrek, jasa persewaan anggrek ini ditujukan untuk menghias sudut ruangan</p>
        </div>
      </div>
      <div class="carousel-item c-item">
        <img src="/img/3.jpg" class="d-block w-100 c-img" alt="Slide3">
        <div class="carousel-caption d-none d-md-block">
            <h5>3</h5>
          <p>Some representative placeholder content for the second slide.</p>
        </div>
      </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
</div>
@endsection



{{-- konten --}}
@section('container')
@include('partials.navnews')
<div class="row row-cols-md-3 row-cols-3">
    @foreach ($artikel as $artikels)
    <div class="col mb-4">
      <div class="card">
        <img src="/img/bersama.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{ $artikels["judul"] }}</h5>
          <p class="card-text">{{ $artikels["isi"] }}</p>
          <div class="d-flex justify-content-between align-items-center">
            <p class="tgl"><small class="text-muted">15 November 2023</small></p>
            <a href="#" class="btn btn-primary">Selengkapnya</a>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>

  <div class="text-center">
    <a href="#">Lihat Lebih Banyak</a>
  </div>
@endsection
