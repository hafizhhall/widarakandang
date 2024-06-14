@extends('dashboard.layouts.main')
@push('css')
    <link rel="stylesheet" href="{{ asset('') }}vendor/chart.js/Chart.min.css">
    <link href="{{ asset('') }}vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="{{ asset('') }}vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('') }}/vendor/izitoast/css/iziToast.min.css">
@endpush
@section('content')
    <div class="main-content">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert" id="success-alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger" role="alert" id="success-alert">
                {{ session('error') }}
            </div>
        @endif
        <div class="title">
            Data Inventory Anggrek
        </div>
        <div class="content-wrapper">
            <div class="row same-height">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="/dashboard/katalog/create" class="btn btn-primary mb-1"><i class="ti-plus"></i>
                                Katalog</a>
                            <a href="/dashboard/katalog/generate" class="btn btn-success mb-1"><i class="ti-printer"></i>
                                Cetak Label</a>
                        </div>
                        <div class="card-body">
                            <p class="form-text mb-2">Datatables also provide responsive table</p>
                            <table id="example2" class="table dt-responsive display table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Jenis</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($katalogs as $katalog)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $katalog->title }}</td>
                                            <td>{{ $katalog->jenis->name }}</td>
                                            <td>Rp{{ number_format($katalog->harga, 0, ',', '.') }}</td>
                                            <td>{{ number_format($katalog->jumlah, 0, ',', '.') }}</td>
                                            <td>
                                                <a href="/dashboard/katalog/{{ $katalog->slug }}" class="badge bg-info">
                                                    <i class="ti-info-alt"></i>
                                                </a>
                                                <a href="/dashboard/katalog/{{ $katalog->slug }}/edit"
                                                    class="badge bg-warning">
                                                    <i class="ti-pencil"></i>
                                                </a>
                                                <form action="/dashboard/katalog/{{ $katalog->slug }}" method="post"
                                                    class="d-inline" id="delete">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="badge bg-danger border-0" id="delete"
                                                        onclick="return confirm(id)">
                                                        <i class="ti-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- js --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Set timeout to hide the alert after 5 seconds (5000 milliseconds)
            setTimeout(function() {
                var alert = document.getElementById('success-alert');
                if (alert) {
                    alert.style.transition = 'opacity 1s';
                    alert.style.opacity = '0';
                    setTimeout(function() {
                        alert.style.display = 'none';
                    }, 200); // Time it takes for the transition to complete
                }
            }, 5000);
        });
    </script>
@endsection

@push('js')
    <script src="{{ asset('') }}vendor/chart.js/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="{{ asset('') }}assets/js/pages/index.min.js"></script>
    <script src="{{ asset('') }}vendor/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="{{ asset('') }}vendor/izitoast/js/iziToast.min.js"></script>
    <script src="{{ asset('') }}assets/js/pages/alert.min.js"></script>
@endpush
