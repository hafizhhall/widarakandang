@extends('layouts.main')

@section('content')
    <div class="row justify-content-center container-xxl py-5">
        <div class="col-md-4">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
    </div>

    <main class="container py-5 form-signin w-25 m-auto mt-5">
        <form action="/login" method="post">
            <h1 class="h3 mb-3 fw-normal text-center">Silakan Masuk</h1>
            @include('sweetalert::alert')
            @csrf
            <div class="form-floating">
                <input type="email" name="email"
                    class="form-control @error('email')
            is-invalid
        @enderror" id="email"
                    placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                <label for="email">Email address</label>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>
            <div class="form-check text-start my-2">
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
        </form>
        <small class="d-block text-center">Belum punya akun? <a href="/register">Daftar Sekarang!</a>
        </small>
    </main>
@endsection
