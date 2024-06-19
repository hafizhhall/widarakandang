@extends('dashboard.layouts.main')
@push('css')
    <link href="{{ asset('vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('/vendor/izitoast/css/iziToast.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.49.1/apexcharts.min.css"
        integrity="sha512-LJwWs3xMbOQNFpWVlpR0Dv3ND8TQgLzvBJsfjMcPKax6VJQ8p9WnQvB5J5Lb9/0D31cbnNsh9x5Lz6+mzxgw1g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('javascript')
    <script>
        var options = {
            series: [{
                name: "Total Transaksi ",
                data: @json($dataTotalTransaksi)
            }],
            chart: {
                height: 285,
                type: 'area',
                zoom: {
                    enabled: true
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            title: {
                text: 'Total penjualan tahun ini',
                align: 'left'
            },
            grid: {
                row: {
                    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
                },
            },
            xaxis: {
                categories: @json($dataBulan),
            },
            yaxis: {
                labels: {
                    formatter: function(value) {
                        return value.toLocaleString("id-ID", {
                            style: "currency",
                            currency: "IDR",
                            minimumFractionDigits: 0,
                            maximumFractionDigits: 0
                        });
                    }
                },
            },
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>
@endsection
@section('content')
    <style>
        .jual {
            color: azure
        }
    </style>
    <div class="main-content">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Penjualan Bulanan
                    </div>
                    <div class="card-body">
                        <div id="chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="card bg-primary">
                        <div class="card-body jual">
                            <h3 class="card-title">Pemasukan Bulan Ini</h3>
                            <h5 class="card-text">Rp{{ number_format($transactionByMonth, 0, ',', '.') }}</h5>
                            <p>Angka diatas merupakan total transaksi pada bulan {{ $bulanini }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card bg-primary">
                        <div class="card-body jual">
                            <h3 class="card-title">Pemasukan keseluruhan</h3>
                            <h5 class="card-text">Rp{{ number_format($totalPendapatan, 0, ',', '.') }}</h5>
                            <p>Angka diatas merupakan total transaksi secara keseluruhan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Anggrek masuk bulan ini
                    </div>
                    <div class="card-body">
                        {!! $inventorychart->container() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="card bg-success">
                        <div class="card-body jual">
                            <h3 class="card-title">Total Anggrek</h3>
                            <h5 class="card-text">{{ $totalJumlahAnggrek }}</h5>
                            <p>Total anggrek yang berada di kebun dan siap dijual belikan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Anggrek masuk bulan ini
                    </div>
                    <div class="card-body">
                        {!! $inventoryentry->container()!!}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="card bg-pink">
                        <div class="card-body jual">
                            <h3 class="card-title">Total Masuk bulan ini</h3>
                            <h5 class="card-text">{{ $entryByMonth }}</h5>
                            <p>Angka diatas merupakan total anggrek masuk pada bulan {{ $bulanini }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Total anggrek by supplier
                    </div>
                    <div class="card-body">
                        {!! $supplierChart->container()!!}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">

                </div>
            </div>
        </div>
    </div>

    <script src="{{ $inventorychart->cdn() }}"></script>
    {{ $inventorychart->script() }}
    <script src="{{ $inventoryentry->cdn() }}"></script>
    {{ $inventoryentry->script() }}
    <script src="{{ $supplierChart->cdn() }}"></script>
    {{ $supplierChart->script() }}
@endsection
@push('js')
    <script src="{{ asset('assets/js/pages/index.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.49.1/apexcharts.min.js"
        integrity="sha512-qiVW4rNFHFQm0jHli5vkdEwP4GPSzCSp85J7JRHdgzuuaTg31tTMC8+AHdEC5cmyMFDByX639todnt6cxEc1lQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush
