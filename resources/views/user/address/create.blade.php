@extends('user.index')
@section('menu')
    <main class="container py-2 form-signin w-100 m-auto">
        <form action="/user/address" method="post">
            @csrf
            <h1 class="h3 mb-3 fw-normal" style="font-family: poppins">Tambah alamat pengiriman</h1>
            @include('sweetalert::alert')
            <div class="row mt-3">
                <div class="col-md-6">
                    <label for="name">Nama lengkap</label>
                    <input type="text" name="name" id="name"
                        class="form-control  @error('name') is-invalid
                @enderror" id="name"
                        value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="phone">Nomor telepon</label>
                    <input type="number" name="phone" id="phone"
                        class="form-control  @error('phone') is-invalid
                @enderror" id="phone"
                        value="{{ old('phone') }}">
                    @error('phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-6 mt-2">
                    <div class="">
                        <label for="city">Pilih kota asal anda</label>
                        <select name="city" id="city" class="form-select" aria-label="pilih kota asal!">
                            <option value="">Pilih kota
                                asal anda</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city['city_id'] }}" data-city-name="{{ $city['city_name'] }}">
                                    {{ $city['city_name'] }}
                                </option>
                            @endforeach
                        </select>
                        <input type="hidden" name="city_name" id="city_name" value="">
                    </div>
                </div>
                <div class="col-md-6 mt-2">
                    <label for="pos">Kode POS</label>
                    <input type="number" name="pos" id="pos"
                        class="form-control  @error('pos') is-invalid
                @enderror" id="pos"
                        value="{{ old('pos') }}">
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
                    <textarea class="form-control" placeholder="Leave a comment here" id="alamat" name="alamat" style="height: 100px">{{ old('alamat') }}</textarea>
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
        document.addEventListener('DOMContentLoaded', function() {
            // Set the initial value of city_name based on selected option
            var selectedCity = document.getElementById('city');
            if (selectedCity.selectedIndex > 0) {
                var cityName = selectedCity.options[selectedCity.selectedIndex].getAttribute('data-city-name');
                document.getElementById('city_name').value = cityName;
            }

            // Update city_name when the selection changes
            selectedCity.addEventListener('change', function() {
                var selectedOption = this.options[this.selectedIndex];
                var cityName = selectedOption.getAttribute('data-city-name');
                document.getElementById('city_name').value = cityName;
            });
        });
    </script>
@endsection
