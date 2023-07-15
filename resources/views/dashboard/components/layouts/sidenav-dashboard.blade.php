    <!-- sidenav  -->
    <aside
        class="max-w-62.5 ease-nav-brand fixed inset-y-0 my-4 ml-4 block w-full -translate-x-full flex-wrap items-center justify-between overflow-y-auto rounded-2xl border-0 bg-white p-0 antialiased shadow-none transition-transform duration-200 xl:left-0 xl:translate-x-0 xl:bg-transparent z-10 xl:z-0">
        <div class="h-19.5">
            <i class="absolute top-0 right-0 hidden p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden"
                sidenav-close></i>
            <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700" href="#">
                <img src="{{ asset('assets/img/logo-ct.png') }}"
                    class="inline h-full max-w-full transition-all duration-200 ease-nav-brand max-h-8" alt="main_logo" />
                <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">Suman Motor Admin</span>
            </a>
        </div>

        <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />

        <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
            <ul class="flex flex-col pl-0 mb-0">
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors
                    {{ request()->segment(1) == 'dashboard-admin' ? 'py-2.7 shadow-soft-xl text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg bg-white px-4 font-semibold text-slate-700 transition-colors' : '' }}"
                        href="/dashboard-admin">
                        <div
                            class="bg-gradient-to-tl from-red-600 to-rose-400 shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fas fa-home text-white"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Dashboard</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors
                    {{ request()->segment(1) == 'users' ? 'py-2.7 shadow-soft-xl text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg bg-white px-4 font-semibold text-slate-700 transition-colors' : '' }}"
                        href="/users">
                        <div
                            class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-gradient-to-tl from-red-600 to-rose-400  bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fas fa-users text-white"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Data Pelanggan</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors
                    {{ request()->segment(1) == 'orders' ? 'py-2.7 shadow-soft-xl text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg bg-white px-4 font-semibold text-slate-700 transition-colors' : '' }}"
                        href="{{ route('orders.index') }}">
                        <div
                            class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-gradient-to-tl from-red-600 to-rose-400   bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fas fa-shopping-cart text-white"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Data Order</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors
                    {{ request()->segment(1) == 'motors' ? 'py-2.7 shadow-soft-xl text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg bg-white px-4 font-semibold text-slate-700 transition-colors' : '' }}"
                        href="{{ route('motors.index') }}">
                        <div
                            class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-gradient-to-tl from-red-600 to-rose-400   bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fas fa-motorcycle text-white"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Data Motor</span>
                    </a>
                </li>
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors
                    {{ request()->segment(1) == 'montirs' ? 'py-2.7 shadow-soft-xl text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg bg-white px-4 font-semibold text-slate-700 transition-colors' : '' }}"
                        href="/montirs">
                        <div
                            class="bg-gradient-to-tl from-red-600 to-rose-400  shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa fa-user-circle-o text-white"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Data Montir</span>
                    </a>
                </li>
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors
                    {{ request()->segment(1) == 'riwayats' ? 'py-2.7 shadow-soft-xl text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg bg-white px-4 font-semibold text-slate-700 transition-colors' : '' }}"
                        href="{{ route('riwayats.index') }}">
                        <div
                            class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-gradient-to-tl from-red-600 to-rose-400   bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa fa-money text-white"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Riwayat
                            Order</span>
                    </a>
                </li>
                <li class="w-full mt-4">
                    <h6 class="pl-6 ml-2 font-bold leading-tight uppercase text-xs opacity-60">Halaman Landing Page
                    </h6>
                </li>

                <li class="mt-0.5 w-full">
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="/">
                        <div
                            class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-gradient-to-tl from-red-600 to-rose-400  bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fas fa-th text-white"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Landing
                            Page</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="mx-4">
            <!-- load phantom colors for card after: -->

            <!-- pro btn  -->
            <a class="inline-block w-full px-6 py-3 my-4 font-bold text-center text-white uppercase align-middle transition-all ease-in border-0 rounded-lg select-none shadow-soft-md bg-150 bg-x-25 leading-pro text-xs bg-gradient-to-tl from-red-600 to-rose-400  hover:shadow-soft-2xl hover:scale-102"
                href="/logout">Log out</a>
        </div>

    </aside>
    <!-- end sidenav -->
