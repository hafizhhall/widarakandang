@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Ubah Data Masuk</h1>
  </div>

  <div class="col-lg-8 my-5">
      <form method="post" action="/dashboard/entry/{{ $entry->id }}">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label rupiah">Nama Anggrek</label>
            <select class="form-select" name="katalog_id">
                <option selected style="opacity: 50%" >Pilih Anggrek</option>
                @foreach ($katalogs as $katalog)
                    @if(old('katalog_id', $entry->katalog_id) == $katalog->id)
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
                        @if(old('supplier_id', $entry->supplier_id) == $supplier->id)
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
                    <input type="number" min="1" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" required autofocus value="{{ old('quantity', $entry->quantity) }}">
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
                    <input type="date" name="date" class="text-sm text-black w-full h-full focus:outline-none" id="date" type="text" value="{{ old('date', $entry->date) }}">
                </div>
                 @error('date')
                    <p class="italic text-red-500 text-sm mt-1">{{$message}}</p>
                @enderror
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
