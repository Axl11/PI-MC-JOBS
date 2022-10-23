<!DOCTYPE html>
<html lang="es">

<x-head titulo="Datos Empleado">

    <x-navbar></x-navbar>

    <div class="container mt-5 pt-5">
        <div class="text-center">
            <h1 class="text-dark pt-3">Detalle del Empleado</h1>         
        </div>
        <div class="border-button py-3 ps-4">
            <a href="/empleado">Regresar</a>
        </div>
        <div class="justify-content-center">
            <div class="row">
                <div class="col-6">
                    <div class="image">
                        <img class="rounded" src="{{URL::asset('images/showEmpleado.jpg')}}" alt="No hay nada">
                    </div>
                </div>
                <div class="col-6">
                    <h2>{{ $empleado->nombreEmpleado }} {{ $empleado->apellidoEmpleado }}</h3>
                    <p>{{ $empleado->puestoLaboralEmpleado }}</p>
                    <ul class="info">
                        <li>
                            <label class="fw-bold" for="numeroSeguroSocial">Número de Seguro Social: </label><br>
                            <i class="fa-solid fa-user-md"></i> {{ $empleado->numeroSeguroSocialEmpleado }} </li>
                        <li>
                            <label class="fw-bold" for="sueldo">Sueldo: </label><br>
                            <i class="fa-solid fa-money-bill"></i>  ${{ $empleado->sueldoEmpleado }}</li>
                        <li>
                            <label class="fw-bold" for="rfc">Registro Federal del Contribuyente: </label><br>
                            <i class="fa-solid fa-user-circle"></i>  {{ $empleado->rfcEmpleado }}</li>
                        <li>
                            <label class="fw-bold" for="fechaNacimiento">Fecha de Nacimiento: </label><br>
                            <i class="fa-solid fa-birthday-cake"></i>  {{ $empleado->fechaNacimientoEmpleado }}</li>
                        <li>
                            <label class="fw-bold" for="curp">CURP: </label><br>
                            <i class="fa-solid fa-id-badge"></i>  {{ $empleado->curpEmpleado }}</li>
                        <li>
                            <label class="fw-bold" for="antiguedad">Antiguedad: </label><br>
                            <i class="fa-solid fa-calendar"></i>  {{ $empleado->antiguedadEmpleado }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-head>
</html>