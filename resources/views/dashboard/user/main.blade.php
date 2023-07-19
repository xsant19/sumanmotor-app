<!DOCTYPE html>
<html>
{{-- HEAD --}}
@include('dashboard.user.layouts.head')
@include('dashboard.user.layouts.script')

<body class="text-blueGray-700 antialiased">
    <noscript>You need to enable JavaScript to run this app.</noscript>
    <div id="root">
        {{-- NAVBAR --}}
        @include('dashboard.user.layouts.navbar')
        <div class="relative md:ml-64 bg-blueGray-50">
            {{-- SIDE BAR --}}
            @include('dashboard.user.layouts.sidenav')
            <!-- Header -->
            @yield('content')
        </div>
    </div>
    </div>
</body>

</html>
