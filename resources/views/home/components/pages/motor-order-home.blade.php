@extends('home.layout-user')
@section('content_dashboard')
    <div class="w-full max-w-md mx-auto">
        <h2 class="text-2xl font-bold mb-4">Form Order Service Motor</h2>
        <form action="{{ route('orders.user', ['id' => $motor->id]) }}" method="POST" id="orderForm"
            class="w-full max-w-md mx-auto shadow-md
            rounded px-8 pt-6 pb-8 mb-4 ">
            @csrf
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nama_motor">Nama Motor:</label>
                    <input
                        class="appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500"
                        id="nama_motor" name="nama" type="text" disabled value="{{ $motor->nama }}">
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="merk_motor">Merk Motor:</label>
                    <input
                        class="appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500"
                        id="merk_motor" name="merk_motor" type="text" value="{{ $motor->merk_motor }}" required disabled>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="merk_motor">Jenis Motor:</label>
                    <input
                        class="appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500"
                        id="merk_motor" name="merk_motor" type="text" value="{{ $motor->jenis_motor }}" required
                        disabled>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="no_polisi">Nomor Polisi:</label>
                    <input
                        class="appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500"
                        id="no_polisi" name="no_polisi" type="text" value="{{ $motor->no_polisi }}" required disabled>
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="kendala">Kendala:</label>
                <textarea
                    class="appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500"
                    id="kendala" name="kendala" placeholder="Masukkan Kendala Motor Anda" required></textarea>
            </div>
            <div class="flex items-center justify-between">
                <a href="{{ route('motors.home') }}"><button
                        class="mr-3 inline-block px-6 py-3 font-bold text-center bg-gradient-to-tl from-red-600 to-red-400 uppercase align-middle transition-all rounded-lg cursor-pointer leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs text-white"
                        type="button">Batal</button></a>
                <button type="submit"
                    class=" inline-block px-6 py-3 font-bold text-center bg-gradient-to-tl from-green-600 to-lime-400 uppercase align-middle transition-all rounded-lg cursor-pointer leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs text-white">Kirim</button>
            </div>
        </form>
    </div>
    <!-- from cdn -->
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/dialog.js"></script>
@endsection
