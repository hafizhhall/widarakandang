@extends('dashboard.layouts.main')
@push('css')
    <link rel="stylesheet" href="{{ asset('') }}vendor/chart.js/Chart.min.css">
    <link href="{{ asset('') }}vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="{{ asset('') }}vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
@endpush
@section('content')
    <div class="main-content">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-sm-center h-100 align-items-center">
                        <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-7 col-sm-8">
                            <div class="card shadow-lg">
                                <div class="card-body p-4">
                                    <h1 class="fs-4 text-center fw-bold mb-4">Register akun petugas</h1>
                                    <h1 class="fs-6 mb-3">Register to get more benefits!!</h1>
                                    <form method="POST" aria-label="abdul" data-id="abdul" class="needs-validation"
                                        novalidate="" autocomplete="off" action="{{ route('role.store') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="mb-2 text-muted" for="email">Full Name</label>
                                            <div class="input-group input-group-join mb-3">
                                                <input type="text" placeholder="Enter Your Name" class="form-control"
                                                    name="name" value="{{ old('name') }}" required autofocus>
                                                <span class="input-group-text rounded-end">&nbsp<i
                                                        class="fa fa-user"></i>&nbsp</span>
                                                <div class="invalid-feedback">
                                                    Name is required
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-2 text-muted" for="email">E-Mail Address</label>
                                            <div class="input-group input-group-join mb-3">
                                                <input id="email" type="email" placeholder="Enter Email"
                                                    class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required
                                                    autofocus>
                                                <span class="input-group-text rounded-end">&nbsp<i
                                                        class="fa fa-envelope"></i>&nbsp</span>
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-2 text-muted" for="no_telep">Nomor telepon</label>
                                            <div class="input-group input-group-join mb-3">
                                                <input type="text" placeholder="Enter Your Name"
                                                    class="form-control @error('no_telep') is-invalid @enderror"
                                                    name="no_telep" value="{{ old('no_telep') }}" required autofocus>
                                                <span class="input-group-text rounded-end">&nbsp<i
                                                        class="fa fa-phone"></i>&nbsp</span>
                                                @error('no_telep')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-2 text-muted" for="email">Pilih role</label>
                                            <div class="input-group input-group-join mb-3">
                                                <div class="col-md-12">
                                                    <select class="js-example-basic-single form-select form-select-sm"
                                                        name="role" required>
                                                        <option>Pilih role petugas</option>
                                                        <option value="admin">Admin</option>
                                                        <option value="pemilik">Pemilik</option>
                                                    </select>
                                                </div>
                                                <div class="invalid-feedback">
                                                    Role is invalid
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="mb-2 w-100">
                                                <label class="text-muted" for="password">Password</label>
                                            </div>
                                            <div class="input-group input-group-join mb-3">
                                                <input type="password"
                                                    class="form-control @error('password') is-invalid
                                                    @enderror"
                                                    name="password" placeholder="Your password" required>
                                                <span class="input-group-text rounded-end password cursor-pointer">&nbsp<i
                                                        class="fa fa-eye"></i>&nbsp</span>
                                                @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="mb-2 w-100">
                                                <label class="text-muted" for="password_confirmation">Confirm
                                                    Password</label>
                                            </div>
                                            <div class="input-group input-group-join mb-3">
                                                <input type="password"
                                                    class="form-control @error('password_confirm') is-invalid
                                                @enderror"
                                                    name="password_confirmation" placeholder="Confirm Your Password"
                                                    required>
                                                <span class="input-group-text rounded-end password cursor-pointer">&nbsp<i
                                                        class="fa fa-eye"></i>&nbsp</span>
                                                @error('password_confirmation')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <button type="submit" class="btn btn-primary ms-auto">
                                                Register
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const jenis = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        jenis.addEventListener('change', function() {
            fetch('/dashboard/jenis/checkSlug?name=' + jenis.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>
@endsection
@push('js')
    <script src="{{ asset('') }}vendor/chart.js/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="{{ asset('') }}assets/js/pages/index.min.js"></script>
@endpush
