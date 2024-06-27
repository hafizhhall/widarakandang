@extends('dashboard.layouts.main')

@section('content')
    @php
        $totalBerat = 0;
        $total = 0;
    @endphp
    <div class="main-content">
        <div class="content-wrapper">
            <div class="row same-height">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                Detail item
                            </h4>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($details as $detail)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $detail->katalog->title }}</td>
                                            <td>Rp{{ number_format($detail->harga_anggrek, 0, ',', '.') }}</td>
                                            <td>{{ $detail->qty }}</td>
                                            <td>Rp{{ number_format($detail->sub_total, 0, ',', '.') }}</td>
                                        </tr>
                                        @php
                                            $totalBerat += ($detail->katalog->berat * $detail->qty)/1000;
                                            $total += $detail->harga_anggrek * $detail->qty;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="card-header">
                            <h4>
                                Detail pengiriman
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="fw-bold">Nama penerima</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $transaction->name }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="fw-bold">Resi</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $transaction->resi }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="fw-bold">Berat total</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $totalBerat }} kg</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="fw-bold">Kurir</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $transaction->kurir }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="fw-bold">Phone</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $transaction->phone}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="fw-bold">Layanan</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{ $transaction->layanan }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="fw-bold">Estimasi</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{ $transaction->estimasi }} Hari</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="fw-bold">Alamat detail</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{ $transaction->alamat }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-header">
                            <h4>
                                Detail transaksi
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="fw-bold">Invoice</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{ $transaction->invoice }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="fw-bold">Status</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{ $transaction->status }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="fw-bold">Status pesanan</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{ $transaction->status_pesanan }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="fw-bold">Sub total</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p>Rp {{ number_format($total) }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="fw-bold">Biaya kirim</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p>Rp {{ number_format($transaction->ongkir) }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="fw-bold">Total</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p>Rp {{ number_format($transaction->total) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ url('dashboard/transaction/' . $transaction->id . '/generate') }}" class="btn btn-success"><i class="ti-printer"></i> invoice</a>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
