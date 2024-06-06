@extends('dashboard.layouts.main')

@section('content')
    <div class="main-content">
        <div class="title">
            Tambah data supplier
        </div>
        <div class="content-wrapper">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Isi sesuai kolom
                    </div>
                    <div class="card-body">
                        <form method="post" action="/dashboard/supplier">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="perusahaan" class="form-label">Nama Perusahaan</label>
                                        <input type="text" class="form-control @error('perusahaan') is-invalid @enderror"
                                            id="perusahaan" name="perusahaan" required autofocus
                                            value="{{ old('perusahaan') }}">
                                        @error('perusahaan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Penanggung Jawab</label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                            id="nama" name="nama" required autofocus value="{{ old('nama') }}">
                                        @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Nomor Hp</label>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                            id="phone" name="phone" required autofocus value="{{ old('phone') }}">
                                        @error('phone')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="note" class="form-label">Note</label>
                                        <input type="text" class="form-control @error('note') is-invalid @enderror"
                                            id="note" name="note" autofocus value="{{ old('note') }}">
                                        @error('note')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="bi bi-send-plus-fill"></i>
                                Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const supplier = document.querySelector('#perusahaan');
        const slug = document.querySelector('#slug');

        kategori.addEventListener('change', function() {
            fetch('/dashboard/supplier/checkSlug?perusahaan=' + supplier.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>
@endsection
