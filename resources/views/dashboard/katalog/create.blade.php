@extends('dashboard.layouts.main')


@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Buat katalog baru</h1>
  </div>

  <div class="col-lg-8 my-5">
      <form method="post" action="/dashboard/katalog" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Nama Anggrek</label>
          <input type="text" class="form-control  @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title') }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug">
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="harga" class="form-label rupiah">Harga jual</label>
                    <input type="number" min="1" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" required autofocus value="{{ old('harga') }}">
                      @error('harga')
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
                    <label for="ukuran" class="form-label">Ukuran anggrek</label>
                    <select class="form-select" aria-label="Default select example" name="ukuran">
                        <option selected>Pilih ukuran anggrek</option>
                        <option value="Seedling">Seedling</option>
                        <option value="Remaja">Remaja</option>
                        <option value="Pra-remaja">Pra-remaja</option>
                        <option value="Dewasa">Dewasa</option>
                        <option value="Pra-dewasa">Pra-dewasa</option>
                      </select>
                    {{-- <input type="text" class="form-control  @error('ukuran') is-invalid @enderror" id="ukuran" name="ukuran" required autofocus value="{{ old('ukuran') }}"> --}}
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
                    <select class="form-select" aria-label="Default select example" name="suhu">
                        <option selected>Pilih suhu</option>
                        <option value="Hangat">Hangat</option>
                        <option value="Sejuk">Sejuk</option>
                        <option value="Sinar langsung">Sinar langsung</option>
                      </select>
                    {{-- <input type="text" class="form-control  @error('suhu') is-invalid @enderror" id="suhu" name="suhu" required autofocus value="{{ old('suhu') }}"> --}}
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
                    <label for="status" class="form-label">Status Bunga Anggrek</label>
                    <select class="form-select" aria-label="Default select example" name="status">
                        <option selected>Pilih status bunga</option>
                        <option value="Berbunga">Berbunga</option>
                        <option value="Tidak berbunga">Tidak berbunga</option>
                        <option value="Akan berbunga">Akan berbunga</option>
                      </select>
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
                    <select class="form-select" aria-label="Default select example" name="berbunga">
                        <option selected>Pilih bulan</option>
                        <option value="Januari">Januari</option>
                        <option value="Febuari">Febuari</option>
                        <option value="Maret">Maret</option>
                        <option value="Apirl">Apirl</option>
                        <option value="Mei">Mei</option>
                        <option value="Juni">Juni</option>
                        <option value="Juli">Juli</option>
                        <option value="Agustus">Agustus</option>
                        <option value="November">November</option>
                        <option value="September">September</option>
                        <option value="Oktober">Oktober</option>
                        <option value="Desember">Desember</option>
                      </select>
                    {{-- <input type="text" class="form-control  @error('berbunga') is-invalid @enderror" id="berbunga" name="berbunga" required autofocus value="{{ old('berbunga') }}"> --}}
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
                    @if(old('jenis_id') == $kategori->id)
                        <option value="{{ $kategori->id }}" selected>{{ $kategori->name }}</option>
                    @else
                        <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Masukan gambar</label>
            <img class="img-preview img-fluid mb-3 col-sm-5" alt="">
            <input class="form-control @error('gambar')
                is-invalid
            @enderror" type="file" id="gambar" name="gambar" onchange="previewGambar()">
            @error('gambar')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Deskripsi Anggrek</label>
            @error('body')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="body" type="hidden" name="body" value="{{ old('body') }}">
            <trix-editor input="body"></trix-editor>
        </div>
        <div class="mb-3">
            <label for="perawatan" class="form-label">Tips merawat anggrek</label>
            @error('perawatan')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="perawatan" type="hidden" name="perawatan" value="{{ old('perawatan') }}">
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
