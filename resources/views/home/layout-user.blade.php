@extends('home.layout-home')
@section('content')

    <body>
        <div class="flex flex-col md:flex-row h-screen">
            <!-- Sidenav -->
            <aside class="w-full md:w-64 bg-gray-800 text-white">
                <div class="p-6">
                    <h2 class="text-xl font-semibold">Halaman Akun</h2>
                </div>
                <nav class="text-sm flex flex-col space-y-2 md:space-y-4">
                    <a href="{{ route('login') }}" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-700">
                        <i class="fas fa-tachometer-alt mr-2"></i>
                        Dashboard
                    </a>
                    <a href="{{ route('orders.home') }}" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-700">
                        <i class="fas fa-shopping-cart mr-2"></i>
                        Order
                    </a>
                    <a href="{{ route('motors.home') }}"
                        class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-700">
                        <i class="fas fa-motorcycle mr-2"></i>
                        Motor
                    </a>
                    <a href="{{ route('riwayat.byuser') }}"
                        class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-700">
                        <i class="fas fa-history mr-2"></i>
                        Riwayat Transaksi
                    </a>
                    <a href="/logout" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-700">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        Logout
                    </a>
                </nav>
            </aside>
            <!-- Content -->
            <section class="items-center min-h-screen flex-1 p-6 md:p-10 justify-center ">
                @yield('content_dashboard')
            </section>
        </div>
    </body>
@endsection
