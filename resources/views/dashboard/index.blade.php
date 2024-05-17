@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Selamat bekerja, {{ auth()->user()->name }}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
      </div>
      <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
        <svg class="bi"><use xlink:href="#calendar3"/></svg>
        This week
      </button>
    </div>
  </div>
  <h2>Summary</h2>
  <div class="table-responsive small">
    <div class="row">
        <div class="col-sm-3 mb-3 mb-sm-0">
            <div class="card">
              <div class="card-body">
                <h3 class="card-title">Total Anggrek</h3>
                <h5 class="card-text">{{ $jumlah }}</h5>
              </div>
            </div>
          </div>
      </div>
    </div>
  @endsection
