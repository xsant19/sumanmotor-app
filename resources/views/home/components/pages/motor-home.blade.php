@extends('home.layout-user')
@section('title', 'Motor Pelanggan')
@section('content_dashboard')
    <div class="py-6">
        <div class="max-w-4xl mx-auto">
            <div class="flex flex-col md:flex-row items-center md:items-start justify-between pb-4">
                <h2 class="text-2xl font-bold mb-1 md:mb-0">Data Motor Pengguna</h2>
                <form action="" method="GET">
                    <div class="flex mt-4 md:mt-0">
                        <input type="search" name="search" placeholder="Cari motor"
                            class="rounded-l-lg py-2 px-4 bg-white border border-gray-300">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white rounded-r-lg py-2 px-4 ml-2">Cari</button>
                    </div>
                </form>
            </div>
            <div class="bg-white rounded-md shadow overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Nomor</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Nama Motor</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Merk Motor</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Jenis Motor</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">No Polisi</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($motors as $motor)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $motor->nama }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $motor->merk_motor }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $motor->jenis_motor }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $motor->no_polisi }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button class="text-green-500 hover:text-blue-700 mr-2"><a
                                            href="{{ route('orders.motor', $motor->id) }}"> <i
                                                class="fas fa-shopping-cart"></i></a>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-6"> {{ $motors->links() }}</div>
        @endsection
