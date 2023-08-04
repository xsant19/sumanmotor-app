@extends('dashboard.layout-dashboard')
@section('title', 'Tambah Pelanggan')
@section('content')
    <div class="w-full px-6 py-6 mx-auto">
        <div
            class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="p-6 bg-white rounded-t-2xl flex justify-between border-b border-gray-200">
                <h3 class="text-2xl font-bold mb-4">Tambah User</h3>
                <button type="button"
                    class="mb-3 inline-block px-4 py-2 font-bold text-center bg-gradient-to-tl from-blue-600 to-cyan-400 uppercase align-middle transition-all rounded-lg cursor-pointer leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs text-white"><a
                        href="{{ route('users.index') }}">Kembali</a></button>
            </div>
            @if ($errors->any())
                <div class="relative w-full p-4 text-white bg-red-500 rounded-lg"> <strong>Error:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="flex-auto px-0 pt-0 pb-2 border-b border-gray-200">
                <form action="{{ route('users.store') }}" method="POST" class="p-6 pb-3 mb-3">
                    @csrf
                    <div class="mb-4">
                        <label for="nama" class="block font-medium">Nama</label>
                        <input type="text" id="nama" name="nama" value="{{ old('nama') }}"
                            class="w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block font-medium">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            class="w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block font-medium">Password</label>
                        <input type="password" id="password" name="password"
                            class="w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div class="mb-4">
                        <label for="alamat" class="block font-medium">Alamat</label>
                        <textarea id="alamat" name="alamat" class="w-full border-gray-300 rounded-md shadow-sm">{{ old('alamat') }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label for="no_telp" class="block font-medium">No. Telp</label>
                        <input type="number" id="no_telp" name="no_telp" value="{{ old('no_telp') }}"
                            class="w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div class="mb-4">
                        <input type="hidden" id="role_id" name="role_id" value="2">
                    </div>
                    <button type="submit"
                        class="inline-block px-4 py-2 font-bold text-center bg-gradient-to-tl from-green-600 to-lime-400 uppercase align-middle transition-all rounded-lg cursor-pointer leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs text-white">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
