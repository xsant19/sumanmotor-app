        @extends('home.layout-home')
        @section('content')
            <!-- ====== features ====== -->
            <section class="py-16 h-screen bg-gray-100">
                <div class="mx-auto max-w-7xl px-8 md:px-6 bg-white rounded-lg shadow">
                    <!-- heading text -->
                    <div class="mb-7 sm:mb-7 pt-7">
                        <span class="font-medium text-red-500">Kontak Kami</span>
                        <h1 class="text-2xl font-bold text-slate-700 sm:text-3xl">Lokasi Kami</h1>
                    </div>
                    <!-- features img -->
                    <div class="md:flex md:justify-between md:gap-6 xl:gap-10 pb-10">
                        <div class="mb-5 max-h-[600px] overflow-hidden rounded-lg md:mb-0 md:w-5/12">
                            <iframe class="h-full scale-100 sm:w-full sm:object-cover"
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15779.05269550831!2d115.2279792!3d-8.6187208!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd23ff540899bcf%3A0x7080f64d37a3994a!2sSuman%20Motor!5e0!3m2!1sid!2sid!4v1689054177630!5m2!1sid!2sid"
                                style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                        <div class="md:w-7/12">
                            <div class="mb-16 flex flex-col">
                                <h1 class="text-2xl font-bold text-slate-700 sm:text-3xl">Hubungi Kami</h1>
                                <p class="mb-3 mt-3 text-slate-500">Terima kasih Anda telah menjadi pelanggan setia Bengkel
                                    Suman
                                    Motor.
                                </p>

                                <p class="mb-10 text-slate-500">Silahkan hubungi kami melalui kontak dibawah ini dan kami
                                    berusaha untuk memberikan pelayanan yang memuaskan untuk anda</p>
                                <ul>
                                    <li class="mb-6 flex items-center">
                                        <div
                                            class="flex h-[35px] w-[35px] min-w-[35px] items-center justify-center rounded-full bg-red-500 text-white">
                                            <ion-icon name="location-outline"></ion-icon>
                                        </div>
                                        <p class="ml-4 max-w-md font-medium text-slate-600">Jl. Cekomaria No.40, Peguyangan
                                            Kangin, Kec. Denpasar Utara, Kota Denpasar, Bali 80238</p>
                                    </li>
                                    <li class="mb-6 flex items-center">
                                        <div
                                            class="flex h-[35px] w-[35px] min-w-[35px] items-center justify-center rounded-full bg-red-500 text-white">
                                            <ion-icon name="logo-whatsapp"></ion-icon>
                                        </div>
                                        <p class="ml-4 max-w-md font-medium text-slate-600">+62895410901387</p>
                                    </li>
                                    <li class="mb-6 flex items-center">
                                        <div
                                            class="flex h-[35px] w-[35px] min-w-[35px] items-center justify-center rounded-full bg-red-500 text-white">
                                            <ion-icon name="mail-unread-outline"></ion-icon>
                                        </div>
                                        <p class="ml-4 max-w-md font-medium text-slate-600">Sumanmotor34@gmail.com</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ====== END features ====== -->
        @endsection
