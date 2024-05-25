@extends('dashboard.layouts.main')
@push('css')
<link rel="stylesheet" href="{{ asset('') }}vendor/chart.js/Chart.min.css">
<link href="{{ asset('') }}vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
<link href="{{ asset('') }}vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('') }}/vendor/izitoast/css/iziToast.min.css">
@endpush

@section('content')
<div class="main-content">
    <div class="row">
        <div class="col-sm-3 mb-3 mb-sm-0">
            <div class="card">
            <div class="card-body">
                <h3 class="card-title">Total Anggrek</h3>
                <h5 class="card-text">{{ $jumlah }}</h5>
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
