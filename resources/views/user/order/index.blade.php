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
                                <th>Date</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksi as $d)
                            <tr>
                                <td>{{$loop->iteration }}</td>
                                <td>{{ $d->created_at }}</td>
                                <td>Belum dibayar</td>
                                <td>{{ $d->total }}</td>
                                <td>
                                    <a href="{{ route('order.detail', ['transactionId' => $d->id]) }}" class="btn-small d-block">View</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
