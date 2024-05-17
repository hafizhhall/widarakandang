@extends('dashboard.layouts.main')


@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit kategori</h1>
  </div>

  <div class="col-lg-8 my-5">
      <form method="post" action="{{ route('jenis.update', $jenis->slug) }}">
        @method('PUT')
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Kategori</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name', $jenis->name) }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug')
                is-invalid
            @enderror" id="slug" name="slug" required value="{{ old('slug', $jenis->slug) }}">
        </div>
        <button type="submit" class="btn btn-primary"><i class="bi bi-send-plus-fill"></i> Kirim</button>
    </form>
  </div>
  <script>
    const jenis = document.querySelector('#name');
    const slug = document.querySelector('#slug');

    jenis.addEventListener('change', function(){
        fetch('/dashboard/jenis/checkSlug?name=' + jenis.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });
  </script>
@endsection
