@extends('dashboard.layouts.main')
@section('content')
    <div class="main-content">
        <div class="title"></div>
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Detail transaksi anggrek
                    </h4>
                </div>
                <div class="card-body">
                    <form method="post" action="/dashboard/transaction/{{ $transaction->id }}">
                        @method('put')
                        @csrf
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="status_pesanan" class="form-label">Status pesanan</label>
                                <select class="form-select" name="status_pesanan" autofocus>
                                    <option disabled {{ is_null($transaction->status_pesanan) ? 'selected' : '' }}>Pilih status</option>
                                    <option value="menunggu konfirmasi" {{ $transaction->status_pesanan == 'menunggu konfirmasi' ? 'selected' : '' }}>menunggu konfirmasi</option>
                                    <option value="diproses" {{ $transaction->status_pesanan == 'diproses' ? 'selected' : '' }} {{ $transaction->status == 'belum dibayar' ? 'disabled' : '' }}>diproses</option>
                                    <option value="dikirim" {{ $transaction->status_pesanan == 'dikirim' ? 'selected' : '' }} {{ $transaction->status == 'belum dibayar' ? 'disabled' : '' }}>dikirim</option>
                                    <option value="selesai" {{ $transaction->status_pesanan == 'selesai' ? 'selected' : '' }} {{ $transaction->status == 'belum dibayar' ? 'disabled' : '' }}>selesai</option>
                                    <option value="batal" {{ $transaction->status_pesanan == 'batal' ? 'selected' : '' }}>batal</option>
                                </select>
                                @error('status_pesanan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="resi" class="form-label">Resi pengiriman</label>
                                    <input type="text" class="form-control @error('resi') is-invalid @enderror"
                                        id="resi" name="resi"
                                        value="{{ old('resi', $transaction->resi) }}">
                                    @error('resi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                        </div>
                        @can('pemilik')
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="status" class="form-label">Status pesanan</label>
                                <select class="form-select" name="status" autofocus>
                                    <option disabled {{ is_null($transaction->status) ? 'selected' : '' }}>Pilih status</option>
                                    <option value="belum dibayar" {{ $transaction->status == 'belum dibayar' ? 'selected' : '' }}>Belum dibayar</option>
                                    <option value="lunas" {{ $transaction->status == 'lunas' ? 'selected' : '' }}>Lunas</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        @endcan
                        <button type="submit" class="btn btn-primary"><i class="bi bi-send-plus-fill"></i> Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
