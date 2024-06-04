
@extends('layouts.main')

@section('content')
<!-- Page Header Start -->
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
<!-- Page Header End -->
@include('sweetalert::alert')
<!-- Product Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
                <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <h1 class="display-5 mb-3">Katalog Anggrek</h1>
                    <p>Anggrek Widarakandang Anggrek Sangat Berkualitas Tinggi</p>
                </div>
            </div>
            <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                    @foreach ($jenis as $j)
                    <li class="nav-item me-2">
                        <a class="btn btn-outline-primary border-2"href="/jenis/{{ $j->slug }}">{{ $j->name }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-3 form-select-lg">
                <form action="/katalog" id="searchForm">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari anggrek..." name="search" id="searchInput" value="{{ request('search') }}">
                        <button class="btn btn-primary" type="submit" id="searchButton">Cari</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="tab-content">
            <div id="tab-1" class="tab-pane fade show p-0 active">
                <div class="row g-4" id="searchResults">
                    @include('partials.result', ['katalog_anggrek => $katalog_anggrek'])
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product End -->
<script>
    $('#searchForm').on('submit', function(event) {
    event.preventDefault(); // Mencegah reload halaman

    var searchQuery = $('#searchInput').val();

    $.ajax({
        url: '/katalog',
        type: 'GET',
        data: { search: searchQuery },
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        },
        success: function(data) {
            $('#searchResults').html(data);
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error: ' + error);
        }
    });
});
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
@endsection

