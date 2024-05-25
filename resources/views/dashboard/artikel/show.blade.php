@extends('dashboard.layouts.main')
@section('content')
    <div class="main-content">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                    <div class="row mt-5 mb-5">
                        <div class="col-md-6 mb-5">
                            <img src="{{ asset('storage/' . $artikel->gambar) }}" class="img-fluid" alt="">
                        </div>
                        <div class="col-md-6">
                            {{-- <p style="opacity: 40%"><a href="/#blog" style="text-decoration: none">Home</a> / {{ $artikel->kategori->nama }}</p> --}}
                            <h1>{{ $artikel->title }}</h1>
                            <p style="opacity: 50%" class="text-info">{{ $artikel->user->name }}</p>
                            <p style="text-align: justify" class="mt-4">{!! $artikel->body !!}</p>
                            <div class="d-flex flex-row justify-content-end">
                                <i class="fa fa-calendar me-2"></i>
                                <span style="opacity: 50%">{{ $artikel->created_at->format('d-m-Y') }}</span>
                            </div>
                            <a href="/dashboard/artikel" class="btn btn-success"><i class="ti-back-left"></i>
                                kembali</a>
                            <a href="/dashboard/artikel/{{ $artikel->slug }}/edit" class="btn btn-warning"><i
                                    class="ti-pencil-alt2"></i> Ubah</a>
                            <form action="/dashboard/artikel/{{ $artikel->slug }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger border-0" onclick="return confirm('Yaqqiienn Dexckk???')">
                                    <i class="ti-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('container')
    <article>

    </article>
@endsection
