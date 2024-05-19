@extends('dashboard.layouts.main')


@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Buat katalog baru</h1>
  </div>

  <div class="col-lg-8 my-5">
      <form method="POST" action="/dashboard/entry">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label rupiah">Nama Anggrek</label>
            <select class="form-select" name="katalog_id">
                <option selected style="opacity: 50%">Pilih Anggrek</option>
                @foreach ($katalogs as $katalog)
                    @if(old('katalog_id') == $katalog->id)
                        <option value="{{ $katalog->id }}" selected>{{ $katalog->title }}</option>
                    @else
                        <option value="{{ $katalog->id }}">{{ $katalog->title }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="col">
            <div class="mb-3">
                <label for="perusahaan" class="form-label rupiah">Supplier</label>
                <select class="form-select" name="supplier_id">
                    <option selected style="opacity: 50%">Pilih supplier</option>
                    @foreach ($suppliers as $supplier)
                        @if(old('supplier_id') == $supplier->id)
                            <option value="{{ $supplier->id }}" selected>{{ $supplier->perusahaan }}</option>
                        @else
                            <option value="{{ $supplier->id }}">{{ $supplier->perusahaan }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
            <div class="col">
                <div class="mb-3">
                    <label for="quantity" class="form-label rupiah">Jumlah anggrek</label>
                    <input type="number" min="1" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" required autofocus value="{{ old('quantity') }}">
                      @error('quantity')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                  </div>
            </div>
            <div class="mt-3">
                <label class="text-sm text-gray-600" for="date">Tanggal</label>
                <div class="@error('date')  border-red-400  @enderror border-2 p-1">
                    <input type="date" name="date" class="text-sm text-black w-full h-full focus:outline-none" id="date" type="text">
                </div>
                 @error('date')
                    <p class="italic text-red-500 text-sm mt-1">{{$message}}</p>
                @enderror
            </div>
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
