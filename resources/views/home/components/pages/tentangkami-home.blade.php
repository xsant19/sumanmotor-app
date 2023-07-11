        @extends('home.layout-home')
        @section('content')
            <!-- ====== about ====== -->
            <section class="py-16 h-screen ">
                <div class="mx-auto max-w-7xl px-8 md:px-6">
                    <div class="md:flex md:justify-between md:gap-6">
                        <div class="md:w-6/12">
                            <!-- heading text -->
                            <div class="mb-5 sm:mb-10">
                                <span class="font-medium text-red-500">Tentang Kami</span>
                                <h6 class="text-2xl font-bold text-slate-700 sm:text-3xl">Suman Motor</h6>
                            </div>
                            <p class="text-slate-500 mb-6 text-justify">Bengkel Suman Motor didirikan pada tahun 2007 dan
                                telah menjadi
                                salah satu bengkel otomotif terpercaya dengan pengalaman bertahun-tahun. Mereka menyediakan
                                layanan perawatan dan perbaikan kendaraan dengan keahlian teknis yang handal dan pelayanan
                                yang ramah.Dengan komitmen terhadap kualitas dan kepuasan pelanggan,
                                Suman Motor menjadi pilihan yang dapat diandalkan bagi pemilik kendaraan.</p>
                            <div class="mt-6 flex flex-wrap gap-4">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/7/7b/Honda_Logo.svg" alt="brand"
                                    class="w-32 cursor-pointer rounded-lg border border-blue-300/20 bg-white px-5 py-3 shadow-md shadow-blue-500/5 duration-200 hover:scale-95 sm:w-36">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/8/8b/Yamaha_Motor_Logo_%28full%29.svg"
                                    alt="brand"
                                    class="w-32 cursor-pointer rounded-lg border border-blue-300/20 bg-white px-5 py-3 shadow-md shadow-blue-500/5 duration-200 hover:scale-95 sm:w-36">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/1/12/Suzuki_logo_2.svg"
                                    alt="brand"
                                    class="w-32 cursor-pointer rounded-lg border border-blue-300/20 bg-white px-5 py-3 shadow-md shadow-blue-500/5 duration-200 hover:scale-95 sm:w-36">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/1/15/Kawasaki_Logo_vert.svg"
                                    alt="brand"
                                    class="w-32 cursor-pointer rounded-lg border border-blue-300/20 bg-white px-5 py-3 shadow-md shadow-blue-500/5 duration-200 hover:scale-95 sm:w-36">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/a/a0/Vespa-logo.svg" alt="brand"
                                    class="w-32 cursor-pointer rounded-lg border border-blue-300/20 bg-white px-5 py-3 shadow-md shadow-blue-500/5 duration-200 hover:scale-95 sm:w-36">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/a/a9/KTM-Logo.svg" alt="brand"
                                    class="w-32 cursor-pointer rounded-lg border border-blue-300/20 bg-white px-5 py-3 shadow-md shadow-blue-500/5 duration-200 hover:scale-95 sm:w-36">
                            </div>
                        </div>

                        <!-- about img -->
                        <div class="mt-8 flex justify-center md:mt-0 md:w-5/12">
                            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                            <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_6wbxjhf1.json"
                                background="transparent" speed="1" loop autoplay>
                            </lottie-player>
                        </div>

                    </div>
                </div>
            </section>
            <!-- ====== END about ====== -->
        @endsection
