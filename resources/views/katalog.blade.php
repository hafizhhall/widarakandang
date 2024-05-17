
@extends('layouts.main')

@section('container')
<link rel="stylesheet" href="/css/home.css">

{{-- Simulasi Card --}}
<div class="container-fluid my-5">
    <h1 class="text-center fw-bold display-1">Katalog <span class="text-primary">Anggrek</span></h1>
    <div class="row justify-content-center mt-5">
        <div class="col-md-12">
            <form action="/katalog">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari anggrek..." name="search" value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit" id="">Cari</button>
                  </div>
            </form>
        </div>
    </div>
    <div class="row mt-0" id="katalog">
        <div class="owl-carousel owl-theme">
            @foreach ($jenis as $j)
            <div class="item mt-4">
                <div class="card">
                    <div class="card-body">
                        {{-- <a class="nav-link active" aria-current="page" href="{{ route('jenis.katalog', $j->slug ) }}#katalog"><h4>{{ $j->name }}</h4></a> --}}
                        <a class="nav-link active" href="/jenis/{{ $j->slug }}"><h4>{{ $j->name }}</h4></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
{{-- pencarian --}}

{{-- card --}}
<div class="row row-cols-md-3 row-cols-2 mt-0">
    @foreach ($katalog_anggrek as $k)
        <div class="col mb-4">
            <a href="/katalog/{{ $k->slug }}" class="no-underline">
            <div class="card">
                <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0, 0, 0, 0.7)">{{ $k->status }}</div>
                <img src="{{ asset('storage/' . $k->gambar) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h4 class="card-title">{{ $k->title }}</h4>
                    <p class="card-text">{{ $k->excerpt }}</p>
                </div>
                <div class="mb-2 d-flex justify-content-around card-body">
                    <h3>Rp{{ number_format($k->harga,0,',','.') }}</h3>
                    <button class="btn btn-primary px-5">Beli</button>
                </div>
            </a>
            </div>
        </div>
        @endforeach
</div>
<div class="row">
    <div class="col-md-12">
        {{ $katalog_anggrek->links() }}
    </div>
</div>
@endsection

