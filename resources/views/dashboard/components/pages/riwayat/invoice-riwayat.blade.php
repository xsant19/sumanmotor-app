<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Bengkel Suman Motor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        p {
            margin-bottom: 10px;
        }

        .date {
            float: right;
        }

        .address {
            font-style: italic;
        }

        .message {
            margin-top: 20px;
        }

        .signature {
            margin-top: 40px;
            float: right;
        }

        .logo {
            width: 100px;
            height: 100px;
            margin-bottom: 20px;
        }

        .footer {
            margin-top: 40px;
            text-align: center;
        }

        .highlight {
            background-color: #f1f1f1;
            padding: 5px;
            border-radius: 5px;
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
    </style>
</head>

<body>
    <div class="header">
        <h1>Suman Motor</h1>
    </div>
    <div class="content">
        <p>Kepada Yth.,</p>
        <p class="address">{{ $order->user->nama }}</p>
        <p class="address">{{ $order->user->alamat }}</p>

        <div class="message">
            <p>Dengan hormat,</p>
            <p>Kami ingin memberitahukan bahwa orderan Anda telah selesai diproses dan motor Anda sudah siap untuk
                diambil di Bengkel Suman Motor.</p>
            <p class="highlight">Nomor Order: {{ $order->no_order }}</p>
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
            <p>Silakan datang ke bengkel kami dalam jam operasional untuk mengambil motor Anda. Pastikan untuk membawa
                bukti order saat Anda datang ke bengkel.</p>
            <p>Terima kasih atas kepercayaan Anda kepada Bengkel Suman Motor. Kami berharap Anda puas dengan layanan
                kami dan senang dapat membantu Anda dengan kendaraan Anda.</p>
        </div>

        <div class="signature">
            <p>Hormat kami,</p>
            <p>Suman Motor</p>
        </div>
</body>

</html>
