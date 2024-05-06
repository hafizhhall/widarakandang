@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-5">
        <main class="form-signin m-auto">
            <form action="/register" method="post">
                @csrf
              <img class="mb-4" src="/img/logoHitam.png" alt="" width="100%" >
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

@endsection
