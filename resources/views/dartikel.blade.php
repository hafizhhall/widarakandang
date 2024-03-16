@extends('layouts.main')

@section('container')
<article>
    <div class="row">
      <div class="col-md-6">
        <img src="/img/{{ $artikel->gambar }}" class="img-fluid" alt="Kebakaran Pasar Beringharjo">
      </div>
      <div class="col-md-6">
        <h1>{{ $artikel->title }}</h1>
        <p style="text-align: justify" class="mt-4">{{ $artikel->body }}</p>
        <div class="d-flex flex-row justify-content-end">
          <i class="fa fa-calendar me-2"></i>
          <span style="opacity: 50%">{{ $artikel->published_at }}</span>
        </div>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-md-12 text-end">
        <a href="/" class="btn btn-primary">Kembali ke Beranda</a>
      </div>
    </div>
  </article>
<br>
<br>
<br>
<br>
<br>

@endsection
