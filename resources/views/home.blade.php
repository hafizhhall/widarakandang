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
<section id="service">
    <div class="container">
        <div class="row">
            <div class="col-9">
                <h2>
                    Flower Arrangement
                </h2>
            </div>
            <div class="col-3">
                <button class="button-service">Lihat Semua..
                    <img src="/img/arrow.png" alt="">
                </button>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card-fitur">
                        <img src="/img/3.jpg" alt="">
                        <div class="overlay">
                            <div>
                                <h5>Nanam Anggrek</h5>
                                <span>Pelayanan Nanam angrek</span>
                                <button>Lihat Layanan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
