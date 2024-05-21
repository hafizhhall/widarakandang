@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Barang Masuk</h1>
  </div>
  @if (session()->has('success'))
      <div class="alert alert-success" role="alert" id="success-alert">
        {{ session('success') }}
      </div>
  @endif
  @if (session()->has('error'))
      <div class="alert alert-danger" role="alert" id="success-alert">
        {{ session('error') }}
      </div>
  @endif
  <h2>List barang</h2>
  <div class="table-responsive small">
    <form action="/dashboard/entry/filter" method="get">
        <div class="row mb-4">
            <div class="col-md-5 d-flex align-items-end">
                <a href="/dashboard/entry/create" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Barang Masuk</a>
            </div>
            <div class="col-md-3">
                <label for="">Start Date: </label>
                <input type="date" class="form-control" name="start_date">
            </div>
            <div class="col-md-3">
                <label for="">End Date: </label>
                <input type="date" class="form-control" name="end_date">
            </div>
            <div class="col-md-1 d-flex align-items-end">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Anggrek</th>
          <th scope="col">Supplier</th>
          <th scope="col">User</th>
          <th scope="col">Quantity</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($produkMasuk as $entry)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $entry->katalog->title }}</td>
          <td>{{ $entry->supplier->perusahaan }}</td>
          <td>{{ $entry->user->name }}</td>
          <td>{{ number_format($entry->quantity,0,',','.') }}</td>
          <td>{{ $entry->date }}</td>
          <td>
            <a href="/dashboard/entry/{{ $entry->id }}/edit" class="badge bg-warning">
              <i class="bi bi-pencil-square"></i>
            </a>
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
