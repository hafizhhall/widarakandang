@extends('layouts.main')

@section('content')
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-3 animated slideInDown">Anggrek <span class="text-primary">{{ $jenis }}</span></h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-body" href="/">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-body" href="/katalog">Katalog</a></li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- card --}}
    <div class="container-xxl py-5">
        <div class="container">
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        @foreach ($katalog as $k)
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="product-item">
                                <div class="position-relative bg-light overflow-hidden">
                                    <img class="img-fluid w-100" src="{{ asset('storage/' . $k->gambar) }}" alt="">
                                    <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">{{ $k->status }}</div>
                                </div>
                                <div class="text-center p-4">
                                    <a class="d-block h5 mb-2" href="">{{ $k->title }}</a>
                                    <span class="text-primary me-1">Rp{{ number_format($k->harga,0,',','.') }}</span>
                                </div>
                                <div class="d-flex border-top">
                                    <small class="w-50 text-center border-end py-2">
                                        <a class="text-body" href="/katalog/{{ $k->slug }}"><i class="fa fa-eye text-primary me-2"></i>Detail</a>
                                    </small>
                                    <small class="w-50 text-center py-2">
                                        <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Beli</a>
                                    </small>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row justify-content-start mt-3">
                <p class="d-inline-flex gap-1">
                    <a href="/katalog" class="btn btn-primary" role="button"><i class="fa fa-angle-left"></i> Kembali</a>
                </p>
            </div>
        </div>
    </div>
@endsection

