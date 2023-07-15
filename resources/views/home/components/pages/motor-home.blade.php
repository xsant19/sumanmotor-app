@extends('home.layout-user')
@section('content_dashboard')
    <div class="py-6">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-2xl font-bold mb-4">Data Motor</h2>
            <div class="bg-white rounded-md shadow overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Nomor</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Nama Motor</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Jenis Motor</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">No Polisi</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($motors as $motor)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $motor->nama }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $motor->jenis_motor }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $motor->no_polisi }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button class="text-blue-500 hover:text-blue-700 mr-2">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="text-green-500 hover:text-blue-700 mr-2">
                                        <i class="fas fa-tools" data-dialog-target="dialog"></i>
                                    </button>
                                </td>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div data-dialog-backdrop="dialog" data-dialog-backdrop-close="true"
                class="pointer-events-none fixed inset-0 z-[999] grid h-screen w-screen place-items-center bg-black bg-opacity-60 opacity-0 backdrop-blur-sm transition-opacity duration-300">
                <div data-dialog="dialog"
                    class="relative m-4 md:w-2/5 md:min-w-[40%] md:max-w-[40%] rounded-lg bg-white font-sans text-base font-light leading-relaxed text-blue-gray-500 antialiased shadow-2xl">
                    <div
                        class="flex shrink-0 items-center p-4 font-sans text-2xl font-semibold leading-snug text-blue-gray-900 antialiased">
                        Order Perbaikan
                    </div>
                    <div
                        class="relative border-t border-b border-t-blue-gray-100 border-b-blue-gray-100 p-5 font-sans text-base font-light leading-relaxed text-blue-gray-500 antialiased sm:p-2 my-4">
                        {{-- Content --}}
                        <form className="mt-8 mb-2 w-80 max-w-screen-lg sm:w-96">
                            <div class="relative h-11 w-full min-w-[200px]">
                                <textarea type="text" cols="10" rows="5" placeholder="Masukkan Kendala Anda"
                                    class="peer h-full w-full border-b border-blue-gray-200 bg-transparent pt-4 pb-1.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border-blue-gray-200 focus:border-red-500 focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"></textarea>
                                <label
                                    class="after:content[' '] pointer-events-none absolute left-0 -top-2.5 flex h-full w-full select-none text-sm font-normal leading-tight text-blue-gray-500 transition-all after:absolute after:-bottom-2.5 after:block after:w-full after:scale-x-0 after:border-b-2 after:border-red-500 after:transition-transform after:duration-300 peer-placeholder-shown:leading-tight peer-placeholder-shown:text-blue-gray-500 peer-focus:text-sm peer-focus:leading-tight peer-focus:text-red-500 peer-focus:after:scale-x-100 peer-focus:after:border-red-500 peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                                    Kendala
                                </label>
                            </div>
                        </form>
                    </div>
                    <div class="flex shrink-0 flex-wrap items-center justify-end p-4 text-blue-gray-500">
                        <button data-ripple-dark="true" data-dialog-close="true"
                            class="middle none center mr-1 rounded-lg py-3 px-6 font-sans text-xs font-bold bg-red-500 uppercase text-white shadow-md shadow-red-500/20 transition-all hover:shadow-lg hover:shadow-red-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                            Batal
                        </button>
                        <button type="submit" data-ripple-light="true" data-dialog-close="true"
                            class="middle none center rounded-lg bg-gradient-to-tr from-green-600 to-green-400 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-green-500/20 transition-all hover:shadow-lg hover:shadow-green-500/40 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                            Order
                        </button>
                    </div>
                </div>
            </div>
            <!-- from node_modules -->
            <script src="node_modules/@material-tailwind/html@latest/scripts/dialog.js"></script>

            <!-- from cdn -->
            <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/dialog.js"></script>
        @endsection
