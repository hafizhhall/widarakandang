@extends('user.index')
@section('menu')
    <main class="container py-2 form-signin w-100 m-auto">
        <form action="change-address" method="post">
            @csrf
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @elseif (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <h1 class="h3 mb-3 fw-normal" style="font-family: poppins">Ubah alamat pengiriman</h1>
            @include('sweetalert::alert')
            <div class="row mt-3">
                <div class="col-md-6">
                    <label for="city">Asal Kota</label>
                    <div class="form-floating">
                        <select name="city" id="city" class="form-select" aria-label="pilih kota asal!">
                            <option value="">Pilih kota
                                asal anda</option>
                            @foreach ($cities as $city)
                            <option value="{{ $city['city_id'] }}" data-city-name="{{ $city['city_name'] }}">{{ $city['city_name'] }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="city_name" id="city_name" value="">
                        <label for="floatingSelect">Works with selects</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="pos" class="form-label">Kode POS</label>
                    <input type="number" name="pos" id="pos"
                        class="form-control  @error('pos') is-invalid
                    @enderror" id="pos"
                        value="{{ old('pos', $user->pos) }}">
                    @error('pos')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mt-3">
                <label for="alamat">Alamat detail</label>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="alamat" name="alamat" style="height: 100px">{{ old('alamat', $user->alamat) }}</textarea>
                    <label for="floatingTextarea2" style="opacity: 50%">contoh : Degolan Rt 01 / Rw 03, Umbulmartani,
                        Ngemplak, Sleman</label>
                </div>
            </div>
            <div class="mt-3">
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Simpan</button>
        </form>
    </main>
    <script>
        document.getElementById('city').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var cityName = selectedOption.getAttribute('data-city-name');
            document.getElementById('city_name').value = cityName;
        });
    </script>
@endsection
