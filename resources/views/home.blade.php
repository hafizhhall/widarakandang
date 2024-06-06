@extends('layouts.main')

@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="/modal/img/newcrsl.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7">
                                    <h1 class="display-2 mb-5 animated slideInDown">Temukan Anggrek Terbaik Hanya di
                                        Widarakandang</h1>
                                    <a href="/katalog" class="btn btn-primary rounded-pill py-sm-3 px-sm-5">Katalog</a>
                                    <a href="#layanan"
                                        class="btn btn-secondary rounded-pill py-sm-3 px-sm-5 ms-3">Pelayanan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="carousel-item">
                <img class="w-100" src="/modal/img/carousel-2.jpg" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-lg-7">
                                <h1 class="display-2 mb-5 animated slideInDown">Natural Food Is Always Healthy</h1>
                                <a href="" class="btn btn-primary rounded-pill py-sm-3 px-sm-5">Products</a>
                                <a href="" class="btn btn-secondary rounded-pill py-sm-3 px-sm-5 ms-3">Services</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->
    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img position-relative overflow-hidden p-5 pe-0">
                        <img class="img-fluid w-100" src="modal/img/about.jpg">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="display-5 mb-4">Anggrek Terbaik dan Banyak Mengantongi Prestasi</h1>
                    <p class="mb-4">Kebun Anggrek Widarakandang adalah sebuah destinasi wisata agro yang terletak di
                        daerah Umbulharjo. Kebun ini menawarkan keindahan berbagai jenis anggrek yang dirawat dengan cermat,
                        menjadikannya tempat yang ideal bagi para pecinta tanaman dan fotografi</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Jual beli anggrek</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Sewa tanaman Anggrek</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Nutrisi tanaman anggrek</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Budidaya anggrek</p>
                    <a class="btn btn-primary rounded-pill py-3 px-5 mt-3" href="">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->
    <!-- Product Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s"
                        style="max-width: 500px;">
                        <h1 class="display-5 mb-3">Katalog Kami</h1>
                        <p>Berikut merupakan produk-produk unggulan dari Anggrek Widarakandang</p>
                    </div>
                </div>
                <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                        @foreach ($jenis as $j)
                            <li class="nav-item me-2">
                                <a class="btn btn-outline-primary border-2 active" data-bs-toggle="pill"
                                    href="/jenis/{{ $j->slug }}">{{ $j->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        @foreach ($katalog_anggrek as $k)
                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="product-item">
                                    <div class="position-relative bg-light overflow-hidden card">
                                        <img class="card-img-top" src="{{ asset('storage/' . $k->gambar) }}" alt="">
                                        <div
                                            class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                            {{ $k->status }}</div>
                                    </div>
                                    <div class="text-center p-4">
                                        <a class="d-block h5 mb-2"
                                            href="/katalog/{{ $k->slug }}">{{ $k->title }}</a>
                                        <span class="text-primary me-1">Rp{{ number_format($k->harga, 0, ',', '.') }}</span>

                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="w-50 text-center border-end py-2">
                                            <a class="text-body" href="/katalog/{{ $k->slug }}"><i
                                                    class="fa fa-eye text-primary me-2"></i>Detail</a>
                                        </small>
                                        <form action="/chart/store" method="post">
                                            @csrf
                                            <small class="w-50 text-center py-2">
                                                <input type="hidden" name="katalog_id" value="{{ $k->id }}">
                                                <input type="submit" class="btn btn-primary" value="Add to Cart">
                                                <a class="text-body" href="" type="submit"><i
                                                    class="fa fa-shopping-bag text-primary me-2"></i></a>
                                            </small>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product End -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s"
                style="max-width: 500px;">
                <h1 class="display-5 mb-3">Blog Widarakandang</h1>
                <p>Seluruh Kegiatan, Prestasi, dan Agenda WK</p>
            </div>
            <div class="row g-4">
                @foreach ($artikel as $artikels)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <img class="img-fluid" src="{{ asset('storage/' . $artikels->gambar) }}" alt="">
                        <div class="bg-light p-4">
                            <a class="d-block h5 lh-base mb-4"
                                href="dartikel/{{ $artikels->slug }}">{{ $artikels->title }}</a>
                            <div class="text-muted border-top pt-4">
                                <small class="me-3"><i class="fa fa-user text-primary me-2"></i>Admin</small>
                                <small class="me-3"><i
                                        class="fa fa-calendar text-primary me-2"></i>{{ $artikels->tanggal }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                <a class="btn btn-primary rounded-pill py-3 px-5" href="/blog">Read More</a>
            </div>
        </div>
    </div>
    <!-- Blog End -->
    <div class="container-fluid bg-light bg-icon py-6 mb-5" id="layanan">
        <div class="container">
            <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s"
                style="max-width: 500px;">
                <h1 class="display-5 mb-3">Layanan Widarakandang</h1>
                <p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item position-relative bg-white p-2 mt-4">
                    <i class="fas fa-seedling fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <div class=" text-center h-100 p-4 p-xl-5">
                        <h4 class="mb-3">Budidaya Anggrek</h4>
                        <p class="mb-4">Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed vero
                            dolor duo.</p>
                    </div>
                </div>
                <div class="testimonial-item position-relative bg-white p-2 mt-4">
                    <i class="fas fa-hands-helping fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <div class=" text-center h-100 p-4 p-xl-5">
                        <h4 class="mb-3">Sewa Anggrek</h4>
                        <p class="mb-4">Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed vero
                            dolor duo.</p>
                    </div>
                </div>
                <div class="testimonial-item position-relative bg-white p-2 mt-4">
                    <i class="fab fa-pagelines fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <div class=" text-center h-100 p-4 p-xl-5">
                        <h4 class="mb-3">Flower Arrangement</h4>
                        <p class="mb-4">Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed vero
                            dolor duo.</p>
                    </div>
                </div>
                <div class="testimonial-item position-relative bg-white p-2 mt-4">
                    <i class="fas fa-gift fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <div class=" text-center h-100 p-4 p-xl-5">
                        <h4 class="mb-3">Gift</h4>
                        <p class="mb-4">Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed vero
                            dolor duo.</p>
                    </div>
                </div>
                <div class="testimonial-item position-relative bg-white p-2 mt-4">
                    <i class="fab fa-nutritionix fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <div class=" text-center h-100 p-4 p-xl-5">
                        <h4 class="mb-3">Nutrisi Anggrek</h4>
                        <p class="mb-4">Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed vero
                            dolor duo.</p>
                    </div>
                </div>
                <div class="testimonial-item position-relative bg-white p-2 mt-4">
                    <i class="fas fa-chalkboard-teacher fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <div class=" text-center h-100 p-4 p-xl-5">
                        <h4 class="mb-3">Edukasi Anggrek</h4>
                        <p class="mb-4">Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed vero
                            dolor duo.</p>
                    </div>
                </div>
                <div class="testimonial-item position-relative bg-white p-2 mt-4">
                    <i class="fas fa-microscope fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <div class=" text-center h-100 p-4 p-xl-5">
                        <h4 class="mb-3">Pelatihan</h4>
                        <p class="mb-4">Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed vero
                            dolor duo.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
