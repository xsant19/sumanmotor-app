@extends('dashboard.layout-dashboard')
@section('content')
@section('title', 'Riwayat Order')
<div class="w-full px-6 py-6 mx-auto">
    @if ($message = Session::get('success'))
        <script>
            Swal.fire({
                title: 'Sukses',
                text: '{{ $message }}',
                icon: 'success',
                showConfirmButton: false,
                timer: 3000 // Display duration in milliseconds (3 seconds in this case)
            });
        </script>
    @endif
    <div
        class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="p-6 pb-0 mb-0 bg-white rounded-t-2xl flex justify-between">
            <h6>Tabel Riwayat Transaksi</h6>
            <div class="flex items-center">
                <div class="mr-4">
                    <form>
                        <div class="relative w-full">
                            <input type="search" name="search" class="px-4 py-2 border rounded-md"
                                placeholder="Cari Nomor Order" value="">
                            <button type="submit"
                                class="absolute bot-1 right-0 p-2.5 text-sm font-medium h-full text-center text-white bg-gradient-to-tl from-slate-600 to-slate-300 rounded-r-lg border">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
                <button type="button" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                    class=" mr-3 inline-block px-4 py-3 font-bold text-center bg-gradient-to-tl from-green-600 to-lime-400 uppercase align-middle transition-all rounded-lg cursor-pointer leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs text-white">
                    <a href="#">Cetak Laporan</a>
                </button>
            </div>
        </div>

        <div class="flex-auto px-0 pt-0 pb-2">
            <div class="p-0 overflow-x-auto">
                <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                    <thead class="align-bottom">
                        <tr>
                            <th
                                class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                No</th>
                            <th
                                class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                No Order</th>
                            <th
                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                Tanggal order
                            </th>
                            <th
                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                Total Harga</th>
                            <th
                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td class="align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <div class="flex px-2 py-1">
                                        <div>
                                            <h6 class="ml-2 p-2 mb-0 leading-normal text-sm">{{ $loop->iteration }}
                                            </h6>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <div class="flex px-2 py-1">
                                        <div>
                                            <h6 class="ml-2 p-2 mb-0 leading-normal text-sm">
                                                {{ $order->no_order }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <div class="">
                                        <div>
                                            <h6 class="mb-0 font-semibold leading-tight text-center text-xs">
                                                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $order->tanggal_order)->isoFormat('D MMMM Y') }}
                                            </h6>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <div class="px-1 py-1">
                                        <div>
                                            <h6 class="mb-0 text-center font-semibold leading-tight text-xs">
                                                {{ number_format($order->total_harga, 0, '', '.') }}
                                            </h6>
                                        </div>
                                    </div>
                                </td>
                                <td
                                    class="p-2 leading-normal text-center align-middle bg-transparent border-b text-sm whitespace-nowrap shadow-transparent">
                                    <div></div>
                                    <a href="{{ route('riwayats.view', $order->id) }}">
                                        <button class="text-blue-500 hover:text-blue-700 mr-2">
                                            <i class="fas fa-eye"></i>
                                        </button></a>
                                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST"
                                        class="inline-block" id="deleteForm{{ $order->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="text-red-500 mr-2 delete-btn"
                                            data-id="{{ $order->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    <a href="{{ route('orders.export', $order->id) }}"><button
                                            class="text-gray-500 hover:text-blue-700 mr-2">
                                            <i class="fas fa-print"></i>
                                        </button></a>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="mt-6"> {{ $orders->links() }}</div>
</div>
<!-- Modal Cetak Laporan -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="authentication-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Pilih Rentang Tanggal</h3>
                <form action="{{ route('cetak.laporan') }}" method="GET">
                    <div class="space-y-6">
                        <div>
                            <label for="tglawal"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                Awal</label>
                            <input type="date" name="tglawal" id="tglawal"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"required>
                        </div>
                        <div>
                            <label for="tglakhir"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                Akhir</label>
                            <input type="date" name="tglakhir" id="tglakhir"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required>
                        </div>
                        <button name="format" value="excel" type="submit"
                            class="w-full uppercase font-bold text-white bg-gradient-to-tl from-green-600 to-lime-400 border-lime-300 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Cetak Excel
                        </button>
                        <button name="format" value="pdf"type="submit"
                            class="w-full uppercase font-bold text-white bg-gradient-to-tl from-red-600 to-rose-400 border-lime-300 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Cetak PDF
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    const deleteButtons = document.querySelectorAll(".delete-btn");
    deleteButtons.forEach((button) => {
        button.addEventListener("click", function() {
            const orderId = button.getAttribute("data-id");

            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin menghapus data?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    const deleteForm = document.getElementById("deleteForm" + orderId);
                    deleteForm.submit();
                }
            });
        });
    });
</script>
@endsection
