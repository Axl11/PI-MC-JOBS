<!DOCTYPE html>
<html lang="es">
    
<x-head titulo="Crear solicitudes">

    <div style="background-image: url('/images/paisajecreate.jpg'); background-size: cover;">

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
                        <form id="reservation-form" action="/solicitude" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <h1>Crear Solicitud</h1>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <label for="nombreUser" class="form-label">Nombre</label></br>
                                            <input type="text" name="nombreUser" id="nombreUser" value="{{ old('nombreUser') }}" autocomplete="off" required>
                                        </br>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <label for="apellidoUser" class="form-label">Apellido</label></br>
                                            <input type="text" name="apellidoUser" id="apellidoUser" value="{{ old('apellidoUser') }}" autocomplete="off" required>
                                        </br>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <label for="edadUser" class="form-label">Edad</label></br>
                                            <input type="number" step="1" min="0" max="150" name="edadUser" id="edadUser" value="{{ old('edadUser') }}" autocomplete="off">
                                        </br>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <label for="ciudadUser" class="form-label">Ciudad</label></br>
                                            <input type="text" name="ciudadUser" id="ciudadUser" value="{{ old('ciudadUser') }}" autocomplete="off" required>
                                        </br>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <label for="coloniaUser" class="form-label">Colonia</label></br>
                                            <input type="text" name="coloniaUser" id="coloniaUser" value="{{ old('coloniaUser') }}" autocomplete="off">
                                        </br>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <label for="telefonoUser" class="form-label">Teléfono</label></br>
                                            <input type="integer" name="telefonoUser" id="telefonoUser" value="{{ old('telefonoUser') }}" autocomplete="off">
                                        </br>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <label for="correoUser" class="form-label">Correo electrónico</label></br>
                                            <input type="email" name="correoUser" id="correoUser" value="{{ old('correoUser') }}" autocomplete="off">
                                        </br>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <label for="archivo" class="form-label">CV</label></br>
                                            <input type="file" name="archivo" id="archivo">
                                        </br>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <label for="vacante_id" class="form-label">Selecciona una opción:</label>
                                        <select name="vacante_id" id="vacante_id" value="{{ old('vacante_id')}}" class="form-control" required>
                                            <option selected disabled>Selecciona una vacante</option>
                                            @foreach ($vacantes as $vacante)
                                                <option value="{{ $vacante->id }}">{{ $vacante->nombreVacante }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <div class="border-button">
                                            <a href="/solicitude">Cancelar</a>
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