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

    <div class="content-wrapper">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="/dashboard/output/create" class="btn btn-primary mb-3"><i class="bi bi-plus-lg"></i> Tambah
                        Barang Keluar</a>
                </div>
                <div class="card-body">
                    <p class="form-text mb-2">Kelola data supplier</p>
                    <table class="table dt-responsive display" id="example2">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Anggrek</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Sub total</th>
                                <th scope="col">Harga total</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produkKeluar as $out)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $out->katalog->title }}</td>
                                    <td>{{ number_format($out->quantity, 0, ',', '.') }}</td>
                                    <td>{{ number_format($out->sub_keluar, 0, ',', '.') }}</td>
                                    <td>Rp{{ number_format($out->harga_keluar, 0, ',', '.') }}</td>
                                    <td>{{ $out->date }}</td>
                                    <td>
                                        <a href="/dashboard/output/{{ $out->id }}/edit" class="badge bg-warning">
                                            <i class="ti-pencil-alt"></i>
                                        </a>
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
