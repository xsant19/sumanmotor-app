@extends('dashboard.layout-dashboard')
@section('content')
@section('title', 'Tabel Motor')
<div class="w-full px-6 py-6 mx-auto">
    @if ($message = Session::get('success'))
        <div
            class="relative p-2 mb-3 text-sm text-white border border-solid rounded-lg bg-gradient-to-tl from-green-600 to-lime-400 border-lime-300">
            {{ $message }}
        </div>
    @endif
    <div
        class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="p-6 pb-0 mb-0 bg-white rounded-t-2xl border-b border-gray-200 flex justify-between">
            <h6>Tabel Motor</h6>
            <button type="button"
                class="mr-3 inline-block px-4 py-2 font-bold text-center bg-gradient-to-tl from-green-600 to-lime-400 uppercase align-middle transition-all rounded-lg cursor-pointer leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs text-white"><a
                    {{-- href="{{ route('motors.create') }}">Tambah --}} href="#">Tambah
                    Data</a></button>
        </div>
        <div class="flex-auto px-0 pt-0 pb-2">
            <div class="p-0 overflow-x-auto">
                <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                    <thead class="align-bottom">
                        <tr>
                            <th
                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                No</th>
                            <th
                                class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                Nama Motor</th>
                            <th
                                class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                No Polisi</th>
                            <th
                                class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                Merk Motor</th>
                            <th
                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($motors as $motor)
                            <tr>
                                <td
                                    class="p-2 align-middle text-center bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-xs">{{ $loop->iteration }}</p>
                                </td>
                                <td
                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <div class="flex px-2 py-1">
                                        <div>
                                            <h6 class="ml-2 p-2 mb-0 leading-normal text-sm">{{ $motor->nama }}
                                            </h6>
                                        </div>
                                    </div>
                                </td>
                                <td
                                    class="p-2 leading-normal text-left align-middle bg-transparent border-b text-sm whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-xs">{{ $motor->no_polisi }}</p>
                                </td>
                                <td
                                    class="p-2 leading-normal text-left align-middle bg-transparent border-b text-sm whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-xs">{{ $motor->merk_motor }}</p>
                                </td>
                                <td
                                    class="p-2 leading-normal text-center align-middle bg-transparent border-b text-sm whitespace-nowrap shadow-transparent">
                                    <div>
                                        <div>
                                            <button class="text-green-500 hover:text-blue-700 mr-2"> <i
                                                    class="fas fa-edit"></i></button>
                                            <button class="text-blue-500 hover:text-blue-700 mr-2"> <i
                                                    class="fas fa-eye"></i></button>
                                            <button class="text-red-500 hover:text-blue-700 mr-2"> <i
                                                    class="fas fa-trash"></i></button>
                                            {{-- <form action="{{ route('motors.destroy', $motor->id) }}" method="POST"
                                                class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500"> <i
                                                        class="fas fa-trash"></i></button>
                                            </form> --}}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
