<!DOCTYPE html>
<html lang="es">

<x-head titulo="Crear Departamento">

    <div style="background-image: url('/images/fondo1Create.jpg'); background-size: cover;">

        <x-navbar></x-navbar>

        <div class="reservation-form my-5">
            <div class="container">
                <!-- <div class="text-center">
                    <h1 class="text-dark pt-3">Agregar Empleado</h1>         
                </div>
                <div class="border-button pt-5 ps-4">
                    <a href="/empleado">Regresar a vista principal</a>
                </div> -->
                <div class="row">
                    <div class="col-lg-12">
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form id="reservation-form" action="/departamento" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <h1>Crear Departamento</h1>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <label for="nombreDepartamento">Nombre del Departamento</label></br>
                                        <input type="text" name="nombreDepartamento" id="nombreDepartamento" placeholder="Ingresa el nombre del departamento" autocomplete="off"  value="{{ old('nombreDepartamento') }}" required>
                                        </br>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <label for="descripcionDepartamento">Descripción</label></br>
                                        <input type="text" name="descripcionDepartamento" id="descripcionDepartamento" placeholder="Ingresa una descripción sobre el departamento" autocomplete="off" value="{{ old('descripcionDepartamento') }}" required>
                                        </br>
                                    </fieldset>
                                </div>

                                <div class="col-lg-6">
                                    <fieldset>
                                        <div class="border-button">
                                            <a href="/departamento">Cancelar</a>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <button type="submit">Guardar</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <x-footer></x-footer>
    </div>
</x-head>
</html>