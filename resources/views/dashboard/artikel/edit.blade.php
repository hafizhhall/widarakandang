@extends('dashboard.layouts.main')


@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Ubah artikel</h1>
  </div>

  <div class="col-lg-8 my-5">
      <form method="post" action="/dashboard/artikel/{{ $artikel->slug }}">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Judul</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title', $artikel->title) }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug')
                is-invalid
            @enderror" id="slug" name="slug" required value="{{ old('slug', $artikel->slug) }}">
            @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="text" class="form-control @error('gambar')
                is-invalid
            @enderror" id="gambar" name="gambar" required value="{{ old('gambar', $artikel->gambar) }}">
            @error('gambar')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select class="form-select" name="kategori_id">
                <option selected>Pilih kategori</option>
                @foreach ($categories as $kategori)
                    @if(old('kategori_id', $artikel->kategori_id) == $kategori->id)
                        <option value="{{ $kategori->id }}" selected>{{ $kategori->nama }}</option>
                    @else
                        <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            @error('body')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="body" type="hidden" name="body" value="{{ old('body', $artikel->body) }}">
            <trix-editor input="body"></trix-editor>
        </div>
        <div class="mb-3">
        <button type="submit" class="btn btn-primary"><i class="bi bi-send-plus-fill"></i> Ubah artikel</button>
      </form>
  </div>
  <script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function(){
        fetch('/dashboard/artikel/checkSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });

    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
    })
  </script>
@endsection
