<!DOCTYPE html>
<html lang="es">

<x-head titulo="Editar Empresa">

    <div style="background-image: url('/images/fondo1Create.jpg'); background-size: cover;">

        <x-navbar></x-navbar>

        <div class="reservation-form">
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
                            <form id="reservation-form" action="/empresa/{{ $empresa->id }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h1>Editando empresa {{ $empresa->nombreEmpresa }}</h1>
                                    </div>
                                    <div class="col-lg-6">
                                        <fieldset>
                                            <label for="nombreEmpresa">Nombre de la Empresa</label></br>
                                            <input type="text" name="nombreEmpresa" id="nombreEmpresa" placeholder="Ingresa el nombre de la empresa" autocomplete="off"  value="{{ $empresa->nombreEmpresa }}" required>
                                            </br>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <fieldset>
                                            <label for="descripcionEmpresa">Descripción</label></br>
                                            <input type="text" name="descripcionEmpresa" id="descripcionEmpresa" placeholder="Ingresa la descripción de la empresa" autocomplete="off" value="{{ $empresa->descripcionEmpresa }}" required>
                                            </br>
                                        </fieldset>
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <fieldset>
                                            <div class="border-button">
                                                <a href="/empresa">Cancelar cambios</a>
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