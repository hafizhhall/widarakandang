@foreach ($katalog_anggrek as $k)
    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
        <div class="product-item">
            <div class="position-relative bg-light overflow-hidden">
                <img class="img-fluid w-100" src="{{ asset('storage/' . $k->gambar) }}" alt="">
                <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                    {{ $k->status }}</div>
            </div>
            <div class="text-center p-4">
                <a class="d-block h5 mb-2" href="">{{ $k->title }}</a>
                <span class="text-primary me-1">Rp{{ number_format($k->harga, 0, ',', '.') }}</span>
            </div>
            <div class="d-flex border-top">
                <small class="w-50 text-center border-end py-2">
                    <a class="text-body" href="/katalog/{{ $k->slug }}"><i
                            class="fa fa-eye text-primary me-2"></i>Detail</a>
                </small>
                <small class="w-50 text-center py-2">
                    <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Beli</a>
                </small>
            </div>
        </div>
    </div>
@endforeach
<div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
    <div class="col-md-12">
        {{ $katalog_anggrek->links() }}
    </div>
</div>
