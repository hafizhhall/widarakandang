@extends('layouts.main')

@section('container')
    <h1>
        HALAMAN ABOUT
    </h1>
    <H3>
        {{ $name }}
    </H3>
    <p>
        {{ $email }}
    </p>
    <img src="img/{{ $image }}" alt="hafizh athallah" width="150" alt="{{ $name }}" class="img-thumbnail rounded-full">

@endsection

