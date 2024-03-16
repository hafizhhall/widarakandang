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
<div class="row mb-4">
    <div class="blog col-12 text-center">
        <h2>Blog Widarakandang</h2>
    </div>
</div>
@include('partials.navnews')
<link rel="stylesheet" href="/css/home.css">
<div class="row row-cols-md-3 row-cols-2">
    @foreach ($artikel as $artikels)
    <div class="col mb-4">
        <a href="dartikel/{{ $artikels->id }}" class="no-underline">
      <div class="card p-2">
        <img src="/img/{{ $artikels["gambar"] }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h4 class="card-title">{{ $artikels->title }}</h4>
          <p class="card-text">{{ $artikels->minibody }}</p>
          <div class="d-flex justify-content-between align-items-center">
            <p class="tgl"><small class="text-muted">{{ $artikels->published_at }}</small></p>
          </div>
        </div>
      </div>
    </a>
    </div>
    @endforeach
  </div>
  <div class="text-center">
    <a href="#">Lihat Lebih Banyak</a>
  </div>
{{-- new kegiatan --}}

{{-- Service --}}
<section class="layanan">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>
                    Layanan Kami
                </h2>
            </div>
        </div>
    </div>
</section>
@endsection
