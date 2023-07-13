<!DOCTYPE html>
<html>

<head>
    @include('dashboard.template_admin.metadata')
</head>

<!-- Popup -->
@include('dashboard.template_admin.popup')
<!-- end popup -->

<body class="m-0 font-sans antialiased font-normal text-base leading-default bg-gray-50 text-slate-500">


    <!-- sidenav  -->
    @include('dashboard.template_admin.sidenav')
    <!-- end sidenav -->

    <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">



        <!-- Navbar -->
        @include('dashboard.template_admin.navbar')
        <!-- end Navbar -->

        <!-- cards -->
        <div class="w-full px-6 py-6 mx-auto">
            <!-- row 1 -->
            @yield('content')

            <!-- footer -->
            @include('dashboard.template_admin.footer')
        </div>
        <!-- end cards -->
    </main>
    @include('dashboard.template_admin.setting')
</body>
@include('dashboard.template_admin.metascript')

</html>
