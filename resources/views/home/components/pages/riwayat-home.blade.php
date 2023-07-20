@extends('home.layout-user')
@section('title', 'Riwayat Service Order')
@section('content_dashboard')
    <div class="py-6">
        <div class="max-w-4xl mx-auto">
            <div class="w-full px-6 py-6 mx-auto">
                @if ($message = Session::get('success'))
                    <div
                        class="relative p-2 mb-3 text-sm text-white border border-solid rounded-lg bg-gradient-to-tl from-green-600 to-lime-400 border-lime-300">
                        {{ $message }}
                    </div>
                @endif
                <div class="flex flex-col md:flex-row items-center md:items-start justify-between pb-4">
                    <h2 class="text-2xl font-bold mb-1 md:mb-0">Riwayat Transaksi</h2>
                    <form action="" method="GET">
                        <div class="flex mt-4 md:mt-0">
                            <input type="text" placeholder="Cari No Order" name="search"
                                class="rounded-l-lg py-2 px-4 bg-white border border-gray-300">
                            <button
                                class="bg-blue-500 hover:bg-blue-600 text-white rounded-r-lg py-2 px-4 ml-2">Cari</button>
                        </div>
                    </form>
                </div>
                <div class="bg-white rounded-md shadow overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">No. Antri</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">No. Order</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Motor</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Tanggal Order</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Status Order</th>
                                <th class="px-6 py-3 text-center text-sm font-medium text-gray-700">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($orders as $order)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $order->no_antri }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $order->no_order }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $order->motor->nama }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $order->tanggal_order }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $order->status_order }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('riwayats.view.user', $order->id) }}"><button
                                                class="text-blue-500 hover:text-blue-700 mr-2">
                                                <i class="fas fa-eye"></i></a>
                                        </button>
                                        @if ($order->status_order == 'Selesai')
                                            <button class="text-green-500 hover:text-green-700"><a
                                                    href="{{ route('orders.export', $order->id) }}"> <i
                                                        class="fas fa-print"></i></a>
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-6"> {{ $orders->links() }}</div>
            </div>
        </div>
    @endsection
