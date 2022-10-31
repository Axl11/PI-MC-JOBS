<!DOCTYPE html>
<html lang="es">

<x-head titulo="Index Vacantes">
    
    <x-navbar></x-navbar>

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
                                <th scope="col">Empresa</th>
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
                                <td>{{ $vacante->empresa->nombreEmpresa }}</td>
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
    <!-- <div class="visit-country">
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
    </div> -->

</x-head>
</html>