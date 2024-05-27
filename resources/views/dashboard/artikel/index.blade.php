@extends('dashboard.layouts.main')
@push('css')
    <link rel="stylesheet" href="{{ asset('') }}vendor/chart.js/Chart.min.css">
    <link href="{{ asset('') }}vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="{{ asset('') }}vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('') }}/vendor/izitoast/css/iziToast.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
@endpush
@section('content')
    <div class="main-content">
        <div class="title">
            Data Blog Post
        </div>
        <div class="content-wrapper">
            <div class="row same-height">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="/dashboard/artikel/create" class="btn btn-primary mb-3"><i class="bi bi-plus-lg"></i>
                                Tambah artikel</a>
                        </div>
                        <div class="card-body">
                            @include('sweetalert::alert')
                            <p class="form-text mb-2">Datatables also provide responsive table</p>
                            <table id="example2" class="table dt-responsive display">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($artikels as $artikel)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $artikel->title }}</td>
                                            <td>{{ $artikel->kategori->nama }}</td>
                                            <td>
                                                <a href="/dashboard/artikel/{{ $artikel->slug }}" class="badge bg-info">
                                                    <i class="ti-eye"></i>
                                                </a>
                                                <a href="/dashboard/artikel/{{ $artikel->slug }}/edit"
                                                    class="badge bg-warning">
                                                    <i class="ti-pencil"></i>
                                                </a>
                                                <form action="/dashboard/artikel/{{ $artikel->slug }}" method="post"
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
                            {{-- <div class="row">
                                {{ $artikels->links() }}
                            </div> --}}
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

        // alert
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('button[data-confirm-delete]').forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const form = button.closest('form');
                    Swal.fire({
                        title: 'Hapus Artikel!',
                        text: "Apakah anda yakin akan menghapusnya?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, hapus!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush
