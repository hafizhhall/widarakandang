@extends('dashboard.layouts.main')

@section('content')
    <div class="main-content">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Artikel</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="/dashboard/artikel" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Judul</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" required autofocus value="{{ old('title') }}">
                                    @error('title')
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
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="kategori" class="form-label">Kategori</label>
                                    <select class="form-select" name="kategori_id">
                                        <option selected>Open this select menu</option>
                                        @foreach ($categories as $kategori)
                                            @if (old('kategori_id') == $kategori->id)
                                                <option value="{{ $kategori->id }}" selected>{{ $kategori->nama }}</option>
                                            @else
                                                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="gambar" class="form-label">Masukan gambar</label>
                                    <img class="img-preview img-fluid mb-3 col-sm-5" alt="">
                                    <input class="form-control @error('gambar')
                                    is-invalid
                                @enderror" type="file"
                                        id="gambar" name="gambar" onchange="previewGambar()">
                                    @error('gambar')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="body" class="form-label">Body</label>
                                    @error('body')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                                    <trix-editor input="body"></trix-editor>
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
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/artikel/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });

        function previewGambar() {
            const gambar = document.querySelector('#gambar');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(gambar.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        };
    </script>
@endsection
@push('js')
    <script src="{{ asset('') }}vendor/chart.js/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="{{ asset('') }}assets/js/pages/index.min.js"></script>
@endpush
