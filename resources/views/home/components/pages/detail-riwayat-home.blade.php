@extends('home.layout-user')
@section('title', 'Detail Riwayat')
@section('content_dashboard')
    <div class="container mx-auto px-3 py-1">
        <div class="py-1 pb-2 mb-0 bg-white rounded-t-2xl flex justify-between">
            <h1 class="text-2xl font-bold mb-4">Detail Riwayat Service</h1>
            <button type="button"
                class="mr-0 inline-block px-2 py-1 md:px-6 md:py-3 font-bold text-center bg-gradient-to-tl from-blue-600 to-cyan-400 uppercase align-middle transition-all rounded-lg cursor-pointer leading-pro text-xs md:text-sm ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs text-white">
                <a href="{{ route('riwayats.indexUser') }}">Kembali</a>
            </button>
        </div>
        <div class="bg-white shadow-md rounded-lg overflow-hidden mt-4">
            <div class="px-6 py-4">
                <h2 class="text-xl font-semibold mb-2">Informasi Pelanggan & Order</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <p class="mb-2"><span class="font-semibold">Motor:</span>
                            {{ $order->motor->nama }}</p>
                        <p class="mb-2"><span class="font-semibold">Merk Motor:</span>
                            {{ $order->motor->merk_motor }}</p>
                        <p class="mb-2"><span class="font-semibold">Nomor Polisi:</span>
                            {{ $order->motor->no_polisi }}</p>
                        <p class="mb-2"><span class="font-semibold">No Antri :</span> {{ $order->no_antri }}
                        </p>
                    </div>
                    <div>
                        <p class="mb-2"><span class="font-semibold">Tanggal Order:</span>
                            {{ $order->tanggal_order }}</p>
                        <p class="mb-2"><span class="font-semibold">Nama Montir :</span>
                            {{ $order->montir->nama ?? 'Belum ditentukan' }}
                        </p>
                        <p class="mb-2"><span class="font-semibold">Nomor Orderan:</span>
                            {{ $order->no_order }}
                        </p>
                        <p class="mb-2"><span class="font-semibold">Status Order:</span>
                            {{ $order->status_order }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6">
            <h2 class="text-xl font-semibold mb-4">Tabel Detail Service</h2>
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 bg-gray-100">Nomor</th>
                                <th class="px-4 py-2 bg-gray-100">Jenis Service</th>
                                <th class="px-4 py-2 bg-gray-100">Deskripsi</th>
                                <th class="px-4 py-2 bg-gray-100">Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->services as $service)
                                <tr>
                                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-2">{{ $service->jenis_service }}</td>
                                    <td class="px-4 py-2">{{ $service->deskripsi }}</td>
                                    <td class="px-4 py-2">{{ number_format($service->harga_service, 0, '', '.') }}
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="3" class="px-4 py-2 font-semibold text-right">Total</td>
                                <td class="px-4 py-2 font-semibold">Rp
                                    {{ number_format($order->total_harga, 0, '', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="mt-6">
            <p class="text-gray-600 mb-2"><span class="font-semibold">Kendala dari Motor :</span>
                {{ $order->kendala }}</p>
            <p class="text-gray-600 text-sm">Note: Informasi kendala dari motor akan berubah seiring pengecekan.</p>
        </div>
    </div>
@endsection
