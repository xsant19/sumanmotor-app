@extends('home.layout-home')
@section('title', 'Suman Motor')
@section('content')
    <main>
        <div class="relative pt-16 pb-32 flex content-center items-center justify-center" style="min-height: 75vh;">
            <div class="absolute top-0 w-full h-full bg-center bg-cover"
                style='background-image: url("./assets/img/Bengkel.jpg");'>
                <span id="blackOverlay" class="w-full h-full absolute opacity-60 bg-black"></span>
            </div>
            <div class="container relative mx-auto">
                <div class="items-center flex flex-wrap">
                    <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
                        <div class="">
                            <h1 class="text-white font-semibold text-5xl " data-aos="fade-up">
                                Selamat Datang di Bengkel Suman Motor
                            </h1>
                            <p class="mt-4 text-lg text-gray-300" data-aos="fade-up">
                                Dengan pengalaman bertahun-tahun dalam
                                industri ini, tim teknisi kami yang terampil dan berdedikasi siap memberikan pelayanan
                                terbaik kepada pelanggan kami.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden"
                style="height: 70px;">
                <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
                    version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                    <polygon class="text-gray-300 fill-current" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
        <section class="pb-20 bg-gray-300 -mt-24">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap">
                    <div class="lg:pt-12 pt-6 w-full md:w-4/12 px-4 text-center">
                        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg"
                            data-aos="fade-up">
                            <div class="px-4 py-5 flex-auto">
                                <div
                                    class="text-white
                                p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg
                                rounded-full bg-red-400">
                                    <i class="fas fa-motorcycle"></i>
                                </div>
                                <h6 class="text-xl font-semibold">Ban</h6>
                                <p class="mt-2 mb-4 text-gray-600">
                                    Kami menyediakan berbagai jenis ban berkualitas tinggi yang cocok berbagai jenis sepeda
                                    motor.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-4/12 px-4 text-center">
                        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg"
                            data-aos="fade-up">
                            <div class="px-4 py-5 flex-auto">
                                <div
                                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-blue-400">
                                    <i class="fas fa-oil-can"></i>
                                </div>
                                <h6 class="text-xl font-semibold">Oli</h6>
                                <p class="mt-2 mb-4 text-gray-600">
                                    Kami menyediakan oli berkualitas tinggi yang dirancang khusus untuk menjaga performa
                                    optimal mesin kendaraan Anda.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="pt-6 w-full md:w-4/12 px-4 text-center">
                        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg"
                            data-aos="fade-up">
                            <div class="px-4 py-5 flex-auto">
                                <div
                                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-green-400">
                                    <i class="fas fa-wrench"></i>
                                </div>
                                <h6 class="text-xl font-semibold">Service</h6>
                                <p class="mt-2 mb-4 text-gray-600">
                                    Tim mekanik kami yang terlatih dan terampil siap membantu Anda menjaga motor Anda dalam
                                    kondisi terbaik.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap items-center mt-32">
                    <div class="w-full md:w-5/12 px-4 mr-auto ml-auto">
                        <div class="text-gray-600 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-gray-100"
                            data-aos="fade-down">
                            <i class="fas fa-user-friends text-xl"></i>
                        </div>
                        <h3 class="text-3xl mb-2 font-semibold leading-normal" data-aos="fade-right">
                            Visi
                        </h3>
                        <ul class="list-none mt-6">
                            <li class="py-2">
                                <div class="flex items-center">
                                    <div>
                                        <span
                                            class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-red-600 bg-gray-100 mr-3"
                                            data-aos="fade-right"><i class="fas fa-star"></i></span>
                                    </div>
                                    <div>
                                        <h4 class="text-gray-600" data-aos="fade-right">
                                            Memberikan Pelayanan Terbaik dan Terpercaya
                                        </h4>
                                    </div>
                                </div>
                            </li>
                            <li class="py-2">
                                <div class="flex items-center">
                                    <div>
                                        <span
                                            class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full  text-red-600 bg-gray-100 mr-3"
                                            data-aos="fade-right"><i class="fas fa-star"></i></span>
                                    </div>
                                    <div>
                                        <h4 class="text-gray-600" data-aos="fade-right">Menciptakan Pengalaman Pelanggan
                                            yang Memuaskan</h4>
                                    </div>
                                </div>
                            </li>
                            <li class="py-2">
                                <div class="flex items-center">
                                    <div>
                                        <span
                                            class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-red-600 bg-gray-100  mr-3"
                                            data-aos="fade-right"><i class="fas fa-star"></i></span>
                                    </div>
                                    <div>
                                        <h4 class="text-gray-600" data-aos="fade-right">Menyediakan Service Terbaik Untuk
                                            Konsumen.</h4>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="w-full md:w-4/12 px-4 mr-auto ml-auto" data-aos="fade-up">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-red w-full mb-6 shadow-lg rounded-lg bg-red-600">
                            <img alt="..." src="{{ asset('assets/img/bengkel2.jpg') }}"
                                class="w-full align-middle rounded-t-lg" />
                            <blockquote class="relative p-8 mb-4">
                                <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 583 95"
                                    class="absolute left-0 w-full block" style="height: 95px; top: -94px;">
                                    <polygon points="-30,95 583,95 583,65" class="text-red-600 fill-current"></polygon>
                                </svg>
                                <h4 class="text-xl font-bold text-white">
                                    Suman Motor
                                </h4>
                                <p class="text-md font-light mt-2 text-white">
                                    "Kami tidak hanya memperbaiki mesin, kami membangun kepercayaan. Dengan ketelitian,
                                    keahlian, dan keramahan, kami menghadirkan keandalan dan keselamatan bagi kendaraan
                                    Anda."
                                </p>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="relative py-20">
            <div class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
                style="height: 80px;">
                <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                    <polygon class="text-white fill-current" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
            <div class="container mx-auto px-4">
                <div class="items-center flex flex-wrap ">
                    <div class="w-full md:w-4/12 ml-auto mr-auto px-4" data-aos="fade-up">
                        <img alt="..." class="max-w-full rounded-lg shadow-lg"
                            src="{{ asset('assets/img/logo.png') }}" />
                    </div>
                    <div class="w-full md:w-5/12 ml-auto mr-auto px-4">
                        <div class="md:pr-12">
                            <div class="text-red-600 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-white-300"
                                data-aos="fade-down">
                                <i class="fas fa-rocket text-xl"></i>
                            </div>
                            <h3 class="text-3xl font-semibold" data-aos="fade-right">Misi</h3>
                            <ul class="list-none mt-6">
                                <li class="py-2">
                                    <div class="flex items-center" data-aos="fade-right">
                                        <div>
                                            <span
                                                class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-red-600 bg-gray-100 mr-3"><i
                                                    class="fas fa-star"></i></span>
                                        </div>
                                        <div>
                                            <h4 class="text-gray-600">
                                                Memberikan Pelayanan Profesional dan Berkualitas
                                            </h4>
                                        </div>
                                    </div>
                                </li>
                                <li class="py-2">
                                    <div class="flex items-center" data-aos="fade-right">
                                        <div>
                                            <span
                                                class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-red-600 bg-gray-100 mr-3"><i
                                                    class="fas fa-star"></i></span>
                                        </div>
                                        <div>
                                            <h4 class="text-gray-600">Memastikan Keandalan dan Keselamatan Kendaraan
                                                Pelanggan</h4>
                                        </div>
                                    </div>
                                </li>
                                <li class="py-2">
                                    <div class="flex items-center" data-aos="fade-right">
                                        <div>
                                            <span
                                                class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-red-600 bg-gray-100 mr-3"><i
                                                    class="fas fa-star"></i></span>
                                        </div>
                                        <div>
                                            <h4 class="text-gray-600">Membangun Hubungan Jangka Panjang dengan Pelanggan
                                            </h4>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="pt-20 pb-48 bg-blue-gray-50">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap justify-center text-center mb-10">
                    <div class="w-full lg:w-6/12 px-4">
                        <h2 class="text-4xl font-semibold" data-aos="fade-right">Brand Partner</h2>
                        <p class="text-lg leading-relaxed m-4 text-gray-600" data-aos="fade-up">
                            Kepercayaan dan kerjasama yang kuat antara Suman Motor dan Brand Partner memastikan bahwa
                            kendaraan pelanggan diperbaiki dengan komponen yang tepat dan berkualitas tinggi.
                        </p>
                    </div>
                </div>
                <div class="flex flex-wrap">
                    <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 xl:gap-8">
                        <div class="group flex cursor-pointer flex-col items-center rounded-xl border border-blue-500/10 bg-white px-5 py-8 shadow-lg shadow-blue-300/10 duration-200"
                            data-aos="flip-down">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/f/fc/Inoue_Rubber_company_logo.svg"
                                alt="" class="h-20 w-screen">
                        </div>
                        <div class="group flex cursor-pointer flex-col items-center rounded-xl border border-blue-500/10 bg-white px-5 py-8 shadow-lg shadow-blue-300/10 duration-200"
                            data-aos="flip-down">
                            <img src="https://files.tokoparts.com/images/car-brand-logo/YEc6Hoo3LqMr47YDhyzJRSixJf91nOFQOGTbWduI.png"
                                alt="" class="h-20 w-30">
                        </div>
                        <div class="group flex cursor-pointer flex-col items-center rounded-xl border border-blue-500/10 bg-white px-5 py-8 shadow-lg shadow-blue-300/10 duration-200"
                            data-aos="flip-down">
                            <img src="https://seeklogo.com/images/F/federal-oil-logo-93FE8ED430-seeklogo.com.png"
                                alt="" class="h-20 w-30">
                        </div>
                        <div class="group flex cursor-pointer flex-col items-center rounded-xl border border-blue-500/10 bg-white px-5 py-8 shadow-lg shadow-blue-300/10 duration-200"
                            data-aos="flip-down">
                            <img src="https://seeklogo.com/images/T/top-1-logo-5C595830FD-seeklogo.com.png" alt=""
                                class="h-20 w-30">
                        </div>
                        <div class="group flex cursor-pointer flex-col items-center rounded-xl border border-blue-500/10 bg-white px-5 py-8 shadow-lg shadow-blue-300/10 duration-200"
                            data-aos="flip-down">
                            <img src="https://seeklogo.com/images/Y/yamalube-logo-2CB62D4519-seeklogo.com.png"
                                alt="" class="h-20 w-30">
                        </div>
                        <div class="group flex cursor-pointer flex-col items-center rounded-xl border border-blue-500/10 bg-white px-5 py-8 shadow-lg shadow-blue-300/10 duration-200"
                            data-aos="flip-down">
                            <img src="https://seeklogo.com/images/P/pertamina-logo-E77BE5DE0C-seeklogo.com.png"
                                alt="" class="h-20 w-screen">
                        </div>
                    </div>
                </div>
        </section>
    </main>
@endsection
