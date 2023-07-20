@extends('dashboard.layout-dashboard')
@section('title', 'Detail Order')
@section('content')
    <div class="w-full px-6 py-6 mx-auto">
        @if ($message = Session::get('success'))
            <div
                class="relative p-2 mb-3 text-sm text-white border border-solid rounded-lg bg-gradient-to-tl from-green-600 to-lime-400 border-lime-300">
                {{ $message }}
            </div>
        @endif
        <div
            class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
            <div
                class="p-6 pb-0 mb-0 bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <h2 class="text-xl font-bold mb-4">Detail Order</h2>
                @if ($order->status_order == 'Menunggu')
                    <form action="{{ route('orders.confirm', ['id' => $order->id]) }}" method="POST" class="detail-form">
                    @else
                        <form action="{{ route('orders.edit', ['id' => $order->id]) }}" method="POST" class="detail-form">
                @endif
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="no_order" class="block text-sm font-medium text-gray-700">No Order</label>
                        <input type="text" id="no_order" name="no_order"
                            class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            value="{{ $order->no_order }}" disabled>
                    </div>
                    <div>
                        <label for="nomor_antri" class="block text-sm font-medium text-gray-700">No Antri</label>
                        <input type="text" id="nomor_antri" name="nomor_antri"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            value="{{ $order->no_antri }}" disabled>
                    </div>
                </div>
                <div class="mb-4 mt-4">
                    <label for="tanggal_order" class="block text-sm font-medium text-gray-700">Tanggal Order</label>
                    <input type="text" id="tanggal_order" name="tanggal_order"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                        value="{{ $order->tanggal_order }}" disabled>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama Pemilik</label>
                        <input type="text" id="nama" name="nama"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            value="{{ $order->user->nama }}" disabled>
                    </div>
                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700">Motor</label>
                        <input type="text" id="motor" name="motor"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            value="{{ $order->motor->nama }}" disabled>
                    </div>
                </div>
                <div class="mb-4 mt-4">
                    <label for="tanggal_order" class="block text-sm font-medium text-gray-700">No Polisi</label>
                    <input type="text" id="tanggal_order" name="tanggal_order"
                        class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                        value="{{ $order->motor->no_polisi }}" disabled>
                </div>
                <p class="text-gray-500 mt-4">Kendala:</p>
                <textarea name="kendala" class="block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" rows="4"
                    @disabled($order->status_order == 'Menunggu')>{{ $order->kendala }}</textarea>
                <div class="mb-4 mt-4">
                    <label for="nama_montir" class="block text-sm font-medium text-gray-700">Pilih Montir</label>
                    <select id="nama_montir" name="montir_id"
                        class="block px-6 py-2 shadow-sm sm:text-sm border-gray-300 rounded-md">
                        @foreach ($montirs as $montir)
                            <option value='{{ $montir->id }}' @selected($montir->id == $order->montir_id)>
                                {{ $montir->nama }}</option>
                        @endforeach
                    </select>
                </div>
                </form>

                @if ($order->status_order != 'Menunggu')
                    <p class="text-gray-500 font-semibold">Service</p>
                    {{-- Modal Tambah Data Service --}}
                    <div class="py-2">
                        <button data-modal-target="tambahserviceModal" data-modal-toggle="tambahserviceModal"
                            class="inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-gradient-to-tl from-green-600 to-lime-400 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs"
                            type="button">
                            Tambah Data Service
                        </button>
                    </div>
                    {{-- TABEL DATA SERVICE --}}
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        No
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Jenis Service
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Deskripsi
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Harga
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $service)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="px-6 py-4">
                                            {{ $loop->iteration }}
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $service->jenis_service }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $service->deskripsi }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ number_format($service->harga_service, 0, '', '.') }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <button type="button" class="text-green-500 hover:text-blue-700 mr-2"
                                                data-modal-target="editserviceModal"
                                                data-modal-toggle="editserviceModal{{ $service->id }}">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <form action="{{ route('services.destroy', $service->id) }}" method="POST"
                                                class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500"> <i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
                <div class="py-6">
                    @if ($order->status_order == 'Menunggu')
                        <button type="button"
                            class="confirm-btn mr-3 inline-block px-6 py-3 font-bold text-center bg-gradient-to-tl from-green-600 to-lime-400 uppercase align-middle transition-all rounded-lg cursor-pointer leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs text-white">
                            Terima</button>
                    @endif
                    @if ($order->status_order == 'Sedang Diproses')
                        <button type="button"
                            class="confirm-btn mr-3 inline-block px-6 py-3 font-bold text-center bg-gradient-to-tl from-green-600 to-lime-400 uppercase align-middle transition-all rounded-lg cursor-pointer leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs text-white">Simpan</button>
                    @endif
                    <button type="button"
                        class="mr-3 inline-block px-6 py-3 font-bold text-center bg-gradient-to-tl from-red-600 to-rose-400 uppercase align-middle transition-all rounded-lg cursor-pointer leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs text-white"><a
                            href="{{ route('orders.index') }}">Kembali</button></a>
                </div>
            </div>
        </div>
        <!-- Modal Tambah Service -->
        <div id="tambahserviceModal" tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Tambah Data Service
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="tambahserviceModal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">

                        <form method="POST" action="{{ route('services.store') }}">
                            @csrf
                            <div class="grid gap-6 mb-6 md:grid-cols-2">
                                <input type="hidden" name="order_id" id="order_id" value="{{ $order->id }}">
                                <div>
                                    <label for="jenis_service"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                        Service</label>
                                    <input type="text" id="jenis_service" name="jenis_service"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Tambahkan Jenis Service" required>
                                </div>
                                <div>
                                    <label for="harga_service"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga
                                        Service</label>
                                    <input type="number" id="harga_service" name="harga_service"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Harga Service" required>
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="detail"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                                <textarea name="deskripsi" id="dekripsi" cols="10" rows="5"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Tambahkan Deskripsi Produk" required></textarea>
                            </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-hide="tambahserviceModal" type="submit"
                            class="mr-3 inline-block px-6 py-3 font-bold text-center bg-gradient-to-tl from-green-600 to-lime-400 uppercase align-middle transition-all rounded-lg cursor-pointer leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs text-white">
                            Tambah</button>
                        <button data-modal-hide="tambahserviceModal" type="button"
                            class="mr-3 inline-block px-6 py-3 font-bold text-center bg-gradient-to-tl from-red-600 to-rose-400 uppercase align-middle transition-all rounded-lg cursor-pointer leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs text-white">Batal</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal Edit Service -->
        @foreach ($services as $service)
            <div id="editserviceModal{{ $service->id }}" tabindex="-1" aria-hidden="true"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <form method="POST" action="{{ route('services.update', ['service' => $service->id]) }}">
                            @csrf
                            @method('PUT')
                            <!-- Modal header -->
                            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Edit Data Service
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="editserviceModal{{ $service->id }}">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-6 space-y-6">
                                <input type="hidden" name="order_id" value="{{ $order->id }}">
                                <div class="grid gap-6 mb-6 md:grid-cols-2">
                                    <div>
                                        <label for="jenis_service"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                            Service</label>
                                        <input type="text" id="jenis_service" name="jenis_service"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Tambahkan Jenis Service" value="{{ $service->jenis_service }}">
                                    </div>
                                    <div>
                                        <label for="harga_service"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga
                                            Service</label>
                                        <input type="number" id="harga_service" name="harga_service"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Harga Service"
                                            value="{{ number_format($service->harga_service, 0, '', '.') }}">
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <label for="deskripsi"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" cols="10" rows="5"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Tambahkan Deskripsi Produk">{{ $service->deskripsi }}</textarea>
                                </div>

                            </div>
                            <!-- Modal footer -->
                            <div
                                class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button data-modal-hide="editserviceModal{{ $service->id }}" type="submit"
                                    class="mr-3 inline-block px-6 py-3 font-bold text-center bg-gradient-to-tl from-green-600 to-lime-400 uppercase align-middle transition-all rounded-lg cursor-pointer leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs text-white">
                                    Simpan</button>
                                <button data-modal-hide="editserviceModal{{ $service->id }}" type="button"
                                    class="mr-3 inline-block px-6 py-3 font-bold text-center bg-gradient-to-tl from-red-600 to-rose-400 uppercase align-middle transition-all rounded-lg cursor-pointer leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs text-white">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    @endforeach

    <script>
        $(document).ready(() => {
            $('.confirm-btn').click(() => {
                $('.detail-form').submit();
            })
        });
    </script>
@endsection
