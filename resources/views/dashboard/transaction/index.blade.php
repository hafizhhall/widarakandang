@extends('dashboard.layouts.main')
@push('css')
    <link rel="stylesheet" href="{{ asset('') }}vendor/chart.js/Chart.min.css">
    <link href="{{ asset('') }}vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="{{ asset('') }}vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('') }}/vendor/izitoast/css/iziToast.min.css">
    <link rel="stylesheet" href="{{ asset('') }}vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
@endpush
@section('content')
@include('sweetalert::alert')
<div class="main-content">
    <div class="title">
        Seluruh data Transaksi
    </div>
    <div class="content-wrapper">
        <div class="row same-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        @include('sweetalert::alert')
                        <p class="form-text mb-2"></p>
                        <table id="example2" class="table dt-responsive display table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Invocie</th>
                                    <th scope="col">Pembeli</th>
                                    <th scope="col">total</th>
                                    <th scope="col">Kirim ke</th>
                                    <th scope="col">Status pesanan</th>
                                    <th scope="col">status</th>
                                    <th scope="col">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaction as $trx)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $trx->invoice }}</td>
                                        <td>{{ $trx->user->name }}</td>
                                        <td>Rp{{ number_format($trx->total) }}</td>
                                        <td>{{ $trx->user->city_name }}</td>
                                        <td>{{ $trx->status_pesanan }}</td>
                                        <td>
                                            <span class="badge {{ $trx->status === 'belum dibayar' ? 'bg-danger' : ($trx->status === 'lunas' ? 'bg-success' : 'bg-secondary') }}">
                                                {{ $trx->status }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="/dashboard/transaction/{{ $trx->id }}" class="badge bg-info" style="text-decoration: none">
                                                <i class="ti-eye"></i>
                                            </a>
                                            <a href="/dashboard/transaction/{{ $trx->id }}/edit" class="badge bg-info" style="text-decoration: none">
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
</div>
@endsection
