<!DOCTYPE html>
<html lang="es">

<x-head titulo="Editar Departamento">

    <div style="background-image: url('/images/fondo1Create.jpg'); background-size: cover;">

        <x-navbar></x-navbar>

        <div class="reservation-form my-5">
            <div class="container">
                <!-- <div class="text-center">
                    <h1 class="text-dark pt-3">Modo edición de empleados</h1>         
                </div>
                <div class="border-button pt-5 ps-4">
                    <a href="/empleado">Cancelar cambios</a>
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
                            <form id="reservation-form" action="/departamento/{{ $departamento->id }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h1>Editando departamento {{ $departamento->nombreDepartamento }}</h1>
                                    </div>
                                    <div class="col-lg-6">
                                        <fieldset>
                                            <label for="nombreDepartamento">Nombre del Departamento</label></br>
                                            <input type="text" name="nombreDepartamento" id="nombreDepartamento" placeholder="Ingresa el nombre del departamento" autocomplete="off"  value="{{ $departamento->nombreDepartamento }}" required>
                                            </br>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <fieldset>
                                            <label for="descripcionDepartamento">Descripción</label></br>
                                            <input type="text" name="descripcionDepartamento" id="descripcionDepartamento" placeholder="Ingresa la descripción del departamento" autocomplete="off" value="{{ $departamento->descripcionDepartamento }}" required>
                                            </br>
                                        </fieldset>
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <fieldset>
                                            <div class="border-button">
                                                <a href="/departamento">Cancelar cambios</a>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <fieldset>
                                            <button type="submit">Actualizar</button>
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