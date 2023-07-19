<!DOCTYPE html>
<html>

<head>
    <title>Invoice - Suman Motor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            font-size: 11pt;
            /* Set the default font size to 11pt */
        }

        .invoice-container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
            border-bottom: 4px solid #000;
        }

        .bengkel-info {
            text-align: left;
        }

        .invoice-title {
            font-size: 32px;
            margin: 0;
        }

        .customer-order-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .info-column {
            flex-basis: 30%;
            text-align: left;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
        }

        .invoice-table th,
        .invoice-table td {
            border: 1px solid #ccc;
            padding: 10px;
        }

        .invoice-table th {
            background-color: #f2f2f2;
        }

        .invoice-total {
            text-align: right;
            font-weight: bold;
            /* Make the total harga bold */
            margin-top: 20px;
        }

        .invoice-footer {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
            position: relative;
        }

        .text-center {
            text-align: center;
        }

        .tanda-terima {
            position: absolute;
            top: 0;
            left: 20px;
        }

        .tanda-hormat {
            position: absolute;
            top: 0;
            right: 20px;
        }

        .invoice-note {
            margin-top: 10px;
            font-style: italic;
            font-size: 11pt;
            /* Set the font size to 11pt */
            text-align: left;
        }

        .invoice-column {
            flex-basis: 50%;
        }

        .invoice-header h4 {
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="invoice-container">
        <div class="invoice-header">
            <div class="bengkel-info">
                <h3>Bengkel Suman Motor</h3>
                <p>Jl. Cekomaria No.40, Peguyangan Kangin</p>
                <p>No. Telepon: 085792650620</p>
            </div>
            <h4 class="invoice-title">Invoice</h4>
        </div>
        <div class="customer-order-info">
            <div class="info-column">
                <p>Nama Pelanggan: {{ $order->user->nama }}</p>
                <p>Alamat:{{ $order->user->alamat }}</p>
                <p>Motor:{{ $order->motor->nama }}</p>
                <p>Nomor Polisi: {{ $order->motor->no_polisi }}</p>
            </div>
            <div class="info-column">
                <p>Tanggal Order: {{ $order->tanggal_order }}</p>
                <p>Nama Montir:{{ $order->montir->nama }}</p>
                <p>Nomor Orderan:{{ $order->no_order }}</p>
            </div>
        </div>
        <table class="invoice-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis Service</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->services as $service)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $service->jenis_service }}</td>
                        <td>{{ $service->deskripsi }}</td>
                        <td>{{ number_format($service->harga_service, 0, '', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3"></td>
                    <td class="invoice-total">Total: Rp {{ number_format($order->total_harga, 0, '', '.') }}</td>
                </tr>
            </tfoot>
        </table>
        <div class="invoice-footer">
            <div class="invoice-column">
                <p class="invoice-note">Kendala: {{ $order->kendala }}</p>
            </div>
        </div>
        <div class="invoice-footer">
            <p class="tanda-terima">Tanda Terima</p>
            <p class="tanda-hormat">Hormat Kami,</p>
        </div>
    </div>
</body>

</html>
