@extends('home.layout-user')
@section('content_dashboard')

    <body class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="w-full max-w-md">
            <form action="{{ route('orders.store') }}" method="POST" id="orderForm"
                class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nama_motor">Nama Motor:</label>
                    <input
                        class="appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500"
                        id="nama_motor" name="nama" type="text" placeholder="Nama Motor" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="merk_motor">Merk Motor:</label>
                    <input
                        class="appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500"
                        id="merk_motor" name="merk_motor" type="text" placeholder="Merk Motor" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="jenis_motor">Jenis Motor:</label>
                    <input
                        class="appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500"
                        id="jenis_motor" name="jenis_motor" type="text" placeholder="Jenis Motor" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="no_polisi">Nomor Polisi:</label>
                    <input
                        class="appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500"
                        id="no_polisi" name="no_polisi" type="text" placeholder="Nomor Polisi" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="kendala">Kendala:</label>
                    <textarea
                        class="appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500"
                        id="kendala" name="kendala" placeholder="Kendala" required></textarea>
                </div>

                <div class="flex items-center justify-between">
                    <button id="kirimBtn" type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="button">Kirim</button>
                    <button
                        class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="button">Batal</button>
                </div>
            </form>
        </div>

        <div id="modal"
            class="hidden fixed top-0 left-0 w-full h-full bg-gray-900 bg-opacity-75 flex items-center justify-center">
            <div class="bg-white rounded-lg p-6 mx-2">
                <div class="flex items-center justify-center">
                    <svg class="h-12 w-12 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <h2 class="text-2xl mb-4">Pesanan Terkirim</h2>
                </div>
                <p class="text-gray-700">Apakah Anda ingin mengirim pesanan lain?</p>
                <div class="flex justify-end mt-6">
                    <button id="yaBtn"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mr-2">Ya</button>
                    <button id="tidakBtn"
                        class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">Tidak</button>
                </div>
            </div>
        </div>

        <script>
            const kirimBtn = document.getElementById('kirimBtn');
            const modal = document.getElementById('modal');
            const yaBtn = document.getElementById('yaBtn');
            const tidakBtn = document.getElementById('tidakBtn');
            const orderForm = document.getElementById('orderForm');

            kirimBtn.addEventListener('click', () => {
                modal.classList.remove('hidden');
            });

            yaBtn.addEventListener('click', () => {
                modal.classList.add('hidden');
                orderForm.reset();
            });

            tidakBtn.addEventListener('click', () => {
                modal.classList.add('hidden');
            });
        </script>
    @endsection
