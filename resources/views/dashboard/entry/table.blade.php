@push('css')
    <link rel="stylesheet" href="{{ asset('') }}vendor/chart.js/Chart.min.css">
    <link href="{{ asset('') }}vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="{{ asset('') }}vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('') }}/vendor/izitoast/css/iziToast.min.css">
    <link rel="stylesheet" href="{{ asset('') }}vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
@endpush
<table class="table dt-responsive display" id="example2">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Anggrek</th>
            <th scope="col">Supplier</th>
            <th scope="col">User</th>
            <th scope="col">Quantity</th>
            <th scope="col" class="sorting" tabindex="0" arial-control="example" colspan="1"
                aria-label="Start date: active to sort column ascending">Date</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produkMasuk as $entry)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $entry->katalog->title }}</td>
                <td>{{ $entry->supplier->perusahaan }}</td>
                <td>{{ $entry->user->name }}</td>
                <td>{{ number_format($entry->quantity, 0, ',', '.') }}</td>
                <td>{{ $entry->date }}</td>
                <td>
                    <a href="/dashboard/entry/{{ $entry->id }}/edit" class="badge bg-warning">
                        <i class="ti-pencil-alt"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@push('js')
    <script src="{{ asset('') }}vendor/chart.js/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="{{ asset('') }}assets/js/pages/index.min.js"></script>
    <script src="{{ asset('') }}vendor/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="{{ asset('') }}vendor/izitoast/js/iziToast.min.js"></script>
    <script src="{{ asset('') }}assets/js/pages/alert.min.js"></script>
@endpush
