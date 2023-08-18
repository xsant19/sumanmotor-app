<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reminder Service Kembali</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: justify;
        }

        h1 {
            color: #333;
        }

        p {
            color: #666;
            margin-bottom: 15px;
            line-height: 1.6;
        }

        .center-button {
            text-align: center;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Reminder Service</h1>
        <p>Halo Pelanggan,{{ $order->user->nama }}</p>
        <p>Reminder menurut catatan kami motor {{ $order->motor->nama }} anda telah memasuki waktu untuk service/ganti
            oli. Untuk
            menjaga kinerja dan keamanan kendaraan Anda, kami merekomendasikan Anda untuk melakukan layanan service
            kembali.</p>
        <p>Silakan kunjungi bengkel kami atau hubungi kami untuk membuat janji layanan sesuai jadwal yang paling nyaman
            bagi Anda.</p>
        <p>Terima kasih atas kepercayaan Anda kepada Suman Motor.</p>
        <div class="center-button">
            <a class="button" href="#">Rencanakan Service</a>
        </div>
    </div>
</body>

</html>
