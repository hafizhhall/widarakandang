<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Invoice #6</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        span,
        label {
            font-family: sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }

        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }

        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }

        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }

        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }

        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }

        .text-end {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }

        .no-border {
            border: 1px solid #fff !important;
        }

        .bg-blue {
            background-color: #339949;
            color: #fff;
        }
    </style>
</head>

<body>
    @php
        $subTotal = 0;
    @endphp
    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2" style="text-align: center;">
                    <img src="{{ public_path('img/logoHitam.png') }}" alt="logo" style="width: 250px; height: auto; display: block; margin: 0 auto;">
                </th>
                <th width="50%" colspan="2" class="text-end company-data">
                    <span>Invoice : {{ $transaction->invoice }}</span> <br>
                    <span>Date : {{ $transaction->created_at }}</span> <br>
                    <span>Kode pos : 55165</span> <br>
                    <span>Address : Jl. Hibrida No.10, Muja Muju, Kec. Umbulharjo, Kota Yogyakarta, Daerah Istimewa Yogyakarta</span> <br>
                </th>
            </tr>
            <tr class="bg-blue">
                <th width="50%" colspan="2">Detail pembelian</th>
                <th width="50%" colspan="2">Detail pengiriman</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Order Id:</td>
                <td>{{ $transaction->id }}</td>

                <td>Nama lengkap:</td>
                <td>{{ $transaction->user->name }}</td>
            </tr>
            <tr>
                <td>Status pesanan:</td>
                <td>{{ $transaction->status_pesanan }}</td>

                <td>Email:</td>
                <td>{{ $transaction->user->email }}</td>
            </tr>
            <tr>
                <td>Tanggal pesan:</td>
                <td>{{ $transaction->created_at }}</td>

                <td>Nomor telepon:</td>
                <td>{{ $transaction->user->no_telep }}</td>
            </tr>
            <tr>
                <td>Ongkos kirim: </td>
                <td>{{ $transaction->ongkir }}</td>

                <td>Alamat:</td>
                <td>{{ $transaction->user->alamat  }}</td>
            </tr>
        </tbody>
    </table>

    <table class="order-details">
        <thead>
            <tr class="bg-blue">
                <th widht="100%" colspan="4">Detail pengiriman</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Resi:</td>
                <td>{{ $transaction->resi }}</td>

                <td>Berat total:</td>
                <td>{{ $transaction->berat/1000 }} kg</td>
            </tr>
            <tr>
                <td>Kurir:</td>
                <td>{{ $transaction->kurir }}</td>

                <td>Layanan:</td>
                <td>{{ $transaction->layanan }}</td>
            </tr>
            <tr>
                <td>Estimasi:</td>
                <td>{{ $transaction->estimasi }} hari</td>

                <td>Kota tujuan:</td>
                <td>{{ $transaction->city_name }}</td>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5">
                    Order Items
                </th>
            </tr>
            <tr class="bg-blue">
                <th>ID</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($details as $detail)
            <tr>
                <td width="10%">{{ $loop->iteration }}</td>
                <td>
                    {{ $detail->katalog->title }}
                </td>
                <td width="10%">Rp{{ number_format($detail->harga_anggrek, 0, ',', '.') }}</td>
                <td width="10%">{{ $detail->qty }}</td>
                <td width="15%" class="fw-bold">Rp{{ number_format($detail->sub_total, 0, ',', '.') }}</td>
            </tr>
            @php
                $subTotal += $detail->harga_anggrek * $detail->qty;
            @endphp
            @endforeach
            <tr>
                <td colspan="4" class="total-heading">Subtotal belanja  :</td>
                <td colspan="1" class="total-heading">Rp{{ number_format($subTotal, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td colspan="4" class="total-heading">Ongkos kirim  :</td>
                <td colspan="1" class="total-heading">Rp{{ number_format($transaction->ongkir, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td colspan="4" class="total-heading">Total :</td>
                <td colspan="1" class="total-heading">Rp{{ number_format($transaction->total, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    <br>
    <p class="text-center">
        Terima kasih sudah membeli anggrek di Kebun Anggrek Widarakandang
    </p>

</body>

</html>
