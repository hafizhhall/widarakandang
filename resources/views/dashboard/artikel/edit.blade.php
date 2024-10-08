@extends('dashboard.layouts.main')

@section('content')
    <div class="main-content">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    <h4>Ubah Artikel</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="/dashboard/artikel/{{ $artikel->slug }}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Judul</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" required autofocus
                                        value="{{ old('title', $artikel->title) }}">
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
                                    <input type="text"
                                        class="form-control @error('slug')
                                                is-invalid
                                    @enderror"
                                        id="slug" name="slug" required value="{{ old('slug', $artikel->slug) }}">
                                    @error('slug')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-">
                                    <label for="kategori" class="form-label">Kategori</label>
                                    <select class="form-select" name="kategori_id">
                                        <option selected>Pilih kategori</option>
                                        @foreach ($categories as $kategori)
                                            @if (old('kategori_id', $artikel->kategori_id) == $kategori->id)
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
                                    <input type="hidden" name="oldGambar" value="{{ $artikel->gambar }}">
                                    @if ($artikel->gambar)
                                        <img src="{{ asset('storage/' . $artikel->gambar) }}"
                                            class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="">
                                    @else
                                        <img class="img-preview img-fluid mb-3 col-sm-5" alt="">
                                    @endif
                                    <input
                                        class="form-control @error('gambar')
                                        is-invalid
                                    @enderror"
                                        type="file" id="gambar" name="gambar" onchange="previewGambar()">
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
                                    <input id="body" type="hidden" name="body"
                                        value="{{ old('body', $artikel->body) }}">
                                    <trix-editor input="body"></trix-editor>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-send-plus-fill"></i> Ubah
                            artikel</button>
                            <a class="btn btn-danger" href="/dashboard/artikel" role="button">batal</a>
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
        })

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
