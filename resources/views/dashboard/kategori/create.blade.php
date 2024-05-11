@extends('dashboard.layouts.main')


@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Buat kategori baru</h1>
  </div>

  <div class="col-lg-8 my-5">
      <form method="post" action="/dashboard/kategori">
        @csrf
        <div class="mb-3">
          <label for="nama" class="form-label">Kategori</label>
          <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required autofocus value="{{ old('nama') }}">
            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug">
        </div>
        <button type="submit" class="btn btn-primary"><i class="bi bi-send-plus-fill"></i> Kirim</button>
    </form>
  </div>
  <script>
    const kategori = document.querySelector('#nama');
    const slug = document.querySelector('#slug');

    kategori.addEventListener('change', function(){
        fetch('/dashboard/kategori/checkSlug?nama=' + nama.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });
  </script>
@endsection
