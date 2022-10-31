<!DOCTYPE html>
<html lang="es">

<x-head titulo="Datos Vacante">
    
    <x-navbar></x-navbar>

    <div class="container mt-5 pt-5">
        <div class="text-center">
            <h1 class="text-dark pt-3">Detalle de la Vacante</h1>         
        </div>
        <div class="border-button py-3 ps-4">
            <a href="/vacante">Regresar</a>
        </div>
        <div class="justify-content-center">
            <div class="row">
                <div class="col-6">
                    <div class="image">
                        <img class="rounded" src="{{URL::asset('images/audifonos.jpg')}}" alt="No hay nada">
                    </div>
                </div>
                <div class="col-6">
                    <h2>{{ $vacante->nombreVacante }}</h3>
                    <p>{{ $vacante->descripcionVacante }}</p>
                    <ul class="info">
                        <li>
                            <label class="fw-bold" for="empresa_id">Empresa: </label><br>
                            <i class="fa-solid fa-business-time"></i>  {{ $vacante->empresa->nombreEmpresa }}</li>
                        <li>
                            <label class="fw-bold" for="domicilio">Domicilio: </label><br>
                            <i class="fa-solid fa-house"></i>  {{ $vacante->direccionVacante }}</li>
                        <li>
                            <label class="fw-bold" for="sueldo">Sueldo: </label><br>
                            <i class="fa-solid fa-money-bill"></i>  ${{ $vacante->sueldoVacante }}</li>
                        <li>
                            <label class="fw-bold" for="horario">Horario: </label><br>
                            <i class="fa-solid fa-clock"></i>  {{ $vacante->horarioVacante }}</li>
                        <li>
                            <label class="fw-bold" for="puestos">Puestos Disponibles: </label><br>
                            <i class="fa-solid fa-user"></i>  {{ $vacante->puestosDisponibles }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-head>
</html>