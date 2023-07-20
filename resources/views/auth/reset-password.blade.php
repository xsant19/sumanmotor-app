@extends('home.layout-home')
@section('content')
    <section>
        <div class="min-h-screen bg-gray-100 flex flex-col justify-center sm:py-12">
            <div class="p-10 xs:p-0 mx-auto md:w-full md:max-w-md">
                <div class="flex flex-wrap justify-center">
                    <div class="w-6/12 sm:w-4/12 px-4"> <img alt="..." src="{{ asset('assets/img/logo.png') }}" /></div>
                </div>
                <h1 class="font-bold text-center text-2xl mb-5">Halaman Reset Password</h1>
                <div class="bg-white shadow w-full rounded-lg divide-y divide-gray-200">
                    <div class="px-5 py-7">
                        @if (session()->has('status'))
                            <div
                                class="font-regular relative mb-4 block w-full rounded-lg bg-gradient-to-tr from-green-600 to-green-400 p-4 text-base leading-5 text-white opacity-100">
                                <i class="fas fa-exclamation mr-2"></i>
                                {{ session('status') }}
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
                        <p class="text-center text-sm mb-5">
                            Tolong masukkan password baru anda!
                        </p>
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ request()->token }}">
                            <input type="hidden" name="email" value="{{ request()->email }}">
                            <label class="font-semibold text-sm text-gray-600 pb-1 block">Password Baru</label>
                            <input type="password" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full"
                                id="password" name="password" required placeholder="Masukkan Password Baru anda" />
                            <label class="font-semibold text-sm text-gray-600 pb-1 block">Konfirmasi
                                Password Baru</label>
                            <input type="password" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full"
                                id="password_confirmation" name="password_confirmation" required
                                placeholder="Konfirmasi Password Baru Anda" />
                            <button type="submit"
                                class="w-full middle none center mr-4 rounded-lg bg-red-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-red-500/20 transition-all hover:shadow-lg hover:shadow-red-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                data-ripple-light="true" <span class="inline-block mr-2">Perbarui Password Anda</span>
                            </button>
                        </form>
                    </div>
                    <div class="py-5">
                        <div class="grid grid-cols-2 gap-1">
                            <div class="text-center sm:text-left whitespace-nowrap">
                                <a href="{{ route('login') }}"> <button
                                        class="transition duration-200 mx-5 px-5 py-4 cursor-pointer font-normal text-sm rounded-lg text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-200 focus:ring-2 focus:ring-gray-400 focus:ring-opacity-50 ring-inset">
                                        <i class="fas fa-sign-in-alt"></i>
                                        <span class="inline-block ml-1">Kembali login</span>
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
