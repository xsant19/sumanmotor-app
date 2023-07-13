@extends('home.layout-user')
@section('content_dashboard')
    <div class="py-6">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-2xl font-bold mb-4">Riwayat Transaksi</h2>
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
                                <td class="px-6 py-4 whitespace-nowrap"><button
                                        class="text-blue-500 hover:text-blue-700 mr-2">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="text-green-500 hover:text-green-700">
                                        <i class="fas fa-print"></i>
                                    </button>
                                </td>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
