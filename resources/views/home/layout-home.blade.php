<!DOCTYPE html>
<html>
{{-- HEAD --}}
@include('home.components.utils.head-home')
{{-- BODY --}}

<body>
    @include('home.components.layouts.navbar-home')
    @yield('content')
    @include('home.components.layouts.footer-home')
    @include('home.components.utils.script-mobile')
</body>


</html>
