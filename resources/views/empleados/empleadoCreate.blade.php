<!DOCTYPE html>
<html lang="es">

<x-head titulo="Crear Empleados">

    <div style="background-image: url('/images/fondo1Create.jpg'); background-size: cover;">

        <x-navbar></x-navbar>

        <div class="reservation-form">
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
                        <form id="reservation-form" action="/empleado" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <h1>Crear Empleado</h1>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <label for="nombreEmpleado">Nombre</label></br>
                                        <input type="text" name="nombreEmpleado" id="nombreEmpleado" placeholder="Ingresa el nombre del empleado" autocomplete="off"  value="{{ old('nombreEmpleado') }}" required>
                                        </br>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <label for="apellidoEmpleado">Apellido</label></br>
                                        <input type="text" name="apellidoEmpleado" id="apellidoEmpleado" placeholder="Ingresa el apellido del empleado" autocomplete="off" value="{{ old('apellidoEmpleado') }}" required>
                                        </br>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <label for="puestoLaboralEmpleado">Puesto Laboral</label></br>
                                        <input type="text" name="puestoLaboralEmpleado" id="puestoLaboralEmpleado" placeholder="Ingresa el puesto laboral del Empleado" autocomplete="off" value="{{ old('puestoLaboralEmpleado') }}" required>
                                        </br>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <label for="numeroSeguroSocialEmpleado">Numero de Seguro Social</label></br>
                                        <input type="text" name="numeroSeguroSocialEmpleado" id="numeroSeguroSocialEmpleado" placeholder="Ingresa el Número de Seguro Social del Empleado" autocomplete="off" value="{{ old('numeroSeguroSocialEmpleado') }}" required>
                                        </br>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <label for="sueldoEmpleado">Sueldo</label></br>
                                        <input type="number" name="sueldoEmpleado" id="sueldoEmpleado" step="0.01" min="0" max="999999" placeholder="Ingresa el Sueldo del Empleado" autocomplete="off" value="{{ old('sueldoEmpleado') }}" required>
                                        </br>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <label for="rfcEmpleado">Registro Federal de Contribuyente</label></br>
                                        <input type="text" name="rfcEmpleado" id="rfcEmpleado" placeholder="Ingresa el RFC del empleado" autocomplete="off" value="{{ old('rfcEmpleado') }}" required>
                                        </br>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <label for="fechaNacimientoEmpleado">Fecha Nacimiento</label></br>
                                        <input type="date" name="fechaNacimientoEmpleado" id="fechaNacimientoEmpleado" autocomplete="off" value="{{ old('fechaNacimientoEmpleado') }}" required>
                                        </br>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <label for="curpEmpleado">CURP</label></br>
                                        <input type="text" name="curpEmpleado" id="curpEmpleado" placeholder="Ingresa la CURP del empleado" autocomplete="off" value="{{ old('curpEmpleado') }}" required>
                                        </br>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <label for="antiguedadEmpleado">Antiguedad</label></br>
                                        <input type="integer" name="antiguedadEmpleado" id="antiguedadEmpleado" placeholder="Ingresa la antiguedad del empleado" autocomplete="off" value="{{ old('antiguedadEmpleado') }}" required>
                                        </br>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <!-- Implementación de un select multiple que pasa un arreglo de la instancia departamentos al metodo stored del controlador empleado -->
                                        <label for="departamento_id" class="form-label">Selecciona una opción:</label>
                                        <select name="departamentos_id[]" value="{{ old('departamento_id')}}" class="form-control" multiple>
                                            <option selected disabled>Selecciona un departamento</option>
                                            @foreach ($departamentos as $departamento)
                                                <option value="{{ $departamento->id }}">{{ $departamento->nombreDepartamento }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <div class="border-button">
                                            <a href="/empleado">Cancelar</a>
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