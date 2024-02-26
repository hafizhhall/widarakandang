@extends('layouts.main')


@section('carousel')
@endsection

@section('container')
<div class="row row-cols-md-3 row-cols-3">
    @foreach ($prestasi as $p)
    <div class="col mb-4">
      <div class="card">
        <img src="/img/lab.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{ $p["judul"] }}</h5>
          <p class="card-text">{{ $p["isi"] }}</p>
          <div class="d-flex justify-content-between align-items-center">
            <p class="tgl"><small class="text-muted">15 November 2023</small></p>
            <a href="#" class="btn btn-primary">Selengkapnya</a>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
@include('partials.navnews')
@endsection
