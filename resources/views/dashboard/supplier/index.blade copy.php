@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Supplier Anggrek</h1>
  </div>
  @if (session()->has('success'))
      <div class="alert alert-success" role="alert" id="success-alert">
        {{ session('success') }}
      </div>
  @endif
  @if(session('error'))
    <div class="alert alert-danger" id="success-alert">
        {{ session('error') }}
    </div>
@endif
  <h2>Kelola Supplier</h2>
  <div class="table-responsive small">
    <a href="/dashboard/supplier/create" class="btn btn-primary mb-3"><i class="bi bi-plus-lg"></i> Tambah Supplier</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Perusahaan</th>
          <th scope="col">Penanggugn Jawab</th>
          <th scope="col">No.Telep</th>
          <th scope="col">Note</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($suppliers as $supplier)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $supplier->perusahaan }}</td>
          <td>{{ $supplier->nama }}</td>
          <td>{{ $supplier->phone }}</td>
          <td>{{ $supplier->note }}</td>
          <td>
            <a href="/dashboard/supplier/{{ $supplier->slug }}/edit" class="badge bg-warning">
              <i class="bi bi-pencil-square"></i>
            </a>
            <form action="/dashboard/supplier/{{ $supplier->slug }}" method="post" class="d-inline">
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
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Set timeout to hide the alert after 5 seconds (5000 milliseconds)
        setTimeout(function() {
            var alert = document.getElementById('success-alert');
            if (alert) {
                alert.style.transition = 'opacity 1s';
                alert.style.opacity = '0';
                setTimeout(function() {
                    alert.style.display = 'none';
                }, 200); // Time it takes for the transition to complete
            }
        }, 5000);
    });
  </script>
  @endsection
