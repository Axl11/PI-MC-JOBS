<!DOCTYPE html>
<html lang="es">
    
<x-head titulo="Create vacante">

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
                        <form id="reservation-form" action="/vacante" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <h1>Crear Vacante</h1>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <label for="nombreVacante" class="form-label">Nombre</label></br>
                                            <input type="text" name="nombreVacante" id="nombreVacante" value="{{ old('nombreVacante') }}" autocomplete="off" required>
                                        </br>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <label for="descripcionVacante" class="form-label">Descripcion</label></br>
                                            <input type="text" name="descripcionVacante" id="descripcionVacante" value="{{ old('descripcionVacante') }}" autocomplete="off" required>
                                        </br>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <label for="empresa_id" class="form-label">Selecciona una opción:</label>
                                        <select name="empresa_id" id="empresa_id" value="{{ old('empresa_id')}}" class="form-control" required>
                                            <option selected disabled>Selecciona una empresa</option>
                                            @foreach ($empresas as $empresa)
                                                <option value="{{ $empresa->id }}">{{ $empresa->nombreEmpresa }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <label for="sueldoVacante" class="form-label">Sueldo</label></br>
                                            <input type="number" step="0.01" min="0" max="999999" name="sueldoVacante" id="sueldoVacante" value="{{ old('sueldoVacante') }}" autocomplete="off">
                                        </br>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <label for="direccionVacante" class="form-label">Dirección</label></br>
                                            <input type="text" name="direccionVacante" id="direccionVacante" value="{{ old('direccionVacante') }}" autocomplete="off" required>
                                        </br>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <label for="horarioVacante" class="form-label">Horario</label></br>
                                            <input type="text" name="horarioVacante" id="horarioVacante" value="{{ old('horarioVacante') }}" autocomplete="off">
                                        </br>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <label for="puestosDisponibles" class="form-label">Puestos Disponibles</label></br>
                                            <input type="integer" name="puestosDisponibles" id="puestosDisponibles" value="{{ old('puestosDisponibles') }}" autocomplete="off">
                                        </br>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <div class="border-button">
                                            <a href="/vacante">Cancelar</a>
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