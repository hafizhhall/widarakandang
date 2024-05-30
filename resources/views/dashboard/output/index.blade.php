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
                    <div class="row">
                        <div class="col-md-2">
                            <a href="/dashboard/output/create" class="btn btn-primary mb-3"><i class="bi bi-plus-lg"></i>
                                Barang Keluar</a>
                        </div>
                        <div class="col-md-5 offset-5">
                            <form action="{{ url('dashboard/output/excel') }}" method="GET">
                                <div class="input-group mb-0">
                                    <input class="form-control" type="date" id="start_date" name="start_date">
                                    <span class="bg-primary text-light px-3 justify-content-center align-items-center d-flex">to</span>
                                    <input class="form-control" type="date" id="end_date" name="end_date" required>
                                    <button type="submit" class="btn btn-success">Export</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p class="form-text mb-2">Kelola data supplier</p>
                    @include('dashboard.output.table')
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
