@extends('layouts.main')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-3 animated slideInDown">{{ $katalog->title }}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-body" href="/">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-body" href="/katalog">Katalog</a></li>
                    <li class="breadcrumb-item text-dark active" aria-current="page">{{ $katalog->jenis->name }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
    <div class="container-xxl py-2">
        <div class="container-fluid py-1">
            <div class="container">
                <div class="row mt-5">
                    <div class="col-6">
                        <img src="{{ asset('storage/' . $katalog->gambar) }}" class="img-fluid" alt="">
                        <div class="row mt-2 owl-carousel owl-theme">
                        </div>
                        <div class="row mt-0 p-4">
                            <h5 style="opacity: 50%">Tips Perawatan:</h5>
                            <p style="size: 12px">{!! $katalog->perawatan !!}</p>
                        </div>
                    </div>
                    <div class="col-5 offset-1">
                        <div class="row">
                            <div class="col-6">
                                <h2 class="fw-bold text-primary">{{ $katalog->title }}</h2>
                            </div>
                            <div class="col-6">
                                <h2 style="text-align: right">Rp{{ number_format($katalog->harga, 0, ',', '.') }}</h2>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <p class="lh-base">
                                    {!! $katalog->body !!}
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 border p-2 rounded-3 shadow-sm p-3 mb-3 mt-2 bg-body-tertiary rounded">
                                <div class="row">
                                    <div class="col-4 border-end">
                                        <div class="row">
                                            <div class="col">
                                                <p style="text-align: center; opacity: 50%;">Berbunga</p>
                                            </div>
                                            <div class="">
                                                <h5 style="text-align: center">{{ $katalog->berbunga }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 border-end">
                                        <div class="row">
                                            <div class="col">
                                                <p style="text-align: center; opacity: 50%;">Ukuran</p>
                                            </div>
                                            <div class="">
                                                <h5 style="text-align: center">{{ $katalog->ukuran }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 ">
                                        <div class="row">
                                            <div class="col">
                                                <p style="text-align: center; opacity: 50%;">Suhu</p>
                                            </div>
                                            <div class="">
                                                <h5 style="text-align: center">{{ $katalog->suhu }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 border p-2 rounded-3 shadow-sm p-3 mb-5 bg-body-tertiary rounded">
                                <div class="row">
                                    <div class="col-4 border-end">
                                        <div class="row">
                                            <div class="col">
                                                <p style="text-align: center; opacity: 50%;">Jenis</p>
                                            </div>
                                            <div class="">
                                                <h5 style="text-align: center">{{ $katalog->jenis->name }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 border-end">
                                        <div class="row">
                                            <div class="col">
                                                <p style="text-align: center; opacity: 50%;">Statur Mekar</p>
                                            </div>
                                            <div class="">
                                                <h6 style="text-align: center">{{ $katalog->status }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="row">
                                            <div class="col">
                                                <p style="text-align: center; opacity: 50%;">Ketersediaan</p>
                                            </div>
                                            <div class="">
                                                <h5 style="text-align: center">{{ $katalog->jumlah }} tangkai</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="my-separator"></div>
                        <div class="row">
                            <div class="col mt-4 mb-3">
                                <h5>Pilihan tersedia</h6>
                            </div>
                        </div>
                        <div class="row">
                            @can('pelanggan')
                                <form action="/chart/store" method="post">
                                    @csrf
                                    <small class="w-50 text-center py-2">
                                        <input type="hidden" name="katalog_id" value="{{ $katalog->id }}">
                                        <input type="submit" class="btn btn-primary" value="Add to Chart">
                                        <a class="text-body" href="" type="submit"><i
                                                class="fa fa-shopping-bag text-primary me-2"></i></a>
                                    </small>
                                </form>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
