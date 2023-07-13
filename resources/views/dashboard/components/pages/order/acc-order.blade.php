@extends('dashboard.layout-dashboard')
@section('content')
    <div class="max-w-md mx-auto mt-10 bg-white p-8 border border-gray-300 rounded-md shadow-md">
        <h2 class="text-xl font-bold mb-4">Order Detail</h2>
        <form action="">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="no_order" class="block text-sm font-medium text-gray-700">No Order</label>
                    <input type="text" id="no_order" name="no_order"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                        value="{{ $order->no_order }}" disabled>
                </div>
                <div>
                    <label for="nomor_antri" class="block text-sm font-medium text-gray-700">No Antri</label>
                    <input type="text" id="nomor_antri" name="nomor_antri"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                        value="{{ $order->no_antri }}" disabled>
                </div>
            </div>
            <div class="mb-4 mt-4">
                <label for="tanggal_order" class="block text-sm font-medium text-gray-700">Tanggal Order</label>
                <input type="text" id="tanggal_order" name="tanggal_order"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                    value="{{ $order->tanggal_order }}" disabled>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama Pemilik</label>
                    <input type="text" id="nama" name="nama"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                        value="{{ $order->user->nama }}">
                </div>
                <div>
                    <label for="motor" class="block text-sm font-medium text-gray-700">Motor Pemilik</label>
                    <select id="motor_pemilik" name="motor_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($motors as $motor)
                            @if ($motor->id == $order->motor_id)
                                <option selected value="{{ $motor->id }}">{{ $motor->nama }}</option>
                            @else
                                <option value="{{ $motor->id }}">{{ $motor->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <p class="text-gray-500 mt-4">Kendala:</p>
            <textarea name="kendala"
                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                rows="4">{{ $order->kendala }}</textarea>
            <div class="mt-6">
                <button type="button"
                    class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gradient-to-tl from-blue-600 to-cyan-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Terima</button>
                <button type="button"
                    class="ml-3 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gradient-to-tl from-green-600 to-lime-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Simpan</button>
                <button type="button"
                    class="ml-3 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-white bg-gradient-to-tl from-red-600 to-rose-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Kembali</button>
            </div>
        </form>
    </div>
@endsection
