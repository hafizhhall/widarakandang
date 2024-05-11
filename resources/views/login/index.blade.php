@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
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

<main class="form-signin w-100 m-auto">
    <form action="/login" method="post">

      <img class="mb-4" src="/img/logoHitam.png" alt="" width="100%" >
      <h1 class="h3 mb-3 fw-normal text-center">Silakan Masuk</h1>
      @csrf
      <div class="form-floating">
        <input type="email" name="email" class="form-control @error('email')
            is-invalid
        @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
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
