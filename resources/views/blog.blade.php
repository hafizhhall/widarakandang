@extends('layouts.main')

@section('content')
<div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <h1 class="display-3 mb-3 animated slideInDown">Blog Widarakandang</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a class="text-body" href="/">Home</a></li>
                <li class="breadcrumb-item"><a class="text-body" href="/blog">blog</a></li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Blog Start -->
<div class="container-xxl py-6">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-5 mb-3">Aktivitas Terakhir</h1>
            <p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
        </div>
        <div class="row g-4">
            <div class="navnews mb-4">
                <ul class="nav nav-tabs">
                    @foreach ($kategori as $k)
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('artikel.kategori') && Request::segment(2) == $k->slug ? 'active' : '' }}"
                                aria-current="page"
                                href="{{ route('artikel.kategori', $k->slug) }}">{{ $k->nama }}</a>
                        </li>
                    @endforeach
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/#blog">Semua</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row g-4">
            @foreach ($artikel as $artikels)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <img class="img-fluid" src="{{ asset('storage/' . $artikels->gambar) }}" alt="">
                        <div class="bg-light p-4">
                            <a class="d-block h5 lh-base mb-4"
                                href="/blog/dartikel/{{ $artikels->slug }}">{{ $artikels->title }}</a>
                            <div class="text-muted border-top pt-4">
                                <small class="me-3"><i class="fa fa-user text-primary me-2"></i>Admin</small>
                                <small class="me-3"><i
                                        class="fa fa-calendar text-primary me-2"></i>{{ $artikels->created_at->translatedFormat('d F Y') }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
        </div>
    </div>
</div>
@endsection

