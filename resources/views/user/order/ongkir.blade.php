@extends('layouts.main')
@section('content')
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-3 animated slideInDown">Anggrek</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-body" href="/">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-body" href="/katalog">Katalog</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ 'Tambah Ongkir' }}</div>
                    <div class="card-body">
                        <form wire:submit.prevent="getOngkir">
                            <label for="provinsi"
                                class="col-md-12 col-form-label text-md-left">{{ 'Silahkan pilih Provinsi Anda' }}</label>
                            <select name="provinsi" wire:model="provinsi_id" class="form-control">
                                <option value="0">-Pilih Provinsi-</option>
                                @forelse ($daftarProvinsi as $p)
                                    <option value="{{ $p['province_id'] }}">{{ $p['province'] }}</option>
                                @empty
                                    <option value="0">Provinsi tidak ada</option>
                                @endforelse
                            </select>

                            <label for="kota"
                                class="col-md-12 col-form-label text-md-left">{{ 'Silahkan pilih Kota Anda' }}</label>
                            <select name="kota" wire:model="kota_id" class="form-control">
                                <option value="0">-Pilih kota-</option>
                                @forelse ($daftarKota as $k)
                                    <option value="{{ $k['city_id'] }}">{{ $k['city_name'] }}</option>
                                @empty
                                    <option value="">Pilih kabupaten atau kota</option>
                                @endforelse
                            </select>

                            <label for="jasa"
                                class="col-md-12 col-form-label text-md-left">{{ 'Jasa pengiriman' }}</label>

                            <select name="jasa" wire:model="jasa">
                                <option value="">-Pilih kurir-</option>
                                <option value="jne">JNE</option>
                                <option value="pos">POS</option>
                                <option value="tiki">TIKI</option>
                            </select>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
