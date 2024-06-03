@extends('layouts.main')

@section('content')
<div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <h1 class="display-3 mb-3 animated slideInDown">Anggrek</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a class="text-body" href="/">Home</a></li>
                <li class="breadcrumb-item"><a class="text-body" href="/katalog">Katalog</a></li>
            </ol>
        </nav>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center container-xxl py-2">
        <div class="col-md-4">
            <main class="form-signin m-auto">
                <form action="/register" method="post">
                    @csrf
                  <h1 class="h3 mb-3 fw-normal text-center">Buat Akun</h1>
                  <div class="form-floating">
                    <input type="text" name="name" class="form-control @error('name') is-invalid
                    @enderror" id="name" placeholder="Nama" required value="{{ old('name') }}">
                    <label for="name">Nama</label>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-floating">
                    <input type="email" name="email" class="form-control @error('email') is-invalid
                    @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                    <label for="email">Email address</label>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-floating">
                    <input type="password" name="password" class="form-control @error('password') is-invalid
                    @enderror" id="password" placeholder="Password" required >
                    <label for="password">Password</label>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>

                  <div class="form-check text-start my-2">

                  </div>
                  <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>

                </form>
              </main>
        </div>
    </div>
</div>

@endsection
