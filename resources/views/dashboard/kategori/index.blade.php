@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Kategori Blog Post</h1>
  </div>
  @if (session()->has('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
  @endif
  <h2>Kelola Kategori</h2>
  <div class="table-responsive small">
    <a href="/dashboard/kategori/create" class="btn btn-primary mb-3"><i class="bi bi-plus-lg"></i> Tambah kategori</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Kategori</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($kategori as $k)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $k->nama }}</td>
          <td>
            <a href="" class="badge bg-warning">
              <i class="bi bi-pencil-square"></i>
            </a>
          </td>

        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  @endsection
