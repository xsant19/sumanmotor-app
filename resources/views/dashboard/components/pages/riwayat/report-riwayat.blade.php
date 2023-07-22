<!DOCTYPE html>
<html>

<head>
    <title>Laporan Order</title>
    <style>
        /* Tambahkan gaya CSS sesuai kebutuhan */
        body {
            font-family: Arial, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Laporan Order Suman Motor</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Order</th>
                <th>Tanggal Order</th>
                <th>Deskripsi</th>
                <th>Jenis Service</th>
                <th>Harga Service</th>
                <th>Total Harga Order</th>
            </tr>
        </thead>
        <tbody>
            <!-- Isi data dari tabel order -->
            @foreach ($orders as $order)
                <tr>
                    <td rowspan="{{ $order->services->count() }}">{{ $loop->iteration }}</td>
                    <td rowspan="{{ $order->services->count() }}">{{ $order->no_order }}</td>
                    <td rowspan="{{ $order->services->count() }}">{{ $order->tanggal_order }}</td>
                    <td>{{ $order->services->first()->deskripsi }}</td>
                    <td>{{ $order->services->first()->jenis_service }}</td>
                    <td>{{ number_format($order->services->first()->harga_service, 0, '', '.') }}</td>
                    <td rowspan="{{ $order->services->count() }}">{{ number_format($order->total_harga, 0, '', '.') }}
                    </td>
                </tr>
                @foreach ($order->services as $index => $service)
                    @if ($index > 0)
                        <tr>
                            <td>{{ $service->deskripsi }}</td>
                            <td>{{ $service->jenis_service }}</td>
                            <td>{{ number_format($service->harga_service, 0, '', '.') }}</td>
                        </tr>
                    @endif
                @endforeach
                <!-- Tambahkan data dari tabel order sesuai dengan kebutuhan -->
            @endforeach
        </tbody>
    </table>
    <br>
    <!-- Total Pendapatan -->
    <h3>Total Pendapatan: Rp {{ number_format($orders->sum('total_harga'), 0, '', '.') }}</h3>
    <!-- Ganti angka di atas dengan total pendapatan yang sesuai dari semua total order -->

</body>

</html>
