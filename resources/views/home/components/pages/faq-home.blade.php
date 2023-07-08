@extends('home.layout-home')
@section('content')
    <section class="py-16">
        <div class="mx-auto max-w-7xl px-8 md:px-6">
            <!-- heading text -->
            <div class="mb-5 sm:mb-10">
                <span class="font-medium text-red-500">Ada yang bisa kami bantu?</span>
                <h1 class="text-2xl font-bold text-slate-700 sm:text-3xl">Hal yang sering ditanyakan</h1>
            </div>
            <!-- wrapper -->
            <div class="md:flex md:justify-between md:gap-6">
                <div class="mb-8 flex justify-center md:mb-0 md:w-5/12">
                    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                    <lottie-player class="max-h-[500px] md:max-h-max"
                        src="https://assets7.lottiefiles.com/packages/lf20_r3auoDsc3t.json" background="transparent"
                        speed="0.5"autoplay>
                    </lottie-player>
                </div>

                <div class="md:w-6/12">
                    <div class="" x-data="{ selected: 1 }">
                        <ul>
                            <li class="relative mb-5">
                                <button type="button" class="w-full rounded-lg bg-red-50 px-8 py-6 text-left"
                                    @click="selected !== 1 ? selected = 1 : selected = null">
                                    <div class="flex items-center justify-between">
                                        <h4 class="font-medium text-slate-600">Apakah Anda memberikan layanan pengambilan
                                            dan pengantaran kendaraan? </h4>
                                        <ion-icon name="chevron-down-circle-outline" class="w-8 text-lg text-red-500">
                                        </ion-icon>
                                    </div>
                                </button>

                                <div class="relative max-h-0 overflow-hidden rounded-b-lg bg-red-50/30 transition-all duration-500"
                                    x-ref="container1"
                                    x-bind:style="selected == 1 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                                    <div class="p-6">
                                        <p class="text-slate-500">ipsum! Assumenda, dolorem nihil. Commodi, qui? Officiis
                                            provident, cumque perspiciatis magni commodi rem nihil,</p>
                                    </div>
                                </div>
                            </li>

                            <li class="relative mb-5">
                                <button type="button" class="w-full rounded-lg bg-red-50 px-8 py-6 text-left"
                                    @click="selected !== 2 ? selected = 2 : selected = null">
                                    <div class="flex items-center justify-between">
                                        <h4 class="font-medium text-slate-600">Apakah Anda menggunakan suku cadang asli atau
                                            suku cadang aftermarket?</h4>
                                        <ion-icon name="chevron-down-circle-outline" class="w-8 text-lg text-red-500">
                                        </ion-icon>
                                    </div>
                                </button>

                                <div class="relative max-h-0 overflow-hidden rounded-b-lg bg-red-50/30 transition-all duration-500"
                                    x-ref="container2"
                                    x-bind:style="selected == 2 ? 'max-height: ' + $refs.container2.scrollHeight + 'px' : ''">
                                    <div class="p-6">
                                        <p class="text-slate-500">ipsum! Assumenda, dolorem nihil. Commodi, qui? Officiis
                                            provident, cumque perspiciatis magni commodi rem nihil,</p>
                                    </div>
                                </div>
                            </li>

                            <li class="relative mb-5">
                                <button type="button" class="w-full rounded-lg bg-red-50 px-8 py-6 text-left"
                                    @click="selected !== 3 ? selected = 3 : selected = null">
                                    <div class="flex items-center justify-between">
                                        <h4 class="font-medium text-slate-600">Lorem ipsum dolor sit, amet consectetur?</h4>
                                        <ion-icon name="chevron-down-circle-outline" class="w-8 text-lg text-red-500">
                                        </ion-icon>
                                    </div>
                                </button>

                                <div class="relative max-h-0 overflow-hidden rounded-b-lg bg-red-50/30 transition-all duration-500"
                                    x-ref="container3"
                                    x-bind:style="selected == 3 ? 'max-height: ' + $refs.container3.scrollHeight + 'px' : ''">
                                    <div class="p-6">
                                        <p class="text-slate-500">ipsum! Assumenda, dolorem nihil. Commodi, qui? Officiis
                                            provident, cumque perspiciatis magni commodi rem nihil,</p>
                                    </div>
                                </div>
                            </li>

                            <li class="relative mb-5">
                                <button type="button" class="w-full rounded-lg bg-red-50 px-8 py-6 text-left"
                                    @click="selected !== 4 ? selected = 4 : selected = null">
                                    <div class="flex items-center justify-between">
                                        <h4 class="font-medium text-slate-600">Lorem ipsum dolor sit, amet consectetur?</h4>
                                        <ion-icon name="chevron-down-circle-outline" class="w-8 text-lg text-red-500">
                                        </ion-icon>
                                    </div>
                                </button>

                                <div class="relative max-h-0 overflow-hidden rounded-b-lg bg-red-50/30 transition-all duration-500"
                                    x-ref="container4"
                                    x-bind:style="selected == 4 ? 'max-height: ' + $refs.container4.scrollHeight + 'px' : ''">
                                    <div class="p-6">
                                        <p class="text-slate-500">ipsum! Assumenda, dolorem nihil. Commodi, qui? Officiis
                                            provident, cumque perspiciatis magni commodi rem nihil,</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
