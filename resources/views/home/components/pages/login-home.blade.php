@extends('home.layout-home')
@section('content')
    <section>
        <div class="min-h-screen bg-gray-100 flex flex-col justify-center sm:py-12">
            <div class="p-10 xs:p-0 mx-auto md:w-full md:max-w-md">
                <h1 class="font-bold text-center text-2xl mb-5">Your Logo</h1>
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
                        <form method="POST" action="{{ route('auth') }}">
                            @csrf
                            <label class="font-semibold text-sm text-gray-600 pb-1 block">E-mail</label>
                            <input type="email" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full"
                                id="email" name="email" placeholder="Masukkan Email Anda" />
                            <label class="font-semibold text-sm text-gray-600 pb-1 block">Password</label>
                            <input type="password" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full"
                                id="password" name="password" required placeholder="Masukkan Password anda" />
                            <button type="submit"
                                class="transition duration-200 bg-red-500 hover:bg-red-600 focus:bg-red-700 focus:shadow-sm focus:ring-4 focus:ring-red-500 focus:ring-opacity-50 text-white w-full py-2.5 rounded-lg text-sm shadow-sm hover:shadow-md font-semibold text-center inline-block">
                                <span class="inline-block mr-2">Login</span>
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
                                <button
                                    class="transition duration-200 mx-5 px-5 py-4 cursor-pointer font-normal text-sm rounded-lg text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-200 focus:ring-2 focus:ring-gray-400 focus:ring-opacity-50 ring-inset">
                                    <i class="fa fa-cogs" aria-hidden="true"></i>
                                    <span class="inline-block ml-1"><a href="{{ route('register') }}">Belum Memiliki
                                            Akun?</a></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
