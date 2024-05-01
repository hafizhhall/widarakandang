
@extends('layouts.main')

@section('container')
<article>
    <h2>{{ $katalog->title }}</h2>
    {{-- <h5>{{ $katalog->jenis }}</h5> --}}
    <h6>{{ $katalog->harga }}</h6>
        {!! $katalog->body !!}
</article>

<a href="/katalog">Kembali ke Katalog</a>
@endsection
