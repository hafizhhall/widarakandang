@extends('dashboard.layouts.main')
@push('css')
    <link rel="stylesheet" href="{{ asset('') }}vendor/chart.js/Chart.min.css">
    <link href="{{ asset('') }}vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="{{ asset('') }}vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('') }}/vendor/izitoast/css/iziToast.min.css">
    <link rel="stylesheet" href="{{ asset('') }}vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
@endpush
@section('content')
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
                        <table id="example2" class="table dt-responsive display">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Pembeli</th>
                                    <th scope="col">total</th>
                                    <th scope="col">Kirim ke</th>
                                    <th scope="col">status</th>
                                    <th scope="col">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaction as $trx)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $trx->user->name }}</td>
                                        <td>{{ $trx->total }}</td>
                                        <td>{{ $trx->user->city }}</td>
                                        <td class="badge border-0 {{ $trx->status === 'belum dibayar' ? 'bg-danger' : ($trx->status === 'lunas' ? 'bg-success' : 'bg-secondary') }}">
                                            {{ $trx->status }}
                                        </td>
                                        <td>
                                            <a href="/dashboard/artikel/}" class="badge bg-info">
                                                <i class="ti-eye"></i>
                                            </a>
                                            <a href="/dashboard/artikel//edit"
                                                class="badge bg-warning">
                                                <i class="ti-pencil"></i>
                                            </a>
                                            <form action="/dashboard/artikel/" method="post"
                                                class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="badge bg-danger border-0" data-confirm-delete="true"
                                                    id="swall-question">
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
@endsection
