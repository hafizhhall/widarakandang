@extends('layouts.main')
@section('content')
    <style>
        h1,
        h2,
        h3,
        h4,
        h5 {
            font-family: poppins;
        }

        .shipping_address_id {
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .shipping_address_id.selected {
            border: 2px solid #007bff;
            background-color: #f0f8ff;
        }
    </style>
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-3 animated slideInDown">Belanjaan Anda</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-body" href="/">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-body" href="/katalog">Chart</a></li>
                </ol>
            </nav>
        </div>
    </div>
    @include('sweetalert::alert')
    <div class="container-xxl">
        <div class="container">
            <div class="container-fluid py-5">
                @php
                    $total = 0;
                    $totalBerat = 0;
                @endphp
                <div class="container py-5">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Products</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($charts as $cart)
                                    <tr>
                                        <th scope="row">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('storage/' . $cart->katalog->gambar) }}"
                                                    class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;"
                                                    alt="" alt="">
                                            </div>
                                        </th>
                                        <td>
                                            <p class="mb-0 mt-4">{{ $cart->katalog->title }}</p>
                                        </td>
                                        <td>
                                            <p class="mb-0 mt-4">Rp{{ number_format($cart->katalog->harga, 0, ',', '.') }}
                                            </p>
                                        </td>
                                        <td>
                                            <div class="input-group mt-4 quantity" style="width: 150px;">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-sm btn-minus rounded-circle bg-light border"
                                                        data-item="{{ $cart->id }}">
                                                        <i class="fa fa-minus"></i>
                                                    </button>
                                                </div>
                                                <input type="number" name="qty"
                                                    class="form-control form-control-sm text-center border-0 quantity"
                                                    data-item="{{ $cart->id }}" value="{{ $cart->qty }}">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-sm btn-plus rounded-circle bg-light border"
                                                        data-item="{{ $cart->id }}">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>

                                        </td>
                                        <td>
                                            <p class="mb-0 mt-4">Rp
                                                {{ number_format($cart->katalog->harga * $cart->qty, 0, ',', '.') }}</p>
                                        </td>
                                        <td>
                                            <form action="{{ route('chart.destroy', $cart->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-md rounded-circle bg-light border mt-4">
                                                    <i class="fa fa-times text-danger"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @php
                                        $total += $cart->katalog->harga * $cart->qty;
                                        $totalBerat += $cart->katalog->berat * $cart->qty;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-8">
                            <h5>Pilih alamat pengiriman</h5>
                            <div class="row d-flex">
                                <form action="{{ route('chart.updateShippingAddress') }}" method="POST">
                                    @csrf
                                    @foreach ($address as $alamat)
                                        <div class="col-md-12 mt-2">
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
                                            <textarea name="new_alamat" id="new_alamat" cols="30" rows="3" class="form-control">
@if (old('new_alamat'))
{{ old('new_alamat') }}
@endif
</textarea>
                                            @error('new_alamat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-primary mt-3">Simpan Alamat
                                                Pengiriman</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="bg-light rounded-3">
                                <div class="p-4">
                                    <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                                    <div class="d-flex justify-content-between mb-4">
                                        <h5 class="mb-0 me-4">Subtotal:</h5>
                                        <p class="mb-0">Rp{{ number_format($total, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                                <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                                    <h5 class="mb-0 ps-4 me-4">Total</h5>
                                    <p class="mb-0 pe-4">Rp{{ number_format($total, 0, ',', '.') }}</p>
                                </div>
                                <form action="/checkout" method="post">
                                    @csrf
                                    <input type="hidden" name="totalBerat" value="{{ $totalBerat }}">
                                    <input type="hidden" name="total" value="{{ $total }}">
                                    <input type="hidden" name="shipping_address_id" id="selected_shipping_address_id">
                                    <input type="hidden" name="courier_code" id="selected_courier_code">
                                    <button
                                        class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4"
                                        type="submit">Checkout</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="mt-3">
                                <h5>Pilih kurir pengiriman</h5>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input courier-code" type="radio" name="courier_code"
                                        id="courier_jne" value="jne">
                                    <label for="inlineRadio1" class="form-check-label">JNE</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input courier-code" type="radio" name="courier_code"
                                        id="courier_tiki" value="tiki">
                                    <label for="inlineRadio1" class="form-check-label">TIKI</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input courier-code" type="radio" name="courier_code"
                                        id="courier_pos" value="pos">
                                    <label for="inlineRadio1" class="form-check-label">POS</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            const updateQuantity = function(element, newQty) {
                const id = element.getAttribute('data-item');
                axios.patch(`/chart/${id}`, {
                        quantity: newQty,
                        id: id
                    })
                    .then(function(response) {
                        window.location.href = '/chart';
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            };

            const classname = document.querySelectorAll('.quantity');
            Array.from(classname).forEach(function(element) {
                element.addEventListener('change', function() {
                    updateQuantity(element, this.value);
                });
            });

            // alamat
            const newAddressRadio = document.getElementById('new_address');
            const newAddressForm = document.getElementById('new_address_form');
            newAddressRadio.addEventListener('change', function() {
                if (newAddressRadio.checked) {
                    newAddressForm.style.display = 'block';
                }
            });

            const existingAddressRadios = document.querySelectorAll(
                'input[name="shipping_address_id"]:not(#new_address)');
            existingAddressRadios.forEach(function(radio) {
                radio.addEventListener('change', function() {
                    if (radio.checked) {
                        newAddressForm.style.display = 'none';
                    }
                });
            });
            // Update hidden city name input when a city is selected
            const citySelect = document.getElementById('city');
            const cityNameInput = document.getElementById('city_name');

            citySelect.addEventListener('change', function() {
                const selectedOption = citySelect.options[citySelect.selectedIndex];
                cityNameInput.value = selectedOption.dataset.cityName;
            });

            // Update hidden shipping address id input when a shipping address is selected
            const shippingAddressRadios = document.querySelectorAll('input[name="shipping_address_id"]');
            const courierRadios = document.querySelectorAll('input[name="courier_code"]');
            const selectedShippingAddressIdInput = document.getElementById('selected_shipping_address_id');
            const selectedCourierCode = document.getElementById('selected_courier_code');

            shippingAddressRadios.forEach(function(radio) {
                radio.addEventListener('change', function() {
                    if (radio.checked) {
                        selectedShippingAddressIdInput.value = radio.value;
                    }
                });
            });
            courierRadios.forEach(function(radio) {
                radio.addEventListener('change', function() {
                    if (radio.checked) {
                        selectedCourierCode.value = radio.value;
                    }
                });
            });

            // $('.courier-code').on('click', function() {
            //     let courier = $(this).val();
            //     let addressID = $('.delivery-address:checked').val();

            //     $.ajax({
            //         url: "/chart/shipping_fee",
            //         method: 'POST',
            //         data: {
            //             address_id: addressID,
            //             courier: courier,
            //             _token: $('meta[name="csrf-token"]').attr('content')
            //         },
            //         success: function(result){
            //             $('.available-service').show();
            //             $('.available-service').html(result);
            //         },
            //         error: function(e){
            //             console.log(e);
            //         }
            //     });
            // });
        });

        document.getElementById('city').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var cityName = selectedOption.getAttribute('data-city-name');
            document.getElementById('city_name').value = cityName;
        });
    </script>
@endsection
@push('js')
    <script>
        $(function() {

        });
    </script>
@endpush
