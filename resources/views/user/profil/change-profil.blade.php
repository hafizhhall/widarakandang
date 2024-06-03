@extends('user.index')
@section('menu')
    <div class="container d-block">
        <div class="row mb-3">
            <div class="col">
                <h4 style="font-family: poppins">
                    Bio data diri
                </h4>
            </div>
        </div>
        <form action="change-profil" method="post">
            @include('sweetalert::alert')
            @csrf
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" name="name" class="form-control" placeholder="name@example.com"
                        value="{{ old('name', $user->name) }}">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="no_telep" class="form-label">Nomor telepon</label>
                    <input type="number" class="form-control" name="no_telep" placeholder="Nomor telepon"
                        value="{{ old('no_telep', $user->no_telep) }}">
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" placeholder="email"
                        value="{{ old('email', $user->email) }}">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button class="btn btn-primary w-100 py-2" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>
@endsection
