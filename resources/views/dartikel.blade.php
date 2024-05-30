@extends('layouts.main')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header-artikel mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <h1 class="display-3 mb-3 animated slideInDown">Artikel</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a class="text-body" href="/">Home</a></li>
                <li class="breadcrumb-item"><a class="text-body" href="/artikel">Artikel</a></li>
                <li class="breadcrumb-item text-dark active" aria-current="page">{{ $artikel->kategori->nama }}</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->
    <div class="container-xxl py-5">
        <article>
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('storage/' . $artikel->gambar) }}" class="img-fluid" alt="Kebakaran Pasar Beringharjo">
                </div>
                <div class="col-md-6">
                    <h1>{{ $artikel->title }}</h1>
                    <p style="opacity: 50%" class="text-info">{{ $artikel->user->name }}</p>
                    <p style="text-align: justify" class="mt-4">{!! $artikel->body !!}</p>
                    <div class="d-flex flex-row justify-content-end">
                        <i class="fa fa-calendar me-2"></i>{{ $artikel->tanggal }}
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12 text-end">
                    <a href="/" class="btn btn-primary">Kembali ke Beranda</a>
                </div>
            </div>
        </article>
    </div>
@endsection
