@extends('dashboard.layouts.main')
@push('css')
<link rel="stylesheet" href="{{ asset('') }}vendor/chart.js/Chart.min.css">
<link href="{{ asset('') }}vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
<link href="{{ asset('') }}vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('') }}/vendor/izitoast/css/iziToast.min.css">
@endpush
@section('content')
    <div class="main-content">
        <div class="title">
            Data Kategori Artikel
        </div>
        <div class="content-wrapper">
            <div class="row same-height">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="/dashboard/kategori/create" class="btn btn-primary mb-3"><i class="bi bi-plus-lg"></i>
                                Tambah kategori</a>
                        </div>
                        <div class="card-body">
                            <table class="table dt-responsive display" id="example2">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategoris as $k)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $k->nama }}</td>
                                            <td>
                                                <a href="/dashboard/kategori/{{ $k->slug }}/edit"
                                                    class="badge bg-warning">
                                                    <i class="ti-pencil-alt"></i>
                                                </a>
                                                <form action="/dashboard/kategori/{{ $k->slug }}" method="post"
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
@push('js')
<script src="{{ asset('') }}vendor/chart.js/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="{{ asset('') }}assets/js/pages/index.min.js"></script>
<script src="{{ asset('') }}vendor/sweetalert2/sweetalert2.all.min.js"></script>
<script src="{{ asset('') }}vendor/izitoast/js/iziToast.min.js"></script>
<script src="{{ asset('') }}assets/js/pages/alert.min.js"></script>
@endpush
