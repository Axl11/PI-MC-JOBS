<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Empleado</title>
</head>
<body>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/empleado/{{ $empleado->id }}" method="POST">
    @csrf
    @method('PATCH')
        <label for="nombreEmpleado">Nombre</label></br>
            <input type="text" name="nombreEmpleado" id="nombreEmpleado" placeholder="Ingresa el nombre del empleado" autocomplete="off" value="{{ old('nombreEmpleado') ?? $empleado->nombreEmpleado }}" required>
        </br>
        <label for="apellidoEmpleado">Apellido</label></br>
            <input type="text" name="apellidoEmpleado" id="apellidoEmpleado" placeholder="Ingresa el apellido del empleado" autocomplete="off" value="{{ old('apellidoEmpleado') ?? $empleado->apellidoEmpleado }}" required>
        </br>
        <label for="numeroSeguroSocialEmpleado">Numero de Seguro Social</label></br>
            <input type="text" name="numeroSeguroSocialEmpleado" id="numeroSeguroSocialEmpleado" placeholder="Ingresa el Número de Seguro Social del Empleado" autocomplete="off" value="{{ old('numeroSeguroSocialEmpleado') ?? $empleado->numeroSeguroSocialEmpleado }}" required>
        </br>
        <label for="puestoLaboralEmpleado">Puesto Laboral</label></br>
            <input type="text" name="puestoLaboralEmpleado" id="puestoLaboralEmpleado" placeholder="Ingresa el puesto laboral del Empleado" autocomplete="off" value="{{ old('puestoLaboralEmpleado') ?? $empleado->puestoLaboralEmpleado }}" required>
        </br>
        <label for="sueldoEmpleado">Sueldo</label></br>
            <input type="number" name="sueldoEmpleado" id="sueldoEmpleado" step="0.01" min="0" max="999999" placeholder="Ingresa el Sueldo del Empleado" autocomplete="off" value="{{ old('sueldoEmpleado') ?? $empleado->sueldoEmpleado }}" required>
        </br>
        <label for="rfcEmpleado">Registro Federal de Contribuyente</label></br>
            <input type="text" name="rfcEmpleado" id="rfcEmpleado" placeholder="Ingresa el RFC del empleado" autocomplete="off" value="{{ old('rfcEmpleado') ?? $empleado->rfcEmpleado }}" required>
        </br>
        <label for="fechaNacimientoEmpleado">Fecha Nacimiento</label></br>
            <input type="date" name="fechaNacimientoEmpleado" id="fechaNacimientoEmpleado" autocomplete="off" value="{{ old('fechaNacimientoEmpleado') ?? $empleado->fechaNacimientoEmpleado }}" required>
        </br>
        <label for="curpEmpleado">CURP</label></br>
            <input type="text" name="curpEmpleado" id="curpEmpleado" placeholder="Ingresa la CURP del empleado" autocomplete="off" value="{{ old('curpEmpleado') ?? $empleado->curpEmpleado }}" required>
        </br>
        <label for="antiguedadEmpleado">Antiguedad</label></br>
            <input type="integer" name="antiguedadEmpleado" id="antiguedadEmpleado" placeholder="Ingresa la antiguedad del empleado" autocomplete="off" value="{{ old('antiguedadEmpleado') ?? $empleado->antiguedadEmpleado }}" required>
        </br></br>

        <button type="submit">Editar</button>

    </form>
</body>
</html>