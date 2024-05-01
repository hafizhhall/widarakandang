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
<div class="row mb-4" id="blog">
    <div class="blog col-12 text-center">
        <h2>Blog Widarakandang</h2>
    </div>
</div>
<div class="navnews mb-4">
    <ul class="nav nav-tabs">
        @foreach ($kategori as $k)
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('artikel.kategori', $k->slug ) }}#blog">{{ $k->nama }}</a>
        </li>
        @endforeach
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/#blog">Semua</a>
        </li>
    </ul>
</div>
<link rel="stylesheet" href="/css/home.css">
<div class="row row-cols-md-3 row-cols-2">
    @foreach ($artikel as $artikels)
    <div class="col mb-4">
        <a href="dartikel/{{ $artikels->slug }}" class="no-underline">
      <div class="card p-2">
        <img src="/img/{{ $artikels["gambar"] }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h4 class="card-title">{{ $artikels->title }}</h4>
          <p class="card-text">{{ $artikels->minibody }}</p>
          <div class="row">
            <div class="col-4 align-content-end"> <img style="margin-right: 10px;" src="/img/cal.png" alt=""></div>
            <div class="col-8 "><p class="tgl" style="text-align: right; margin-left: -10px"><small class="text-muted">{{ $artikels->tanggal }}</small></p></div>
          </div>
        </div>
      </div>
    </a>
    </div>
    @endforeach
  </div>
  {{-- next page --}}
  <div class="row">
    <div class="col-8"></div>
    <div class="col-4">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
              <li class="page-item disabled">
                <a class="page-link">Previous</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">Next</a>
              </li>
            </ul>
          </nav>
    </div>
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
