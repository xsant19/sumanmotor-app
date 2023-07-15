@extends('dashboard.layout-dashboard')
@section('title', 'Tambah Pelanggan')
@section('content')
    <div class="py-6">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-2xl font-bold mb-4">Add User</h2>
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
            <form action="{{ route('users.store') }}" method="POST">
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
                    <input type="text" id="no_telp" name="no_telp" value="{{ old('no_telp') }}"
                        class="w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="mb-4">
                    <label for="role_id" class="block font-medium">Role ID</label>
                    <input type="text" id="role_id" name="role_id" value="{{ old('role_id') }}"
                        class="w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Save</button>
            </form>
        </div>
    </div>
@endsection
