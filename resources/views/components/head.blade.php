<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $titulo }}</title>
    @vite([
        'resources/css/bootstrap.css', 
        'resources/css/woox/animate.css',
        'resources/css/woox/fontawesome.css',
        'resources/css/woox/owl.css',
        'resources/css/woox/templatemo-woox-travel.css',
        'resources/js/bootstrap1.js',
        'resources/js/woox/vendor/jquery.js',
        'resources/js/woox/custom.js',
        'resources/js/woox/isotope.js',
        'resources/js/woox/owl-carousel.js',
        'resources/js/woox/popup.js',
        'resources/js/woox/tabs.js'
    ])
    
</head>
<body>
    {{ $slot }}
</body>