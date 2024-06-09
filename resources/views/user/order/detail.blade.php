@extends('user.index')
@push('jsMidtrans')
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
@endpush
@section('menu')
    @php
        $totalBerat = 0;
        $total = 0;
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
                                <p class="mb-0 mt-4">Rp{{ number_format($detail->harga_anggrek, 0, ',', '.') }}
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
                            $total += $detail->harga_anggrek * $detail->qty;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <h4 class="">Status pesanan dan resi</h4>
            </div>
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                      Cek status pesanan
                    </button>
                  </h2>
                  <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">{{ $transaction->status_pesanan }}</div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                      Cek resi
                    </button>
                  </h2>
                  <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body"></div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                      Alamat detail
                    </button>
                  </h2>
                  <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">{{ $user->alamat }}</div>
                  </div>
                </div>
              </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total pembelian</h5>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="total">Sub total</label>
                            </div>
                            <div class="col">
                                <p class="card-text">Rp{{ number_format($total, 0, ',', '.') }}</p>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="total">Biaya kirim</label>
                            </div>
                            <div class="col">
                                <p class="card-text">
                                    {{-- Rp{{ number_format($ongkir['results'][0]['costs'][0]['cost'][0]['value'], 0, ',', '.') }} --}}
                                    Rp{{ number_format($transaction->ongkir, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="total">Total</label>
                            </div>
                            <div class="col">
                                <p class="card-text" style="font-weight: bold">
                                    Rp{{ number_format($transaction->total, 0, ',', '.')}}
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
                                <p class="card-text">{{ $transaction->origin }}</p>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="total">Dikirim ke</label>
                            </div>
                            <div class="col">
                                <p class="card-text">{{ $transaction->city_name }}</p>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="total">Kurir</label>
                            </div>
                            <div class="col">
                                <p class="card-text">
                                    {{ $transaction->kurir }}
                                </p>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="total">Layanan</label>
                            </div>
                            <div class="col">
                                <p class="card-text">
                                    {{ $transaction->layanan }}
                                </p>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="total">Berat paket</label>
                            </div>
                            <div class="col">
                                <p class="card-text">{{ number_format($transaction->berat/1000, 0, ',', '.') }} kg</p>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="total">Estimasi</label>
                            </div>
                            <div class="col">
                                <p class="card-text">{{ $transaction->estimasi }} (hari)
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

        </div>
        <div class="row">
            <div class="col-md-3">
                <a href="/order" class="btn btn-success mt-4">Kembali</a>
            </div>
            <div class="col-md-3">
                <a class="btn btn-success mt-4" id="pay-button">Bayar sekarang</a>
            </div>
            {{-- <div class="col-md-3">
                <button class="btn btn-primary" id="pay-button">Bayar sekarnag</button>
            </div> --}}
        </div>
    </div>
    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    alert("payment success!");
                    console.log(result);
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    alert("wating your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            })
        });
    </script>
@endsection
