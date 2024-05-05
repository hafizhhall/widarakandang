@extends('layouts.main')

@section('carousel')
<div id="hero-carousel">
    <div class="carousel-inner">
      <div class="carousel-item active c-item">
        <img src="/img/1.jpg" class="d-block w-100 c-img" alt="Slide1">
        <div class="carousel-caption top-0 mt-5 d-none d-md-block ">
            <p class="mt-5 fs-3 text-uppercase">Selamat Datang di</p>
            <h1 class="display-1 fw-border text-capitalize"><b>ANGGREK WIDARAKANDANG</b></h1>
            <a href="/katalog" class="no-underline"><button class="btn btn-primary px-4 py-2 fs-5 mt-5">Lihat Anggrek</button></a>

        </div>
      </div>
    </div>
</div>
@endsection

{{-- konten --}}
@section('container')
<div class="row mb-4" id="blog">
    <div class="blog col-12 text-center">
        <h1 class="text-center fw-bold display-3">Blog <span class="text-primary">Widarakandang</span></h1>
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
            <div class="col-6">
                <span class="material-symbols-outlined">calendar_month</span>
            </div>
            <div class="col-6">
                <p class="tgl" style="text-align: right"><small class="text-muted">{{ $artikels->tanggal }}</small></p>
            </div>
          </div>
        </div>
      </div>
    </a>
    </div>
    @endforeach
</div>
  {{-- next page --}}
  <div class="row">
    {{ $artikel->links() }}
  </div>
{{-- new kegiatan --}}

{{-- Service --}}
<div class="container-fluid my-5">
    <h1 class="text-center fw-bold display-3">Layanan <span class="text-primary">Kami</span></h1>
    <div class="row">
        <div class="owl-carousel owl-theme">
            {{-- @foreach ($jenis as $j) --}}
            <div class="item mt-4 mb-2">
                <div class="card border-0">
                    <img src="/img/pot.jpg" alt="" class="card-img-top">
                    <div class="card-body">
                        <h4>Flower Arrangement</h4>
                    </div>
                    <div class="card-body">
                        <p>jdhweifhefewuieuicdsfieig efeuib ciusjdkskf </p>
                    </div>
                </div>
            </div>
            <div class="item mt-4">
                <div class="card border-0">
                    <img src="/img/pot.jpg" alt="" class="card-img-top">
                    <div class="card-body">
                        <h4>Gift</h4>
                    </div>
                    <div class="card-body">
                        <p>jdhweifhefewuieuicdsfieig efeuib ciusjdkskf </p>
                    </div>
                </div>
            </div>
            <div class="item mt-4">
                <div class="card border-0">
                    <img src="/img/bersama.jpg" alt="" class="card-img-top">
                    <div class="card-body">
                        <h4>Pot Plant</h4>
                    </div>
                    <div class="card-body">
                        <p>jdhweifhefewuieuicdsfieig efeuib ciusjdkskf </p>
                    </div>
                </div>
            </div>
            <div class="item mt-4">
                <div class="card border-0">
                    <img src="/img/lab.jpg" alt="" class="card-img-top">
                    <div class="card-body">
                        <h4>Rental</h4>
                    </div>
                    <div class="card-body">
                        <p>jdhweifhefewuieuicdsfieig efeuib ciusjdkskf </p>
                    </div>
                </div>
            </div>
            <div class="item mt-4">
                <div class="card border-0">
                    <img src="/img/3.jpg" alt="" class="card-img-top">
                    <div class="card-body">
                        <h4>Nutrition</h4>
                    </div>
                    <div class="card-body">
                        <p>jdhweifhefewuieuicdsfieig efeuib ciusjdkskf </p>
                    </div>
                </div>
            </div>
            <div class="item mt-4">
                <div class="card border-0">
                    <img src="/img/2.jpg" alt="" class="card-img-top">
                    <div class="card-body">
                        <h4>Education</h4>
                    </div>
                    <div class="card-body">
                        <p>jdhweifhefewuieuicdsfieig efeuib ciusjdkskf </p>
                    </div>
                </div>
            </div>
            <div class="item mt-4">
                <div class="card border-0">
                    <img src="/img/1.jpg" alt="" class="card-img-top">
                    <div class="card-body">
                        <h4>Training</h4>
                    </div>
                    <div class="card-body">
                        <p>jdhweifhefewuieuicdsfieig efeuib ciusjdkskf </p>
                    </div>
                </div>
            </div>
            {{-- @endforeach --}}
        </div>
    </div>
</div>
@endsection
