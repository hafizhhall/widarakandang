
@extends('layouts.main')

@section('container')

<div class="container-fluid py-1">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="fw-bold display-4 judul">{{ $katalog->title }}</h1>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-5 offset-1">
                <img src="/img/{{ $katalog->gambar }}" class="img-fluid" alt="">
                <div class="row mt-2 owl-carousel owl-theme">
                    <div class="item"><img src="/img/sangobi.jpg" class="img-fluid" alt=""></div>
                    <div class="item"><img src="/img/sangobi.jpg" class="img-fluid" alt=""></div>
                    <div class="item"><img src="/img/sangobi.jpg" class="img-fluid" alt=""></div>
                    <div class="item"><img src="/img/sangobi.jpg" class="img-fluid" alt=""></div>
                    <div class="item"><img src="/img/sangobi.jpg" class="img-fluid" alt=""></div>
                </div>
                <div class="row mt-3">
                    <h5 style="opacity: 50%">Tips Perawatan:</h5>
                    <p style="size: 12px">{{ $katalog->perawatan }}</p>
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <p style="opacity: 40%"><a href="/" style="text-decoration: none">Home</a> / <a href="/katalog" style="text-decoration: none">Katalog</a> / {{ $katalog->jenis->name }} </p>
                </div>
                <div class="row">
                    <div class="col-6">
                        <h2>{{ $katalog->title }}</h2>
                    </div>
                    <div class="col-6">
                        <h2 style="text-align: right">Rp{{ number_format($katalog->harga,0,',','.')}}</h2>
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
                            <div class="col-4">
                                <div class="row">
                                    <div class="col">
                                        <p style="text-align: center; opacity: 50%;">Berbungga</p>
                                    </div>
                                    <div class="">
                                        <h5 style="text-align: center">{{ $katalog->berbungga }}</h5>
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
                            <div class="col-4 border-end">
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
                            <div class="col-4">
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
                                        <p style="text-align: center; opacity: 50%;">Warna</p>
                                    </div>
                                    <div class="">
                                        <h6 style="text-align: center">{{ $katalog->warna }}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 border-end">
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
                <div class="row border border-info bg-info bg-opacity-10 rounded-1 border-2 p-3">
                     <div class="col-6 mt-3">
                        <p style="font-size: 20px">{{ $katalog->ukuran }} - Berbunga</p>
                     </div>
                     <div class="col-6 mt-3">
                        <p style="text-align: right; font-size: 20px">Rp{{ number_format($katalog->harga,0,',','.')}}</p>
                     </div>
                </div>
                <div class="row border  rounded-1 border-2 p-3 mt-3">
                    <div class="col-6 mt-3">
                       <p style="font-size: 20px">{{ $katalog->ukuran }} - Tidak Berbunga</p>
                    </div>
                    <div class="col-6 mt-3">
                       <p style="text-align: right; font-size: 20px">Rp{{ number_format($katalog->harga,0,',','.')}}</p>
                    </div>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection
