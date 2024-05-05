
@extends('layouts.main')

@section('container')
<link rel="stylesheet" href="/css/home.css">
    {{-- @foreach ($katalog_anggrek as $katalogs)
    <article class="mb-5">
        <h2>
            <a href="/katalog/{{ $katalogs->slug }}">{{ $katalogs->title }}</a>
        </h2>
        <h5>{{ $katalogs->jenis->name }}</h5>
        <h6>{{ $katalogs->harga }}</h6>
        <p>{{ $katalogs->excerpt }}</p>
    </article>
    @endforeach --}}
{{-- Simulasi Card --}}
<div class="container-fluid my-5">
    <h1 class="text-center fw-bold display-1">Anggrek <span class="text-primary">{{ $jenis }}</span></h1>
</div>
{{-- card --}}
<div class="row row-cols-md-3 row-cols-2 mt-5">
    @foreach ($katalog as $k)
        <div class="col mb-4">
            <a href="/katalog/{{ $k->slug }}" class="no-underline">
            <div class="card">
                <img src="/img/{{ $k["gambar"] }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h4 class="card-title">{{ $k->title }}</h4>
                    <p class="card-text">{{ $k->excerpt }}</p>
                </div>
                <div class="mb-2 d-flex justify-content-around card-body">
                    <h3>Rp{{ number_format($k->harga,0,',','.') }}</h3>
                    <button class="btn btn-primary px-5">Beli</button>
                </div>
            </a>
            </div>
        </div>
        @endforeach
</div>
<div class="row justify-content-start">
    {{-- <div class="col-1">
        <button type="button" class="btn btn-primary ">

        </button>
    </div>
    <div class="col-1">
        <button type="button" class="btn btn-primary">Kembali</button>
    </div> --}}
    <p class="d-inline-flex gap-1">
        <a href="/katalog" class="btn btn-primary material-symbols-outlined" role="button">arrow_back</a>
        <a href="/katalog" class="btn btn-primary" role="button" >kembali</a>
      </p>
</div>
@endsection

