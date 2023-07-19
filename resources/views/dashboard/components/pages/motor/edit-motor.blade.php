@extends('dashboard.layout-dashboard')
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
            <div class="p-6 pb-0 mb-0 bg-white rounded-t-2xl border-b border-gray-200 flex justify-between">
                <h6>Tambah Data Motor</h6>
                <button type="button"
                    class="mb-8 inline-block px-6 py-3 font-bold text-center bg-gradient-to-tl from-blue-600 to-cyan-400 uppercase align-middle transition-all rounded-lg cursor-pointer leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs text-white"><a
                        href="{{ route('motors.index') }}">Kembali</a></button>
            </div>

            <form action="{{ route('motors.update', $motor->id) }}" class="p-6 pb-3 mb-3 bg-white rounded-t-2xl"
                method="POST">
                @csrf
                @method('PUT')
                <div class="grid mt-3 grid-cols-1 md:grid-cols-2 gap-4">
                    <input type="hidden" id="nama" name="user_id" required
                        class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none"
                        value=" {{ $motor->user->id }}">
                    <div>
                        <label for="nama" class="block text-gray-700 font-medium mb-2">Nama Motor</label>
                        <input type="text" id="nama" name="nama" required
                            class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none"
                            value=" {{ $motor->nama }}">
                    </div>

                    <div>
                        <label for="merk_motor" class="block text-gray-700 font-medium mb-2">Merk Motor</label>
                        <input type="text" id="merk_motor" name="merk_motor" required
                            class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none"
                            value=" {{ $motor->merk_motor }}">
                    </div>

                    <div>
                        <label for="jenis_motor" class="block text-gray-700 font-medium mb-2">Jenis Motor</label>
                        <select id="jenis_motor" name="jenis_motor" required
                            class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                            @if ($motor->jenis_motor)
                                <option selected value=" {{ $motor->jenis_motor }}">{{ $motor->jenis_motor }}</option>
                            @endif
                            <option value="Sport">Sport</option>
                            <option value="Matic">Matic</option>
                            <option value="bebek"{{ $motor->jenis_motor }}">Bebek</option>
                            <option value="Trail">Trail</option>
                        </select>
                    </div>

                    <div>
                        <label for="no_polisi" class="block text-gray-700 font-medium mb-2">No Polisi</label>
                        <input type="text" id="no_polisi" name="no_polisi" required
                            class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none"
                            value=" {{ $motor->no_polisi }}">
                    </div>

                </div>
                <button type="submit"
                    class="mt-6 inline-block px-6 py-3 font-bold text-center bg-gradient-to-tl from-green-600 to-lime-400 uppercase align-middle transition-all rounded-lg cursor-pointer leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs text-white">Simpan</button>
            </form>
        </div>
    </div>
@endsection
