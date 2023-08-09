@extends('dashboard.layout-dashboard')
@section('title', 'Tabel Order')
@section('content')
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
                <h6>Tabel Order</h6>
                <button type="button"
                    class="mr-3 inline-block px-4 py-2 font-bold text-center bg-gradient-to-tl from-green-600 to-lime-400 uppercase align-middle transition-all rounded-lg cursor-pointer leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs text-white"><a
                        href="{{ route('orders.create') }}">Tambah
                        Data</a></button>
            </div>

            <div class="flex-auto px-0 pt-0 pb-2">
                <div class="p-0 overflow-x-auto">
                    <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                        <thead class="align-bottom">
                            <tr>
                                <th
                                    class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Nomor
                                </th>
                                <th
                                    class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Nama Pemilik
                                </th>
                                <th
                                    class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Nomor Antri
                                </th>
                                <th
                                    class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Nomor Order
                                </th>
                                <th
                                    class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Nama Motor
                                </th>
                                <th
                                    class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    No Polisi
                                </th>
                                <th
                                    class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Tanggal Order</th>
                                <th
                                    class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Nama Montir
                                </th>
                                <th
                                    class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Status</th>
                                <th
                                    class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $index => $order)
                                <tr>
                                    <td class="align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <div class="flex px-2 py-1">
                                            <div>
                                                <h6 class="ml-2 p-2 mb-0 leading-normal text-sm">{{ $index + 1 }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td
                                        class="p-2 align-middle text-left bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 font-semibold leading-tight text-xs">{{ $order->user->nama }}</p>
                                    </td>
                                    <td
                                        class="p-2 align-middle text-center bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 font-semibold leading-tight text-xs">{{ $order->no_antri }}</p>
                                    </td>
                                    <td
                                        class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 font-semibold leading-tight text-xs">{{ $order->no_order }}</p>
                                    </td>
                                    <td
                                        class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 font-semibold leading-tight text-xs">{{ $order->motor->nama }}</p>
                                    </td>
                                    <td
                                        class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 font-semibold leading-tight text-xs">{{ $order->motor->no_polisi }}
                                        </p>
                                    </td>
                                    <td
                                        class="p-2 align-middle bg-transparent border-b text-sm whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 font-semibold leading-tight text-xs">
                                            {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $order->tanggal_order)->isoFormat('l/ HH:mm') }}
                                        </p>
                                    </td>
                                    <td
                                        class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 font-semibold leading-tight text-xs">{{ $order->montir->nama }}
                                        </p>
                                    </td>
                                    <td
                                        class="p-2 align-middle bg-transparent border-b text-sm whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 font-semibold leading-tight text-xs">{{ $order->status_order }}</p>
                                    </td>
                                    <td
                                        class="p-2 leading-normal text-left align-middle bg-transparent border-b text-sm whitespace-nowrap shadow-transparent">
                                        <div>
                                            <div>
                                                <button class="text-blue-500 hover:text-blue-700 mr-2"
                                                    onclick="window.location.href = '{{ route('orders.detail', $order->id) }}'">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST"
                                                    class="inline-block mr-2" id="deleteForm{{ $order->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="text-red-500 delete-btn"
                                                        data-id="{{ $order->id }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                                @if ($order->status_order != 'Menunggu')
                                                    <button
                                                        class="mr-3 inline-block px-2 py-1.5 font-bold text-center bg-gradient-to-tl from-green-600 to-lime-400 uppercase align-middle transition-all rounded-lg cursor-pointer leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs text-white"
                                                        onclick="window.location.href = '{{ route('orders.close', $order->id) }}'">
                                                        Selesai <i class="fas fa-check"></i>
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="mt-6"> {{ $orders->links() }}</div>
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
