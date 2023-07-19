@extends('dashboard.layout-dashboard')
@section('title', 'Tambah Pelanggan')
@section('content')
    <div class="w-full px-6 py-6 mx-auto">
        <div
            class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="p-6 pb-0 mb-0 bg-white rounded-t-2xl border-b border-gray-200 flex justify-between">
                <h5 class="mb-4">Tambah User</h5>
            </div>
            @if ($errors->any())
                <div class="bg-red-200 text-red-800 p-4 mb-4 rounded">
                    <strong>Error:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="flex-auto px-0 pt-0 pb-2 border-b border-gray-200">
                <form action="{{ route('users.store') }}" method="POST"
                    class="p-6 pb-3 mb-3>
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
                <input type="password" id="password" name="password" class="w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div class="mb-4">
                <label for="alamat" class="block font-medium">Alamat</label>
                <textarea id="alamat" name="alamat" class="w-full border-gray-300 rounded-md shadow-sm">{{ old('alamat') }}</textarea>
            </div>
            <div class="mb-4">
                <label for="no_telp" class="block font-medium">No. Telp</label>
                <input type="text" id="no_telp" name="no_telp" value="{{ old('no_telp') }}"
                    class="w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div class="mb-4">
                <label for="role_id" class="block font-medium">Role ID</label>
                <select class="w-full p-2.5 border-gray-300 rounded-md shadow-sm" name="role_id" id="role_id">
                    <option value="{{ old('role_id') }}">1</option>
                    <option value="{{ old('role_id') }}">2</option>
                </select>
            </div>
            <button type="submit"
                class="inline-block px-4 py-2 font-bold text-center bg-gradient-to-tl from-green-600 to-lime-400 uppercase align-middle transition-all rounded-lg cursor-pointer leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs text-white">Simpan</button>
            </form>
        </div>
    </div>
    </div>
@endsection
