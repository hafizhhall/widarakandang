<table class="table dt-responsive display" id="example2">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Anggrek</th>
            <th scope="col">Quantity</th>
            <th scope="col">Sub total</th>
            <th scope="col">Harga total</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produkKeluar as $out)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $out->katalog->title }}</td>
                <td>{{ number_format($out->quantity, 0, ',', '.') }}</td>
                <td>{{ number_format($out->sub_keluar, 0, ',', '.') }}</td>
                <td>Rp{{ number_format($out->harga_keluar, 0, ',', '.') }}</td>
                <td>{{ $out->date }}</td>
                <td>
                    <a href="/dashboard/output/{{ $out->id }}/edit" class="badge bg-warning">
                        <i class="ti-pencil-alt"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
