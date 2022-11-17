<!DOCTYPE html>
<html lang="es">

<x-head titulo="Datos Departamento">

    <x-navbar></x-navbar>

    <div class="container mt-5 pt-5">
        <div class="text-center">
            <h1 class="text-dark pt-3">Detalle del Departamento</h1>         
        </div>
        <div class="border-button py-3 ps-4">
            <a href="/departamento">Regresar</a>
        </div>
        <div class="justify-content-center">
            <div class="row">
                <div class="col-6">
                    <div class="image">
                        <img class="rounded" src="{{URL::asset('images/showDepartamento.jpg')}}" alt="No hay nada">
                    </div>
                </div>
                <div class="col-6">
                    <h2>{{ $departamento->nombreDepartamento }}</h2>
                    <p>{{ $departamento->descripcionDepartamento }}</p>
                    <!-- <ul class="info">
                        <li>
                            <label class="fw-bold" for="numeroSeguroSocial">Número de Seguro Social: </label><br>
                            <i class="fa-solid fa-user-md"></i> {{ $departamento->numeroSeguroSocialEmpleado }} </li>
                    </ul> -->
                </div>
            </div>
        </div>
    </div>
</x-head>
</html>