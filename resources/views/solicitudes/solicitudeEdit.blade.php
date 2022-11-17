<!DOCTYPE html>
<html lang="es">

<x-head titulo="Editar Solicitud">

    <div style="background-image: url('/images/fondo1Create.jpg'); background-size: cover;">

        <x-navbar></x-navbar>
        
        <div class="reservation-form">
            <div class="container">
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
                        <form id="reservation-form" action="/solicitude/{{ $solicitude->id }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-lg-12">
                                    <h1>Editando Solicitud de {{ $solicitude->nombreUser }} {{ $solicitude->apellidoUser }}</h1>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <label for="nombreUser" class="form-label">Nombre</label></br>
                                            <input type="text" name="nombreUser" id="nombreUser" value="{{ $solicitude->nombreUser }}" autocomplete="off" required>
                                        </br>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <label for="apellidoUser" class="form-label">Apellido</label></br>
                                            <input type="text" name="apellidoUser" id="apellidoUser" value="{{ $solicitude->apellidoUser }}" autocomplete="off" required>
                                        </br>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <label for="edadUser" class="form-label">Edad</label></br>
                                            <input type="number" step="1" min="0" max="150" name="edadUser" id="edadUser" value="{{ $solicitude->edadUser }}" autocomplete="off">
                                        </br>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <label for="ciudadUser" class="form-label">Ciudad</label></br>
                                            <input type="text" name="ciudadUser" id="ciudadUser" value="{{ $solicitude->ciudadUser }}" autocomplete="off" required>
                                        </br>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <label for="coloniaUser" class="form-label">Colonia</label></br>
                                            <input type="text" name="coloniaUser" id="coloniaUser" value="{{ $solicitude->coloniaUser }}" autocomplete="off">
                                        </br>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <label for="telefonoUser" class="form-label">Teléfono</label></br>
                                            <input type="integer" name="telefonoUser" id="telefonoUser" value="{{ $solicitude->telefonoUser }}" autocomplete="off">
                                        </br>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <label for="correoUser" class="form-label">Correo electrónico</label></br>
                                            <input type="email" name="correoUser" id="correoUser" value="{{ $solicitude->correoUser }}" autocomplete="off">
                                        </br>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <!-- <label for="archivo" class="form-label">CV</label></br>
                                            <input type="file" name="archivo" id="archivo" value="{{ $solicitude->vacante->nombreVacante }}">
                                        </br> -->
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <label for="vacante_id">Selecciona una opción:</label></br>
                                        <select name="vacante_id" id="vacante_id" class="form-control" required>
                                            <option selected disabled>Selecciona una vacante</option>
                                            @foreach($vacantes as $vacante)
                                                <option value="{{ $vacante->id }}" {{ $solicitude->vacante->id == $vacante->id ? 'selected' : '' }}>{{ $vacante->nombreVacante }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <div class="border-button">
                                            <a href="/solicitude">Cancelar cambios</a>
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