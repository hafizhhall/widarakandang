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
                            <tr>
                                <td>#1357</td>
                                <td>March 45, 2022</td>
                                <td>Processing</td>
                                <td>$125.00 for 2 item</td>
                                <td>
                                    <a href="/order/detail" class="btn-small d-block">View</a>
                                </td>
                            </tr>
                            <tr>
                                <td>#2468</td>
                                <td>June 29, 2022</td>
                                <td>Completed</td>
                                <td>$364.00 for 5 item</td>
                                <td>
                                    <a href="#" class="btn-small d-block">View</a>
                                </td>
                            </tr>
                            <tr>
                                <td>#2366</td>
                                <td>August 02, 2022</td>
                                <td>Completed</td>
                                <td>$280.00 for 3 item</td>
                                <td>
                                    <a href="#" class="btn-small d-block">View</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
