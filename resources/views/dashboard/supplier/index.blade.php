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
        @if (session('error'))
            <div class="alert alert-danger" id="success-alert">
                {{ session('error') }}
            </div>
        @endif
        <div class="title">
            Data supplier anggrek
        </div>
        <div class="content-wrapper">
            <div class="row same-height">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="/dashboard/supplier/create" class="btn btn-primary"><i class="bi bi-plus-lg"></i>
                                Tambah Supplier</a>
                        </div>
                        <div class="card-body">
                            <p class="form-text mb-2">Kelola data supplier</p>
                            <table id="example2" class="table dt-responsive display">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Perusahaan</th>
                                        <th scope="col">Penanggugn Jawab</th>
                                        <th scope="col">No.Telep</th>
                                        <th scope="col">Note</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($suppliers as $supplier)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $supplier->perusahaan }}</td>
                                            <td>{{ $supplier->nama }}</td>
                                            <td>{{ $supplier->phone }}</td>
                                            <td>{{ $supplier->note }}</td>
                                            <td>
                                                <a href="/dashboard/supplier/{{ $supplier->slug }}/edit"
                                                    class="badge bg-warning">
                                                    <i class="ti-pencil"></i>
                                                </a>
                                                <form action="/dashboard/supplier/{{ $supplier->slug }}" method="post"
                                                    class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="badge bg-danger border-0"
                                                        onclick="return confirm('Yaqqiienn Dexckk???')">
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
