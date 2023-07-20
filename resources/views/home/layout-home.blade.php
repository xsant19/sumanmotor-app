<!DOCTYPE html>
<html>
{{-- HEAD --}}
@include('home.components.utils.head-home')
{{-- BODY --}}
<script type="text/javascript" src="{{ asset('assets/floatingwhatsapp/jquery-3.3.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/floatingwhatsapp/floating-wpp.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/floatingwhatsapp/floating-wpp.js') }}"></script>
<link rel="stylesheet" href="{{ asset('assets/floatingwhatsapp/floating-wpp.css') }}">

<body>
    @include('home.components.layouts.navbar-home')
    @yield('content')
    @include('home.components.layouts.footer-home')
    @include('home.components.utils.script-mobile')
    <div id="myDiv"></div>
</body>
<script type="text/javascript">
    $(function() {
        $('#myDiv').floatingWhatsApp({
            phone: '+62895410901387',
            popupMessage: 'Halo, Suman Motor, saya ingin bertanya?',
            showPopup: true
        });
    });
</script>

</html>
