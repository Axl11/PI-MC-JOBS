<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vacante Index</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

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
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="" class="logo">
                            <img src="assets/images/logo.png" alt="">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="" class="active">Inicio</a></li>
                            <li><a href="">Sobre nosotros</a></li>
                            <li><a href="">Vacantes</a></li>
                            <li><a href="">Contacto</a></li>
                            <li><a href="">Nada</a></li>
                        </ul>   
                        <a class='menu-trigger'>
                            <span>Vacantes</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <div class="container mt-5 pt-5">
        <div class="text-center">
            <h1 class="text-dark pt-3">Listado de Vacantes</h1>         
        </div>
        <div class="border-button pt-5 ps-4">
            <a href="/vacante/create">Crear nueva vacante</a>
        </div>
        <div class="container-fluid mt-1 px-4">
            <div class="table-responsive">
            <div class="row">
                <div class="col">
                    <table class="table align-middle table-light table-bordered table-hover">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Sueldo</th>
                                <th scope="col">Dirección</th>
                                <th scope="col">Horario</th>
                                <th scope="col">Puestos disponibles</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        @foreach ($vacantes as $vacante)
                        <tbody>
                            <tr class="text-dark text-center">
                                <td class="table-dark">
                                    <a href="/vacante/{{ $vacante->id }}">
                                        {{ $vacante->nombreVacante }}
                                    </a>
                                </td>
                                <td>{{ $vacante->descripcionVacante }}</td>
                                <td>{{ $vacante->sueldoVacante }}</td>
                                <td>{{ $vacante->direccionVacante }}</td>
                                <td>{{ $vacante->horarioVacante }}</td>
                                <td>{{ $vacante->puestosDisponibles }}</td>
                                <td>
                                    <a class="btn btn-woox text-light" href="/vacante/{{ $vacante->id }}/edit">Editar</a>
                                </td>
                                <td>
                                    <form action="/vacante/{{ $vacante->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <input class="btn btn-danger" type="submit" value="Eliminar">
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="visit-country">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-heading">
                    <h2>Visit One Of Our Countries Now</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                    </div>
                </div>
            </div>
      
            <div class="row">
                <div class="col-lg-8">
                    <div class="items">
                        <div class="row">
                            <div class="col-lg-12">
                            @foreach ($vacantes as $vacante)
                                <div class="item">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-5">
                                            <div class="image">
                                                <img src="assets/images/country-01.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-sm-7">
                                            <div class="right-content">
                                                <h4>{{ $vacante->nombreVacante}}</h4>
                                                <span>Europe</span>
                                                <div class="main-button">
                                                    <a href="about.html">Explore More</a>
                                                </div>
                                                <p>{{ $vacante->descripcionVacante }}</p>
                                                <ul class="info">
                                                    <li><i class="fa fa-user"></i>${{ $vacante->sueldoVacante }}</li>
                                                    <li><i class="fa fa-globe"></i>{{ $vacante->horarioVacante }}</li>
                                                    <li><i class="fa fa-home"></i>{{ $vacante->puestosDisponibles }}</li>
                                                </ul>
                                                <div class="text-button">
                                                    <a href="about.html">Need Directions ? <i class="fa fa-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>