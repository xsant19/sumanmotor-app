@extends('dashboard.layout-dashboard')
@section('content')
    <div class="w-full px-6 py-6 mx-auto">
        <div
            class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="p-6 pb-0 mb-0 bg-white rounded-t-2xl flex justify-between">
                <h6>Tabel Montir</h6>
                <button type="button"
                    class="mr-3 inline-block px-4 py-2 font-bold text-center bg-gradient-to-tl from-green-600 to-lime-400 uppercase align-middle transition-all rounded-lg cursor-pointer leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs text-white"><a
                        href="{{ route('montirs.create') }}">Tambah
                        Data</a></button>
            </div>
            @if ($message = Session::get('success'))
                <div class="relative w-full p-4 text-white rounded-lg bg-lime-500">{{ $message }}</div>
            @endif
            <div class="flex-auto px-0 pt-0 pb-2">
                <div class="p-0 overflow-x-auto">
                    <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                        <thead class="align-bottom">
                            <tr>
                                <th
                                    class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Nama Montir</th>
                                <th
                                    class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Alamat</th>
                                <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    No Telepon</th>
                                <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($montirs as $montir)
                                <tr>
                                    <td class="align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <div class="flex px-2 py-1">
                                            <div>
                                                <h6 class="ml-2 p-2 mb-0 leading-normal text-sm">{{ $montir->nama }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td
                                        class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 font-semibold leading-tight text-xs">{{ $montir->alamat }}</p>
                                    </td>
                                    <td
                                        class="p-2 leading-normal text-center align-middle bg-transparent border-b text-sm whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 font-semibold leading-tight text-xs">{{ $montir->no_telepon }}</p>
                                    </td>
                                    <td
                                        class="p-2 leading-normal text-center align-middle bg-transparent border-b text-sm whitespace-nowrap shadow-transparent">
                                        <div>
                                            @csrf
                                            <form action="{{ route('montirs.destroy', $montir->id) }}" method="POST">
                                                <a href="{{ route('montirs.edit', $montir->id) }}">Edit</a>
                                                @method('DELETE')
                                                <button type="submit">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
