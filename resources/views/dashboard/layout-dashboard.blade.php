<!DOCTYPE html>
<html>
{{-- HEAD --}}
@include('dashboard.components.utils.head-dashboard')
{{-- BODY --}}

<body class="m-0 font-sans antialiased font-normal text-base leading-default bg-gray-50 text-slate-500">
    @include('dashboard.components.layouts.sidenav-dashboard')
    <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
        @include('dashboard.components.layouts.navbar-dashboard')
        @yield('content')
    </main>
    @include('dashboard.components.layouts.fixed-plugin-dashboard')
    @include('dashboard.components.utils.script-dashboard')
</body>

</html>
