<!DOCTYPE html>
<html lang="es">

<x-head titulo="Datos Empresa">

    <x-navbar></x-navbar>

    <div class="container mt-5 pt-5">
        <div class="text-center">
            <h1 class="text-dark pt-3">Detalle de la Empresa</h1>         
        </div>
        <div class="border-button py-3 ps-4">
            <a href="/empresa">Regresar</a>
        </div>
        <div class="justify-content-center">
            <div class="row">
                <div class="col-6">
                    <div class="image">
                        <img class="rounded" src="{{URL::asset('images/showEmpresa.jpg')}}" alt="No hay nada">
                    </div>
                </div>
                <div class="col-6">
                    <h2>{{ $empresa->nombreEmpresa }}</h2>
                    <p>{{ $empresa->descripcionEmpresa }}</p>
                    <!-- <ul class="info">
                        <li>
                            <label class="fw-bold" for="numeroSeguroSocial">Número de Seguro Social: </label><br>
                            <i class="fa-solid fa-user-md"></i> {{ $empresa->numeroSeguroSocialEmpleado }} </li>
                    </ul> -->
                </div>
            </div>
        </div>
    </div>
</x-head>
</html>