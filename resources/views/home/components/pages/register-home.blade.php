@extends('home.layout-home')
@section('title', 'Register Suman Motor')
@section('content')
    {{-- <!-- component -->
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css"> --}}
    <link rel="stylesheet"
        href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
  <section class="min-h-screen py-1 bg-blue-gray-50 flex items-center justify-center">
        <div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
            <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                <div class="rounded-t bg-white mb-0 px-6 py-6">
                    <div class="text-center flex justify-between">
                        <h6 class="text-blueGray-700 text-xl font-bold">
                            Register Form Suman Motor
                        </h6>
                    </div>
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div
                                    class="font-regular relative mb-4 block w-full rounded-lg bg-gradient-to-tr bg-red-500 p-4 text-base leading-5 text-white opacity-100">
                                    <i class="fas fa-exclamation mr-2"></i>
                                    {{ $error }}
                                </div> @endforeach
                        @endif
                    <form action="/register"
        method="post">
    @csrf
    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
        Isilah data dengan lengkap
    </h6>
    <div class="flex flex-wrap">
        <div class="w-full lg:w-6/12 px-4">
            <div class="relative w-full mb-3">
                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                    Nama
                </label>
                <input type="text" id="nama" name="nama"
                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                    placeholder="Masukkan Nama Lengkap" required value="{{ old('nama') }}">
            </div>
        </div>
        <div class="w-full lg:w-6/12 px-4">
            <div class="relative w-full mb-3">
                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                    Email
                </label>
                <input type="email" id="email" name="email"
                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                    placeholder="Masukkan email anda" required value="{{ old('email') }}">
            </div>
        </div>
        <div class="w-full lg:w-12/12 px-4">
            <div class="relative w-full mb-3">
                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                    No Telepon
                </label>
                <input type="number" id="no_telp" name="no_telp"
                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                    placeholder="Masukkan No Telepon" required value="{{ old('no_telp') }}">
            </div>
        </div>
    </div>
    <div class="flex flex-wrap">
        <div class="w-full lg:w-12/12 px-4">
            <div class="relative w-full mb-3">
                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                    Alamat
                </label>
                <input type="text" id="alamat" name="alamat"
                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                    placeholder="Masukkan Alamat Lengkap" required value="{{ old('alamat') }}">
            </div>
        </div>
        <div class="w-full lg:w-12/12 px-4">
            <div class="relative w-full mb-3">
                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                    Password
                </label>
                <input type="password" id="password" name="password"
                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                    placeholder="Masukkan Password Anda" required>
            </div>
        </div>
        <hr class="mt-6 border-b-1 border-blueGray-300">
        <div class="w-full lg:w-12/12 px-4">
            <div class="relative w-full mb-3">
                <button
                    class="middle none center w-full rounded-lg bg-red-500 py-3 px-6 mt-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-red-500/20 transition-all hover:shadow-lg hover:shadow-red-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                    data-ripple-light="true">
                    Register
                </button>
            </div>
        </div>
        </form>
        <small class="mt-6 font-semibold">Sudah memiliki akun? <a class="text-red-600" href="/login">Login
                disini!</a></small>
    </div>
    </section>
@endsection
