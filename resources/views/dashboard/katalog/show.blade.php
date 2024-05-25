@extends('dashboard.layouts.main')
@push('css')
    <link rel="stylesheet" href="{{ asset('') }}vendor/chart.js/Chart.min.css">
    <link href="{{ asset('') }}vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="{{ asset('') }}vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
@endpush
@section('content')
    <div class="main-content">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-5">
                            <img src="{{ asset('storage/' . $katalog->gambar) }}" class="img-fluid w-100" alt="">
                            <div class="row mt-0 p-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Tips Merawat Anggrek</h4>
                                    </div>
                                    <div class="card-body">
                                        <p>
                                            <button class="btn btn-primary mb-2" type="button" data-bs-toggle="collapse" role="button"
                                                data-bs-target="#collapseExample" aria-expanded="false"
                                                aria-controls="collapseExample">
                                                <i class="ti-eye"> </i> Lihat tips
                                            </button>
                                        </p>
                                        <div class="collapse" id="collapseExample">
                                            <div class="card-body">
                                                <p style="size: 12px">{!! $katalog->perawatan !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-8">
                                    <h1>{{ $katalog->title }}</h1>
                                </div>
                                <div class="col-4">
                                    <h2 style="text-align: right">Rp{{ number_format($katalog->harga,0,',','.')}}</h2>
                                </div>
                            </div>
                            <p style="opacity: 100%" class="text-info">{{ $katalog->jenis->name }}</p>
                            <p style="text-align: justify" class="mt-4">{!! $katalog->body !!}</p>
                            <div class="d-flex flex-row justify-content-end">
                                <i class="fa fa-calendar me-2"></i>
                                <span style="opacity: 50%">{{ $katalog->created_at->format('d-m-Y') }}</span>
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
                                        <div class="col-4 ">
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
                            <a href="/dashboard/katalog" class="btn btn-success"><i class="bi bi-arrow-left-circle"></i> kembali</a>

                            <a href="/dashboard/katalog/{{ $katalog->slug }}/edit" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Ubah</a>

                            <form action="/dashboard/katalog/{{ $katalog->slug }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger border-0" onclick="return confirm('Yaqqiienn Dexckk???')">
                                    <i class="bi bi-trash3"></i> Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('') }}vendor/chart.js/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="{{ asset('') }}assets/js/pages/index.min.js"></script>
@endpush
