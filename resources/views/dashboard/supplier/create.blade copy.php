@extends('dashboard.layouts.main')


@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Supplier Baru</h1>
  </div>

  <div class="col-lg-8 my-5">
      <form method="post" action="/dashboard/supplier">
        @csrf
        <div class="mb-3">
          <label for="perusahaan" class="form-label">Nama Perusahaan</label>
          <input type="text" class="form-control @error('perusahaan') is-invalid @enderror" id="perusahaan" name="perusahaan" required autofocus value="{{ old('perusahaan') }}">
            @error('perusahaan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-0">
            {{-- <label for="slug" class="form-label">Slug</label> --}}
            {{-- <input type="text" type="hidden" class="form-control" id="slug" name="slug"> --}}
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Penanggung Jawab</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required autofocus value="{{ old('nama') }}">
              @error('nama')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
              @enderror
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">Nomor Hp</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" required autofocus value="{{ old('phone') }}">
              @error('phone')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
              @enderror
          </div>
          <div class="mb-3">
            <label for="note" class="form-label">Note</label>
            <input type="text" class="form-control @error('note') is-invalid @enderror" id="note" name="note" autofocus value="{{ old('note') }}">
              @error('note')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
              @enderror
          </div>
        <button type="submit" class="btn btn-primary"><i class="bi bi-send-plus-fill"></i> Kirim</button>
    </form>
  </div>
  <script>
    const supplier = document.querySelector('#perusahaan');
    const slug = document.querySelector('#slug');

    kategori.addEventListener('change', function(){
        fetch('/dashboard/supplier/checkSlug?perusahaan=' + supplier.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });
  </script>
@endsection
