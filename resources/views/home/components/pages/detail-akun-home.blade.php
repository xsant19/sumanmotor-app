@extends('home.layout-user')
@section('title', 'Detail Akun')
@section('content_dashboard')
    <div class="container mx-auto">
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
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h1 class="text-2xl font-semibold mb-4 text-center sm:text-left">Detail Akun Anda</h1>
            <form action="{{ route('user.update', $user) }}" method="POST" id="account-form">
                @method('PUT')
                @csrf
                <input type="hidden" name="role_id" value="2">
                <div class="grid grid-cols-2 gap-4">
                    <!-- Nama -->
                    <div class="mb-4">
                        <label for="nama" class="block text-gray-700 font-semibold mb-1">Nama</label>
                        <input type="text" id="nama" name="nama" class="w-full p-2 border rounded"
                            value="{{ $user->nama }}" required>
                    </div>
                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-semibold mb-1">Email</label>
                        <input type="email" id="email" name="email" class="w-full p-2 border rounded"
                            value="{{ $user->email }}" required>
                    </div>
                </div>
                <!-- Nomor Telepon -->
                <div class="mb-4">
                    <label for="no_telp" class="block text-gray-700 font-semibold mb-1">Nomor Telepon</label>
                    <input type="text" id="no_telp" name="no_telp" class="w-full p-2 border rounded"
                        value="{{ $user->no_telp }}" required>
                </div>
                <!-- Alamat -->
                <div class="mb-4">
                    <label for="alamat" class="block text-gray-700 font-semibold mb-1">Alamat</label>
                    <textarea id="alamat" name="alamat" rows="3" class="w-full p-2 border rounded" required>{{ $user->alamat }}</textarea>
                </div>
                <!-- Password Lama -->
                <div class="mb-4">
                    <label for="password_lama" class="block text-gray-700 font-semibold mb-1">Password Lama</label>
                    <input type="password" id="password_lama" name="password_lama" class="w-full p-2 border rounded"
                        placeholder="Password Lama Anda">
                </div>
                <!-- Password Baru -->
                <div class="mb-4">
                    <label for="password_baru" class="block text-gray-700 font-semibold mb-1">Password Baru</label>
                    <input type="password" id="password_baru" name="password_baru" class="w-full p-2 border rounded"
                        placeholder="Password Baru Anda">
                </div>
                <!-- Konfirmasi Password Baru -->
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-gray-700 font-semibold mb-1">Konfirmasi Password
                        Baru</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="w-full p-2 border rounded" placeholder="Konfirmasi Password Baru Anda">
                </div>
                <!-- Tombol Submit -->
                <div class="text-center sm:text-right">
                    <button type="submit" id="btn-kirim"
                        class="middle none center mr-4 rounded-lg bg-green-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-green-500/20 transition-all hover:shadow-lg hover:shadow-green-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                        data-ripple-light="true">Simpan
                        Perubahan</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            // Memeriksa jika semua input telah terisi saat dokumen siap
            checkFormValidity();
            $('input, textarea, password').on('input change', function() {
                // Memeriksa validitas formulir saat input berubah
                checkFormValidity();
            });

            function checkFormValidity() {
                // Mendapatkan semua input dalam form
                var inputs = $('#account-form').find('input, textarea, password');
                var isFormValid = true;
                console.log(inputs);
                // Memeriksa apakah setiap input memiliki nilai atau tidak
                inputs.each(function() {
                    if ($(this).prop('required') && $(this).val().trim() === '') {
                        isFormValid = false;
                        return false; // Keluar dari loop jika ada input yang kosong
                    }
                });
                // Aktifkan atau nonaktifkan tombol "Kirim" berdasarkan validitas form
                $('#btn-kirim').prop('disabled', !isFormValid);
            }

            $(document).on('click', '#btn-kirim', function(e) {
                e.preventDefault();
                var form = $(this).closest('form');
                var link = $(this).attr('href');
                Swal.fire({
                    title: 'Apakah Anda Yakin Ingin Menyimpan Perubahan',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#67b04a',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
    <!-- from cdn -->
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>
@endsection
