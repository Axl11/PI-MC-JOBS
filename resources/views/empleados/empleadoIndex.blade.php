<!DOCTYPE html>
<html lang="en">
<head>
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
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Empleados</title>
</head>
<body>
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ** Logo Start ** -->
                    <a href="" class="logo">
                        <img src="assets/images/logo.png" alt="">
                    </a>
                    <!-- ** Logo End ** -->
                    <!-- ** Menu Start ** -->
                    <ul class="nav">
                        <li><a href="">Inicio</a></li>
                        <li><a href="">Sobre nosotros</a></li>
                        <li><a href="" class="active">Vacantes</a></li>
                        <li><a href="">Contacto</a></li>
                        <li><a href="">Nada</a></li>
                    </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ** Menu End ** -->
                </nav>
            </div>
        </div>
    </div>
</header>

<section>
    <div class="text-center">
        <h1 class="text-dark pt-3">Listado de Empleados</h1>         
    </div>
    <div class="border-button pt-5 ps-4">
        <a href="/empleado/create">Crear nueva vacante</a>
    </div>
    <div class="container-fluid mt-1 px-4">
        <div class="table-responsive">
            <!-- table-bordered border-primary -->
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">NSS</th>
                        <th scope="col">Puesto</th>
                        <th scope="col">Sueldo</th>
                        <th scope="col">RFC</th>
                        <th scope="col">Fecha Nacimiento</th>
                        <th scope="col">CURP</th>
                        <th scope="col">Antiguedad</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                @foreach ($empleados as $empleado)
                <tbody>
                    <tr class="text-dark text-center">
                        <td class="table-dark">
                            <a href="/empleado/{{ $empleado->id }}">
                                {{ $empleado->nombreEmpleado }}
                            </a>
                        </td>
                        <td>{{ $empleado->apellidoEmpleado }}</td>
                        <td>{{ $empleado->numeroSeguroSocialEmpleado }}</td>
                        <td>{{ $empleado->puestoLaboralEmpleado }}</td>
                        <td>{{ $empleado->sueldoEmpleado }}</td>
                        <td>{{ $empleado->rfcEmpleado }}</td>
                        <td>{{ $empleado->fechaNacimientoEmpleado }}</td>
                        <td>{{ $empleado->curpEmpleado }}</td>
                        <td>{{ $empleado->antiguedadEmpleado }}</td>
                        <td>
                            <a class="btn btn-woox text-light" href="/empleado/{{ $empleado->id }}/edit">Editar</a>
                        </td>
                        <td>
                            <form action="/empleado/{{ $empleado->id }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <input type="submit" class="btn btn-danger" value="Eliminar">
    
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

<!--   <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2036 <a href="#">WoOx Travel</a> Company. All rights reserved. 
          <br>Design: <a href="https://templatemo.com" target="_blank" title="free CSS templates">TemplateMo</a> Distribution: <a href="https://themewagon.com target="_blank" >ThemeWagon</a></p>
        </div>
      </div>
    </div>
  </footer> -->

</body>
</html>