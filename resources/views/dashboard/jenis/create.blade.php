@extends('dashboard.layouts.main')
@push('css')
    <link rel="stylesheet" href="{{ asset('') }}vendor/chart.js/Chart.min.css">
    <link href="{{ asset('') }}vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="{{ asset('') }}vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
@endpush
@section('content')
    <div class="main-content">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Kategori Anggrek</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('jenis.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Kategori</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" required autofocus value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="ti-plus"></i> Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        const jenis = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        jenis.addEventListener('change', function() {
            fetch('/dashboard/jenis/checkSlug?name=' + jenis.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>
@endsection
@push('js')
    <script src="{{ asset('') }}vendor/chart.js/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="{{ asset('') }}assets/js/pages/index.min.js"></script>
@endpush
