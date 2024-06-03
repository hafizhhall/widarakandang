@extends('user.index')
@section('menu')
    <main class="container py-2 form-signin w-100 m-auto">
        <form action="change-password" method="post">
            @csrf

            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
                @elseif (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <h1 class="h3 mb-3 fw-normal" style="font-family: poppins">Ubah Password</h1>
            @include('sweetalert::alert')
            <div class="mb-3">
                <label for="oldPassword" class="form-label">Password lama</label>
                <input type="password" name="old_password" id="oldPassword" class="form-control" placeholder="Password" >
            </div>
            <div class="mb-3">
                <label for="newPassword" class="form-label">Password baru</label>
                <input type="password" name="new_password" id="newPassword" class="form-control" placeholder="Password" >
            </div>
            <div class="mb-3">
                <label for="repeatPassword" class="form-label">Konfirmasi password</label>
                <input type="password" name="repeat_password" id="repeatPassword" class="form-control" placeholder="Konfirmasi password" >
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Simpan</button>
        </form>
    </main>
@endsection
