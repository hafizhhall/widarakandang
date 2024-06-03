@extends('layouts.main')
@section('content')
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

    <div class="container-xxl">
        <div class="container">
            <div class="container-fluid py-5">
                @php
                    $total = 0;
                @endphp
                @include('sweetalert::alert')
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
                                            <img src="{{ asset('storage/' . $cart->katalog->gambar) }}" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="" alt="">
                                        </div>
                                    </th>
                                    <td>
                                        <p class="mb-0 mt-4">{{ $cart->katalog->title }}</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 mt-4">Rp{{ number_format($cart->katalog->harga, 0, ',', '.') }}</p>
                                    </td>
                                    <td>
                                        <div class="input-group mt-4 quantity" style="width: 150px;">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-minus rounded-circle bg-light border" data-item="{{ $cart->id }}">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                            <input type="number" name="qty" class="form-control form-control-sm text-center border-0 quantity" data-item="{{ $cart->id }}" value="{{ $cart->qty }}">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-plus rounded-circle bg-light border" data-item="{{ $cart->id }}">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>

                                    </td>
                                    <td>
                                        <p class="mb-0 mt-4">Rp {{ number_format($cart->katalog->harga * $cart->qty, 0, ',', '.') }}</p>
                                    </td>
                                    <td>
                                        <form action="{{ route('chart.destroy', $cart->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-md rounded-circle bg-light border mt-4" >
                                                <i class="fa fa-times text-danger"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @php
                                    $total += ($cart->katalog->harga * $cart->qty);
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row g-4 justify-content-end mt-5">
                        <div class="col-8"></div>
                        <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                            <div class="bg-light rounded-3">
                                <div class="p-4">
                                    <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                                    <div class="d-flex justify-content-between mb-4">
                                        <h5 class="mb-0 me-4">Subtotal:</h5>
                                        <p class="mb-0">Rp{{ number_format($total, 0, ',', '.') }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <h5 class="mb-0 me-4">Shipping</h5>
                                        <div class="">
                                            <p class="mb-0">Flat rate: $3.00</p>
                                        </div>
                                    </div>
                                    <p class="mb-0 text-end">Shipping to Ukraine.</p>
                                </div>
                                <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                                    <h5 class="mb-0 ps-4 me-4">Total</h5>
                                    <p class="mb-0 pe-4">Rp{{ number_format($total, 0, ',', '.') }}</p>
                                </div>
                                <form action="/checkout" method="post">
                                    @csrf
                                    <input type="hidden" name="total" value="{{ $total }}">
                                    <button class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="submit">Beli</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        const updateQuantity = function(element, newQty) {
            const id = element.getAttribute('data-item');
            axios.patch(`/chart/${id}`, {
                quantity: newQty,
                id: id
            })
            .then(function(response){
                window.location.href = '/chart';
            })
            .catch(function(error){
                console.log(error);
            });
        };

        const classname = document.querySelectorAll('.quantity');
        Array.from(classname).forEach(function(element){
            element.addEventListener('change', function(){
                updateQuantity(element, this.value);
            });
        });

        const btnMinus = document.querySelectorAll('.btn-minus');
        const btnPlus = document.querySelectorAll('.btn-plus');

        Array.from(btnMinus).forEach(function(button) {
            button.addEventListener('click', function() {
                const input = button.nextElementSibling;
                let currentQty = parseInt(input.value);
                if (currentQty > 1) {
                    input.value = currentQty - 1;
                    updateQuantity(input, input.value);
                }
            });
        });

        Array.from(btnPlus).forEach(function(button) {
            button.addEventListener('click', function() {
                const input = button.previousElementSibling;
                let currentQty = parseInt(input.value);
                input.value = currentQty + 1;
                updateQuantity(input, input.value);
            });
        });
    });
</script>
@endpush



