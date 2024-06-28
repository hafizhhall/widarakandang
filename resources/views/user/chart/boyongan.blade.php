<div class="row g-4 justify-content-end mt-5">
    <div class="col-md-8">
        <h5>Pilih alamat pengiriman</h5>
        <div class="row">
            <form action="{{ route('chart.updateShippingAddress') }}" method="POST">
                @csrf
                @foreach ($address as $alamat)
                    <div class="col-md-6 mt-2">
                        <div class="card p-3">
                            <address>
                                <input class="form-check-input delivery-address" type="radio"
                                    name="shipping_address_id" value="{{ $alamat->id }}"
                                    id="address_{{ $alamat->id }}">
                                <label class="form-check-label" for="address_{{ $alamat->id }}">
                                    <strong>{{ $alamat->name }}</strong>
                                    <br>
                                    {{ $alamat->alamat }}
                                    <br>
                                    {{ $alamat->city_name }}
                                    <br>
                                    {{ $alamat->pos }}
                                    <br>
                                    {{ $alamat->phone }}
                                </label>
                            </address>
                        </div>
                    </div>
                @endforeach
                <div class="form-check mt-4 ">
                    <input class="form-check-input" type="radio" name="shipping_address_id"
                        value="new" id="new_address">
                    <label class="form-check-label" for="new_address" style="font-weight: 900">Buat
                        alamat
                        baru</label>
                </div>
                <div id="new_address_form" style="display: none;">
                    <div class="mt-4">
                        <label for="new_name" class="form-label">Nama Lengkap</label>
                        <input type="text"
                            name="new_name"class="form-control @error('new_name')
                        @enderror"
                            placeholder="" value="{{ old('new_name') }}">
                        @error('new_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="new_phone" class="form-label">Nomor telepon</label>
                        <input type="text"
                            name="new_phone"class="form-control @error('new_phone')
                            is-invalid
                        @enderror"
                            placeholder="" value="{{ old('new_phone') }}">
                        @error('new_phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="city" class="form-label">Kota atau Kabupaten</label>
                        <select name="city" id="city"
                            class="form-select @error('city') is-invalid @enderror"
                            aria-label="pilih kota asal!">
                            <option value="">Pilih kota
                                asal anda</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city['city_id'] }}"
                                    data-city-name="{{ $city['city_name'] }}">
                                    {{ $city['city_name'] }}
                                </option>
                            @endforeach
                        </select>
                        <input type="hidden" name="city_name" id="city_name" value="">
                        @error('city')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="new_pos" class="form-label">Kode POS</label>
                        <input type="text" name="new_pos"
                            class="form-control @error('new_pos')
                            is-invalid
                        @enderror"placeholder=""
                            value="{{ old('new_pos') }}">
                        @error('new_pos')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="new_alamat" class="form-label">Alamat lengkap</label>
                        <textarea name="new_alamat" id="new_alamat" cols="30" rows="3" class="form-control">@if(old('new_alamat')){{ old('new_alamat') }}@endif</textarea>
                        @error('new_alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary mt-3">Simpan Alamat
                            Pengiriman</button>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="mt-3">
            <h5>Pilih kurir pengiriman</h5>
            <div class="form-check form-check-inline">
                <input class="form-check-input courier-code" type="radio" name="courier_code" id="courier_jne" value="jne">
                <label for="inlineRadio1" class="form-check-label">JNE</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input courier-code" type="radio" name="courier_code" id="courier_tiki" value="tiki">
                <label for="inlineRadio1" class="form-check-label">TIKI</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input courier-code" type="radio" name="courier_code" id="courier_pos" value="pos">
                <label for="inlineRadio1" class="form-check-label">POS</label>
            </div>
        </div>
    </div>
</div>
