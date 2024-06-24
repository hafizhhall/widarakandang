@extends('user.index')

@section('menu')
    <div class="" id="orders" role="tabpanel" aria-labelledby="orders-tab">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Your Orders</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Order</th>
                                <th>Invocie</th>
                                <th>pembayaran</th>
                                <th>pesanan</th>
                                <th>Total</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $currentPage = $transaksi->currentPage();
                                $perPage = $transaksi->perPage();
                            @endphp

                            @foreach ($transaksi as $index => $d)
                                <tr>
                                    <td>{{ ($currentPage - 1) * $perPage + $index + 1 }}</td>
                                    <td>{{ $d->invoice }}</td>
                                    <td style="text-align: center">
                                        {{ $d->status }}
                                    </td>
                                    <td>{{ $d->status_pesanan }}</td>
                                    <td>Rp{{ number_format($d->total, 0, ',', '.') }}</td>
                                    <td>
                                        <a href="{{ route('order.detail', ['transactionId' => $d->id]) }}"
                                            class="btn-small d-block">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                    <div class="col-md-12">
                        {{ $transaksi->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
