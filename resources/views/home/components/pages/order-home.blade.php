@extends('home.layout-user')
@section('title', 'Order Service')
@section('content_dashboard')
    <div class="w-full max-w-md mx-auto">
        <h2 class="text-2xl font-bold mb-4">Form Order Service</h2>
        <form action="{{ route('orders.store') }}" method="POST" id="orderForm"
            class="w-full max-w-md mx-auto shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nama_motor">Nama Motor:</label>
                    <input
                        class="appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500"
                        id="nama_motor" name="nama" type="text" placeholder="Nama Motor" required>
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="merk_motor">Merk Motor:</label>
                    <input
                        class="appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500"
                        id="merk_motor" name="merk_motor" type="text" placeholder="Merk Motor" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="jenis_motor">Jenis Motor:</label>
                    <select
                        class="border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500"
                        id="jenis_motor" name="jenis_motor" required>
                        <option value="Sport">Sport</option>
                        <option value="Matic">Matic</option>
                        <option value="Bebek">Bebek</option>
                        <option value="Trail">Trail</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="no_polisi">Nomor Polisi:</label>
                    <input
                        class="appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500"
                        id="no_polisi" name="no_polisi" type="text" placeholder="Nomor Polisi" required>
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="kendala">Kendala:</label>
                <textarea
                    class="appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500"
                    id="kendala" name="kendala" placeholder="Kendala" required></textarea>
            </div>
            <div class="flex items-center justify-between">
                <a href="{{ route('dashboard.pelanggan') }}"><button
                        class="mr-3 inline-block px-6 py-3 font-bold text-center bg-gradient-to-tl from-red-600 to-red-400 uppercase align-middle transition-all rounded-lg cursor-pointer leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs text-white"
                        type="button">Batal</button></a>
                <button type="submit" id="btn-kirim"
                    class="inline-block px-6 py-3 font-bold text-center bg-gradient-to-tl from-green-600 to-lime-400 uppercase align-middle transition-all rounded-lg cursor-pointer leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs text-white"
                    disabled>Kirim</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            // Memeriksa jika semua input telah terisi saat dokumen siap
            checkFormValidity();

            $('input, textarea, select').on('input change', function() {
                // Memeriksa validitas formulir saat input berubah
                checkFormValidity();
            });

            function checkFormValidity() {
                // Mendapatkan semua input dalam form
                var inputs = $('#orderForm').find('input, textarea, select');
                var isFormValid = true;

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
                    title: 'Apakah Anda Yakin Ingin Order?',
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
@endsection
