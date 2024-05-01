
@extends('layouts.main')

@section('container')
<link rel="stylesheet" href="/css/home.css">
    @foreach ($katalog_anggrek as $katalogs)
    <article class="mb-5">
        <h2>
            <a href="/katalog/{{ $katalogs->slug }}">{{ $katalogs->title }}</a>
        </h2>
        <h5>{{ $katalogs->jenis->name }}</h5>
        <h6>{{ $katalogs->harga }}</h6>
        <p>{{ $katalogs->excerpt }}</p>
    </article>
    @endforeach
{{-- Simulasi Card --}}
<div class="container mb-1">
    <div class="row text-center">
        <div class="col">
            <p class="display-1" style="font-weight: bold; letter-spacing: -1px;">ANGGREK</p>
        </div>
    </div>
    <div class="row row-cols-6 text-center">
        <div class="col px-3"><h6>ALL</h6></div>
        <div class="col px-3"><h6>VANDA</h6></div>
        <div class="col px-3"><h6>DENDROBIUM</h6></div>
        <div class="col px-3"><h6>CATELLYA</h6></div>
        <div class="col px-3"><h6>BULAN</h6></div>
        <div class="col px-3"><h6>BULAN</h6></div>
    </div>
</div>
{{-- card --}}
<div class="container py-0">
    <div class="row row-cols-1 row-cols-md-3 gap-4 py-5">
        <div class="col">
            <div class="card">
                <img src="/img/2.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h4 class="card-title">TIRAMISU CAKE</h4>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam
                            dignissimos accusantium amet similique velit iste.</p>
                </div>
                <div class="mb-2 d-flex justify-content-around card-body">
                    <h3>Rp190.000</h3>
                    <button class="btn btn-primary">Buy Now</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


