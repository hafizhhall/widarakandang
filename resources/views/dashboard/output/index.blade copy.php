@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Barang Keluar</h1>
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
    <a href="/dashboard/output/create" class="btn btn-primary mb-3"><i class="bi bi-plus-lg"></i> Tambah Barang Keluar</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Anggrek</th>
          <th scope="col">Quantity</th>
          <th scope="col">Sub total</th>
          <th scope="col">Harga total</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($produkKeluar as $out)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $out->katalog->title }}</td>
          <td>{{ number_format($out->quantity,0,',','.') }}</td>
          <td>{{ number_format($out->sub_keluar,0,',','.') }}</td>
          <td>Rp{{ number_format($out->harga_keluar,0,',','.') }}</td>
          <td>{{ $out->date }}</td>
          <td>
            <a href="/dashboard/out/{{ $out->id }}/edit" class="badge bg-warning">
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
