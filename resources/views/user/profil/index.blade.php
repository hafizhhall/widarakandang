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
                <h5>{{ $user->no_telep }}</h5>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3">
                <label for="no_telep" class="form-label">Tanggal lahir</label>
            </div>
            <div class="col-md-6">
                <h5>{{ $user->no_telep }}</h5>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col">
            <a class="btn btn-danger rounded-pill py-3 px-5 mt-1" href="{{ route('user.change-password') }}">Ubah password</a>
        </div>
        <div class="col">
            <a class="btn btn-primary rounded-pill py-3 px-5 mt-1" href="{{ route('user.change-profil') }}">Perbarui profil</a>
        </div>
    </div>
</div>
@endsection
