@extends('user.index')
@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
@endpush
@section('menu')
    @include('sweetalert::alert')
    <div class="" id="orders" role="tabpanel" aria-labelledby="orders-tab">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Alamat Tersimpan</h5>
            </div>
            <div class="card-body">
                <a href="/user/address/create" class="btn btn-primary mb-3"><i class="bi bi-plus-lg"></i>
                    Tambah Alamat</a>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Kota</th>
                                <th>Kode Pos</th>
                                <th>Phone</th>
                                <th>Alamat</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($address as $alamat)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $alamat->name }}</td>
                                    <td style="text-align: center">
                                        {{ $alamat->city_name }}
                                    </td>
                                    <td>{{ $alamat->pos }}</td>
                                    <td>{{ $alamat->phone }}</td>
                                    <td>{{ $alamat->alamat }}</td>
                                    <td>
                                        <a href="/user/address/{{ $alamat->id }}/edit" class="badge bg-warning">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        {{-- <a href="" class="badge bg-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </a> --}}
                                        <form action="/user/address/{{ $alamat->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="badge bg-danger border-0" data-confirm-delete="true"
                                                id="swall-question">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@push('js')
@endpush
