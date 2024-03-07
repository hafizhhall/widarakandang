
@extends('layouts.main')

@section('container')
    @foreach ($katalog_anggrek as $katalogs)
    <article class="mb-5">
        <h2>
            <a href="/katalog/{{ $katalogs->id }}">{{ $katalogs->title }}</a>
        </h2>
        <h5>{{ $katalogs->jenis }}</h5>
        <h6>{{ $katalogs->harga }}</h6>
        <p>{{ $katalogs->excerpt }}</p>
    </article>
    @endforeach
@endsection


