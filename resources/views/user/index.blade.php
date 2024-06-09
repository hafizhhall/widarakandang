@extends('layouts.main')
@section('content')
<style>
    h1, h2, h3, h4, h5, h6{
        font-family: poppins;
    }
</style>
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-3 animated slideInDown">User Menu</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-body" href="/">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-body" href="/katalog">Katalog</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-md-4">
                            @include('user.layouts.sidebar')
                        </div>
                        <div class="col-md-8">
                            @yield('menu')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
