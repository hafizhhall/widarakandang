@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My post</h1>
  </div>
  @if (session()->has('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
  @endif
  <h2>Blog Post</h2>
  <div class="table-responsive small">
    <a href="/dashboard/artikel/create" class="btn btn-primary mb-3"><i class="bi bi-plus-lg"></i> Tambah artikel</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Judul</th>
          <th scope="col">Kategori</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($artikels as $artikel)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $artikel->title }}</td>
          <td>{{ $artikel->kategori->nama }}</td>
          <td>
            <a href="/dashboard/artikel/{{ $artikel->slug }}" class="badge bg-info">
                <i class="bi bi-eye"></i>
            </a>
            <a href="/dashboard/artikel/{{ $artikel->slug }}/edit" class="badge bg-warning">
              <i class="bi bi-pencil-square"></i>
            </a>
            <form action="/dashboard/artikel/{{ $artikel->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Yaqqiienn Dexckk???')">
                    <i class="bi bi-trash3"></i>
                </button>
            </form>
          </td>

        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  @endsection
