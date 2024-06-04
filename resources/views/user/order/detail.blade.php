@extends('user.index')
@section('menu')
    @php
        $totalBerat = 0;
    @endphp
    <div class="container">
        <h3>Rincian belanjaan anda</h3>
        <div class="table-responsive">
            <table class="table w-100" style="width: 100%">
                <thead>
                    <tr>
                        <th scope="col">Products</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details as $detail)
                        <tr>
                            <th scope="row">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('storage/' . $detail->katalog->gambar) }}"
                                        class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;"
                                        alt="" alt="">
                                </div>
                            </th>
                            <td>
                                <p class="mb-0 mt-4">{{ $detail->katalog->title }}</p>
                            </td>
                            <td>
                                <p class="mb-0 mt-4">Rp{{ number_format($detail->katalog->harga, 0, ',', '.') }}
                                </p>
                            </td>
                            <td style="text-align: center">
                                <p class="mb-0 mt-4">{{ $detail->qty }}</p>
                            </td>
                            <td>
                                <p class="mb-0 mt-4">Rp
                                    {{ number_format($detail->sub_total, 0, ',', '.') }}</p>
                            </td>
                        </tr>
                        @php
                            $totalBerat += $detail->katalog->berat * $detail->qty;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Alamat detail</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled>{{ $user->alamat }}</textarea>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Rincian pembelian</h5>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="total">Sub total</label>
                            </div>
                            <div class="col">
                                <p class="card-text">Rp{{ number_format($transaction->total, 0, ',', '.') }}</p>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="total">Biaya kirim</label>
                            </div>
                            <div class="col">
                                <p class="card-text">
                                    Rp{{ number_format($ongkir['results'][0]['costs'][0]['cost'][0]['value'], 0, ',', '.') }}
                                </p>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="total">Total</label>
                            </div>
                            <div class="col">
                                <p class="card-text" style="font-weight: bold">
                                    Rp{{ number_format($transaction->total + $ongkir['results'][0]['costs'][0]['cost'][0]['value'], 0, ',', '.') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Rincian pengiriman</h5>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="total">Dikirim dari</label>
                            </div>
                            <div class="col">
                                <p class="card-text">{{ $ongkir['origin_details']['city_name'] }}</p>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="total">Dikirim ke</label>
                            </div>
                            <div class="col">
                                <p class="card-text">{{ $ongkir['destination_details']['city_name'] }}</p>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="total">Kurir</label>
                            </div>
                            <div class="col">
                                <p class="card-text">
                                    {{ $ongkir['results'][0]['name'] }} - {{ $ongkir['results'][0]['code'] }}
                                </p>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="total">Layanan</label>
                            </div>
                            <div class="col">
                                <p class="card-text">
                                    {{ $ongkir['results'][0]['costs'][0]['service'] }}
                                </p>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="total">Berat paket</label>
                            </div>
                            <div class="col">
                                <p class="card-text">{{ number_format($ongkir['query']['weight'], 0, ',', '.') }} gr</p>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="total">Estimasi</label>
                            </div>
                            <div class="col">
                                <p class="card-text">{{ $ongkir['results'][0]['costs'][0]['cost'][0]['etd'] }} (hari)
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

        </div>
        <div class="row d-flex justify-content-end">
            <div class="col-md-2">
                <a href="/order" class="btn btn-success mt-4">Kembali</a>
            </div>
            <div class="col-md-2">
                <a href="#" class="btn btn-primary mt-4">Bayar</a>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#origin, #destination, #weight').on('change', function() {
                var origin = $('#origin').val();
                var destination = $('#destination').val();
                var weight = $('#weight').val();

                if (origin && destination && weight) {
                    $.ajax({
                        url: '/order/{transactionId}/detail',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            origin: origin,
                            destination: destination,
                            weight: weight,
                            courier: 'jne' // Pilihan default atau bisa ditambahkan dropdown untuk kurir
                        },
                        success: function(data) {
                            $('#courier').empty();
                            $('#courier').append('<option value="">Pilih kurir</option>');
                            $.each(data.results, function(index, item) {
                                $.each(item.costs, function(i, cost) {
                                    var serviceOption = '<option value="' + cost
                                        .service + '">';
                                    serviceOption += 'Nama: ' + item.name +
                                        ', ';
                                    serviceOption += 'Service: ' + cost
                                        .service + ', ';
                                    $.each(cost.cost, function(j, harga) {
                                        serviceOption += 'Harga: Rp ' +
                                            new Intl.NumberFormat(
                                                'id-ID').format(harga
                                                .value) + ' (est: ' +
                                            harga.etd + ')';
                                    });
                                    serviceOption += '</option>';
                                    $('#courier').append(serviceOption);
                                });
                            });
                        }
                    });
                }
            });
        });
    </script>
@endsection
