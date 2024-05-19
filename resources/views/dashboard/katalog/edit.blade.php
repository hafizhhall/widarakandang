@extends('dashboard.layouts.main')


@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Ubah katalog</h1>
  </div>

  <div class="col-lg-8 my-5">
      <form method="post" action="/dashboard/katalog/{{ $katalog->slug }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Nama Anggrek</label>
          <input type="text" class="form-control  @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title', $katalog->title) }}">
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
            @enderror" id="slug" name="slug" required value="{{ old('slug', $katalog->slug) }}">
            @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="harga" class="form-label rupiah">Harga jual</label>
                    <input type="number" min="1" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" required autofocus value="{{ old('harga', $katalog->harga) }}">
                      @error('harga')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                  </div>
            </div>
            {{-- <div class="col">
                <div class="mb-3">
                    <label for="jumlah" class="form-label rupiah">Jumlah anggrek</label>
                    <input type="number" min="1" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah" required autofocus value="{{ old('jumlah', $katalog->jumlah) }}">
                      @error('jumlah')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                  </div>
            </div> --}}
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="ukuran" class="form-label">Ukuran anggrek</label>
                    <input type="text" class="form-control  @error('ukuran') is-invalid @enderror" id="ukuran" name="ukuran" required autofocus value="{{ old('ukuran', $katalog->ukuran) }}">
                      @error('ukuran')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                  </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="suhu" class="form-label">Suhu</label>
                    <input type="text" class="form-control  @error('suhu') is-invalid @enderror" id="suhu" name="suhu" required autofocus value="{{ old('suhu', $katalog->suhu) }}">
                      @error('suhu')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                  </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="status" class="form-label">Status Bunga</label>
                    <input type="text" class="form-control  @error('status') is-invalid @enderror" id="status" name="status" required autofocus value="{{ old('status', $katalog->status) }}">
                      @error('status')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                  </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="berbunga" class="form-label">Waktu berbunga</label>
                    <input type="text" class="form-control  @error('berbunga') is-invalid @enderror" id="berbunga" name="berbunga" required autofocus value="{{ old('berbunga', $katalog->berbunga) }}">
                      @error('berbunga')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                  </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="jenis" class="form-label">Jenis Anggrek</label>
            <select class="form-select" name="jenis_id">
                <option selected style="opacity: 50%">Pilih jenis anggrek!</option>
                @foreach ($categories as $kategori)
                    @if(old('jenis_id', $katalog->jenis_id) == $kategori->id)
                        <option value="{{ $kategori->id }}" selected>{{ $kategori->name }}</option>
                    @else
                        <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="col">
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="hidden" name="oldGambar" value="{{ $katalog->gambar }}">
                @if ($katalog->gambar)
                <img src="{{ asset('storage/' . $katalog->gambar) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="">
                @else
                <img class="img-preview img-fluid mb-3 col-sm-5" alt="">
                @endif
                <input class="form-control @error('gambar')
                is-invalid
                @enderror" type="file" id="gambar" name="gambar" onchange="previewGambar()">
                  @error('gambar')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
              </div>
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Deskripsi Anggrek</label>
            @error('body')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="body" type="hidden" name="body" value="{{ old('body', $katalog->body) }}">
            <trix-editor input="body"></trix-editor>
        </div>
        <div class="mb-3">
            <label for="perawatan" class="form-label">Tips merawat anggrek</label>
            @error('perawatan')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="perawatan" type="hidden" name="perawatan" value="{{ old('perawatan', $katalog->perawatan) }}">
            <trix-editor input="perawatan"></trix-editor>
        </div>
        <div class="mb-3">
        <button type="submit" class="btn btn-primary"><i class="bi bi-send-plus-fill"></i> Kirim</button>
    </form>
  </div>

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function(){
        fetch('/dashboard/katalog/checkSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });
    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
    });
    function previewGambar(){
        const gambar = document.querySelector('#gambar');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(gambar.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    };
</script>
@endsection
