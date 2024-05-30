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
        <div class="content-wrapper">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-2">
                                <a href="/dashboard/entry/create" class="btn btn-primary"><i class="ti-plus"></i>
                                    Barang
                                    Masuk</a>
                            </div>
                            <div class="col-md-5 offset-5">
                                <form action="{{ url('dashboard/entry/excel') }}" method="GET">
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
                        @include('sweetalert::alert')
                        <p class="form-text mb-2">Kelola data supplier</p>
                        @include('dashboard.entry.table')
                    </div>
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
@push('js')
    <script src="{{ asset('') }}vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('') }}vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script>
        $('.date').datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'dd-mm-yyyy'
        }).on('changeDate', function (e) {
            console.log(e.target.value);
        });

    </script>
@endpush
