<!DOCTYPE html>
<html lang="es">

<x-head titulo="Datos Solicitud">
    
    <x-navbar></x-navbar>

    <div class="container mt-5 pt-5">
        <div class="text-center">
            <h1 class="text-dark pt-3">Detalle de la Solicitud</h1>         
        </div>
        <div class="border-button py-3 ps-4">
            <a href="/solicitude">Regresar</a>
        </div>
        <div class="justify-content-center">
            <div class="row">
                <div class="col-6">
                    <div class="image">
                        <img class="rounded" src="{{URL::asset('images/showSolicitudes.jpg')}}" alt="Solicitudes">
                    </div>
                </div>
                <div class="col-6">
                    <h2>{{ $solicitude->nombreUser }} {{ $solicitude->apellidoUser }}</h3>
                    <p>{{ $solicitude->vacante->nombreVacante }}</p>
                    <ul class="info">
                        <li>
                            <label class="fw-bold" for="edad">Edad: </label><br>
                            <i class="fa-solid fa-image-portrait"></i>  {{ $solicitude->edadUser }}</li>
                        <li>
                            <label class="fw-bold" for="ciudad">Ciudad: </label><br>
                            <i class="fa-solid fa-city"></i>  {{ $solicitude->ciudadUser }}</li>
                        <li>
                            <label class="fw-bold" for="colonia">Colonia: </label><br>
                            <i class="fa-solid fa-house"></i>  {{ $solicitude->coloniaUser }}</li>
                        <li>
                            <label class="fw-bold" for="telefono">Teléfono: </label><br>
                            <i class="fa-solid fa-square-phone"></i> {{ $solicitude->telefonoUser }}</li>
                        <li>
                            <label class="fw-bold" for="correo">Correo electrónico: </label><br>
                            <i class="fa-solid fa-at"></i>  {{ $solicitude->correoUser }}</li>
                    </ul>

                    <ul class="info">
                        <li>
                            <label class="fw-bold" for="archivo">Currículum Vitae: </label><br>
                                @foreach ($solicitude->archivos as $archivo)
                                    <i class="fa-solid fa-folder"></i>
                                    <!-- Enlace para descargar el archivo con su nombre original -->
                                    <a href="{{ route('descargaArchivoCV', $archivo) }}">{{ $archivo->nombreOriginal }}</a>
                                    <!-- Botón para reemplazar el archivo actual por otro -->
                                    <!-- <a class="btn btn-woox text-light" href="{{ route('archivo.editar', $archivo) }}">Actualizar</a> -->
                                    <!-- Formulario para eliminar un archivo -->
                                    <form class="formulario-eliminar" action="{{ route('archivo.eliminar', $archivo->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                        <input class="btn btn-danger" type="submit" value="Borrar">
                                    </form>
                                    <br>
                                @endforeach

                        </li>   
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-head>
</html>