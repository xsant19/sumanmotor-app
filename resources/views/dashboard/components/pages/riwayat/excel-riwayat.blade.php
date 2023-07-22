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
                    <td>{{ $order->services->first()->harga_service }}</td>
                    <td rowspan="{{ $order->services->count() }}">{{ $order->total_harga }}
                    </td>
                </tr>
                @foreach ($order->services as $index => $service)
                    @if ($index > 0)
                        <tr>
                            <td>{{ $service->deskripsi }}</td>
                            <td>{{ $service->jenis_service }}</td>
                            <td>{{ $service->harga_service }}</td>
                        </tr>
                    @endif
                @endforeach
                <!-- Tambahkan data dari tabel order sesuai dengan kebutuhan -->
            @endforeach
        </tbody>
    </table>
    <br>
    <!-- Total Pendapatan -->
    <h3>Total Pendapatan: Rp {{ $orders->sum('total_harga') }}</h3>
    <!-- Ganti angka di atas dengan total pendapatan yang sesuai dari semua total order -->
