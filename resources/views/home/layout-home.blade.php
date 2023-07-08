<!DOCTYPE html>
<html>
{{-- HEAD --}}
@include('home.components.utils.head-home')
{{-- BODY --}}
<script type="text/javascript" src="../assets/floatingwhatsapp/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../assets/floatingwhatsapp/floating-wpp.min.js"></script>
<link rel="stylesheet" href="../assets/floatingwhatsapp/floating-wpp.css">

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
            phone: '5491133359850',
            popupMessage: 'Hello, how can we help you?',
            showPopup: true
        });
    });
</script>

</html>
