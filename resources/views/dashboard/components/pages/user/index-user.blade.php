@extends('dashboard.layout-dashboard')
@section('content')
    <div class="py-6">
        <div class="max-w-4xl mx-auto">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-2xl font-bold">Users</h2>
                <a href="{{ route('users.create') }}"
                    class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Add User</a>
            </div>
            @if ($message = Session::get('success'))
                <div class="bg-green-200 text-green-800 p-4 mb-4 rounded">
                    {{ $message }}
                </div>
            @endif
            <table class="w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-200">Nama</th>
                        <th class="px-6 py-3 border-b border-gray-200">Email</th>
                        <th class="px-6 py-3 border-b border-gray-200">Alamat</th>
                        <th class="px-6 py-3 border-b border-gray-200">No. Telp</th>
                        <th class="px-6 py-3 border-b border-gray-200">Role</th>
                        <th class="px-6 py-3 border-b border-gray-200">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="px-6 py-4 border-b border-gray-200">{{ $user->nama }}</td>
                            <td class="px-6 py-4 border-b border-gray-200">{{ $user->email }}</td>
                            <td class="px-6 py-4 border-b border-gray-200">{{ $user->alamat }}</td>
                            <td class="px-6 py-4 border-b border-gray-200">{{ $user->no_telp }}</td>
                            <td class="px-6 py-4 border-b border-gray-200">{{ $user->role_id }}</td>
                            <td class="px-6 py-4 border-b border-gray-200">
                                <a href="{{ route('users.edit', $user->id) }}" class="text-blue-500">Edit</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
