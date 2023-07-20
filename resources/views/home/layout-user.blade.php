@extends('home.layout-home')
@section('content')
    <div class="flex flex-col md:flex-row">
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
                <a href="{{ route('motors.home') }}" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-700">
                    <i class="fas fa-motorcycle mr-2"></i>
                    Motor
                </a>
                <a href="{{ route('riwayat.byuser') }}" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-700">
                    <i class="fas fa-history mr-2"></i>
                    Riwayat Transaksi
                </a>
                <a href="{{ route('user.index') }}" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-700">
                    <i class="fas fa-user-circle  mr-2"></i>
                    Detail Akun
                </a>
                <a href="/logout" id="logout" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-700">
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).on('click', '#logout', function(e) {
            e.preventDefault();
            var link = $(this).attr('href');
            Swal.fire({
                title: 'Apakah Anda Yakin Logout?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#67b04a',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = link;
                }
            })
        })
    </script>
@endsection
