<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}" />
    <title>@yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js', 'app/**', 'resources/**'])
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}"rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}"rel="stylesheet" />
    <!-- Popper -->
    <link href="https://cdn.datatables.net/1.13.5/css/dataTables.tailwindcss.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Main Styling -->
    {{-- <link href="../assets/css/soft-ui-dashboard-tailwind.css?v=1.0.5'" rel="stylesheet" /> --}}
    <link href="{{ asset('assets/css/soft-ui-dashboard-tailwind.css') }}" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>
