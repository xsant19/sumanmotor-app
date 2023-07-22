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
    <h1>Laporan Order</h1>
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
            <tr>
                <td rowspan="3"></td>
                <td rowspan="3">ORD001</td>
                <td rowspan="3">2023-07-22</td>
                <td>Pengiriman</td>
                <td>Pengiriman</td>
                <td>200.000</td>
                <td rowspan="3">400.000</td>
            </tr>
            <tr>
                <td>Pengepakan</td>
                <td>Pengepakan</td>
                <td>50.000</td>
            </tr>
            <tr>
                <td>Paket</td>
                <td>TEST</td>
                <td>150.000</td>
            </tr>
            <!-- Tambahkan data dari tabel order sesuai dengan kebutuhan -->
        </tbody>
    </table>
    <br>
    <!-- Total Pendapatan -->
    <h3>Total Pendapatan: Rp 700.000</h3>
    <!-- Ganti angka di atas dengan total pendapatan yang sesuai dari semua total order -->

</body>

</html>
