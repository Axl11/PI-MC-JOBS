<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $titulo }}</title>
    
    <script src="https://kit.fontawesome.com/21fe155778.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('assets/estilos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/woox/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/woox/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/woox/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/woox/templatemo-woox-travel.css') }}">

    
</head>
<body>
    {{ $slot }}
    <script src="{{ asset('assets/jquery.js') }}"></script>
    <script src="{{ asset('assets/navbar.js') }}"></script>
    <script src="{{ asset('assets/bootstrap1.js') }}"></script>
    <script src="{{ asset('assets/woox/custom.js') }}"></script>
    <script src="{{ asset('assets/woox/isotope.js') }}"></script>
    <script src="{{ asset('assets/woox/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/woox/popup.js') }}"></script>
    <script src="{{ asset('assets/woox/tabs.js') }}"></script>
</body>