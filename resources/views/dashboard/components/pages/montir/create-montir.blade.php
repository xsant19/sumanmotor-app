@extends('dashboard.layout-dashboard')
@section('title', 'Tambah data montir')
@section('content')
    <div class="w-full px-6 py-6 mx-auto">
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <div
                            class="relative p-2 mb-3 text-sm text-white border border-solid rounded-lg bg-gradient-to-tl from-red-600 to-rose-400">
                            <strong>Error:</strong>
                            <li>{{ $error }}</li>
                        </div>
                    @endforeach
                </ul>
            </div>
        @endif
        <div
            class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="px-6 py-6 bg-white rounded-t-2xl flex justify-between border-b border-gray-200">
                <h6>Tabel Data Montir</h6>
                <button type="button"
                    class="inline-block px-4 py-2 font-bold text-center bg-gradient-to-tl from-green-600 to-lime-400 uppercase align-middle transition-all rounded-lg cursor-pointer leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs text-white"><a
                        href="{{ route('montirs.index') }}">Kembali</a></button>
            </div>
            <div class="flex-auto px-0 pt-0 pb-2 border-b border-gray-200">
                <form action="{{ route('montirs.store') }}" method="POST" class="p-6 pb-3 mb-3 bg-white rounded-t-2xl">
                    @csrf

                    <div class="mb-4">
                        <label for="nama" class="block text-gray-700 font-medium">Nama:</label>
                        <input type="text" id="nama" name="nama" required
                            class=" p-6 pb-0 mb-0 focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                    </div>

                    <div class="mb-4">
                        <label for="alamat" class="block text-gray-700 font-medium mb-2">Alamat:</label>
                        <input type="text" id="alamat" name="alamat" required
                            class=" p-6 pb-0 mb-0 focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                    </div>

                    <div class="mb-4">
                        <label for="no_telp" class="block text-gray-700 font-medium mb-2">No Telp:</label>
                        <input type="text" id="no_telp" name="no_telp" required
                            class=" p-6 pb-0 mb-0 focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                    </div>
                    <button type="submit"
                        class=" p-6 inline-block px-4 py-2 font-bold text-center bg-gradient-to-tl from-green-600 to-lime-400 uppercase align-middle transition-all rounded-lg cursor-pointer leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs text-white">Save</button>
                </form>
            </div>
        </div>
    @endsection
