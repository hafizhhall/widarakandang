@extends('user.index')
@section('menu')
    <div class="container d-block">
        <div class="row mb-3">
            <div class="col">
                <h4>
                    Bio data diri
                </h4>
            </div>
        </div>
        <form action="">
            @include('sweetalert::alert')
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                </div>
                <div class="col-md-6">
                    <h5>{{ $user->name }}</h5>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="no_telep" class="form-label">Email</label>
                </div>
                <div class="col-md-6">
                    <h5>{{ $user->email }}</h5>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="no_telep" class="form-label">nomor HP</label>
                </div>
                <div class="col-md-6">
                    <h5>{{ $user->no_telep }}</h5>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="no_telep" class="form-label">Jenis kelamin</label>
                </div>
                <div class="col-md-6">
                    <h5>{{ $user->jenis_kelamin }}</h5>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="no_telep" class="form-label">Alamat</label>
                </div>
                <div class="col-md-8">
                    <h5>{{ $user->alamat }}</h5>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="no_telep" class="form-label">Kode pos</label>
                </div>
                <div class="col-md-3">
                    <h5>{{ $user->pos }}</h5>
                </div>
                <div class="col-md-3">
                    <label for="no_telep" class="form-label">kota</label>
                </div>
                <div class="col-md-3">
                    <h5>{{ $user->city_name }}</h5>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col">
                <a class="btn btn-danger rounded-pill py-3 px-5 mt-1" href="{{ route('user.change-password') }}">Ubah
                    password</a>
            </div>
            <div class="col">
                @if (is_null(auth()->user()->jenis_kelamin) || is_null(auth()->user()->no_telep))
                    <a class="btn btn-danger rounded-pill py-3 px-5 mt-1" href="{{ route('user.change-profil') }}">Lengkapi
                        profil</a>
                @else
                    <a class="btn btn-primary rounded-pill py-3 px-5 mt-1" href="{{ route('user.change-profil') }}">Perbarui
                        profil</a>
                @endif
            </div>
            <div class="col">
                @if (is_null(auth()->user()->alamat) || is_null(auth()->user()->pos))
                    <a class="btn btn-danger rounded-pill py-3 px-5 mt-1" href="{{ route('user.change-address') }}">Lengkapi
                        alamat</a>
                @else
                    <a class="btn btn-primary rounded-pill py-3 px-5 mt-1" href="{{ route('user.change-address') }}">Perbarui
                        alamat</a>
                @endif
            </div>
        </div>
    </div>
@endsection
