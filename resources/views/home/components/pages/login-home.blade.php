@extends('home.layout-home')
@section('title', 'Login Suman Motor')
@section('content')
    <section>
        <div class="min-h-screen bg-gray-100 flex flex-col justify-center sm:py-12">
            <div class="p-10 xs:p-0 mx-auto md:w-full md:max-w-md">
                <div class="flex flex-wrap justify-center">
                    <div class="w-6/12 sm:w-4/12 px-4"> <img alt="..." src="{{ asset('assets/img/logo.png') }}" /></div>
                </div>
                <h1 class="font-bold text-center text-2xl mb-5">Halaman Login Suman Motor</h1>
                <div class="bg-white shadow w-full rounded-lg divide-y divide-gray-200">
                    <div class="px-5 py-7">
                        @if (session()->has('success'))
                            <div
                                class="font-regular relative mb-4 block w-full rounded-lg bg-gradient-to-tr from-green-600 to-green-400 p-4 text-base leading-5 text-white opacity-100">
                                <i class="fas fa-exclamation mr-2"></i>
                                {{ session('success') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div
                                    class="font-regular relative mb-4 block w-full rounded-lg bg-gradient-to-tr bg-red-500 p-4 text-base leading-5 text-white opacity-100">
                                    <i class="fas fa-exclamation mr-2"></i>
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif
                        @if (session()->has('status'))
                            <div
                                class="font-regular relative mb-4 block w-full rounded-lg bg-gradient-to-tr from-green-600 to-green-400 p-4 text-base leading-5 text-white opacity-100">
                                <i class="fas fa-exclamation mr-2"></i>
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('auth') }}">
                            @csrf
                            <label class="font-semibold text-sm text-gray-600 pb-1 block">E-mail</label>
                            <input type="email" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full"
                                id="email" name="email" placeholder="Masukkan Email Anda" />
                            <label class="font-semibold text-sm text-gray-600 pb-1 block">Password</label>
                            <input type="password" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full"
                                id="password" name="password" required placeholder="Masukkan Password anda" />
                            <button type="submit"
                                class="w-full middle none center mr-4 rounded-lg bg-red-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-red-500/20 transition-all hover:shadow-lg hover:shadow-red-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                data-ripple-light="true" <span class="inline-block mr-2">Login</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" class="w-4 h-4 inline-block">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </button>
                        </form>
                    </div>
                    <div class="py-5">
                        <div class="grid grid-cols-2 gap-1">
                            <div class="text-center sm:text-left whitespace-nowrap">
                                <a href="{{ route('password.request') }}"> <button
                                        class="transition duration-200 mx-5 px-5 py-4 cursor-pointer font-normal text-sm rounded-lg text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-200 focus:ring-2 focus:ring-gray-400 focus:ring-opacity-50 ring-inset">
                                        <i class="fas fa-question-circle"></i>
                                        <span class="inline-block ml-1">Lupa Password</span>
                                    </button></a>
                            </div>
                            <div class="text-center sm:text-right  whitespace-nowrap">
                                <a href="{{ route('register') }}"> <button
                                        class="transition duration-200 mx-5 px-5 py-4 cursor-pointer font-normal text-sm rounded-lg text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-200 focus:ring-2 focus:ring-gray-400 focus:ring-opacity-50 ring-inset">
                                        <i class="fas fa-user-plus" aria-hidden="true"></i>
                                        <span class="inline-block ml-1">Register</span>
                                    </button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- from cdn -->
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>
@endsection
