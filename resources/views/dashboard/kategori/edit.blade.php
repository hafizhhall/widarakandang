@extends('dashboard.layouts.main')
@section('content')
    <div class="main-content">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    Ubah Kategori Artikel
                </div>
                <div class="card-body">
                    <form method="post" action="/dashboard/kategori/{{ $kategori->slug }}">
                        @method('put')
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Kategori</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        id="nama" name="nama" required autofocus
                                        value="{{ old('nama', $kategori->nama) }}">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text"
                                        class="form-control @error('slug')
                                    is-invalid
                                @enderror"
                                        id="slug" name="slug" required value="{{ old('slug', $kategori->slug) }}">
                                    @error('slug')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-send-plus-fill"></i> Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        const kategori = document.querySelector('#nama');
        const slug = document.querySelector('#slug');

        kategori.addEventListener('change', function() {
            fetch('/dashboard/kategori/checkSlug?nama=' + nama.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>
@endsection
