<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Empleados</title>
</head>
<body>
    <h1>Crear Empleado</h1>

    @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
    @endif

    <form action="/empleado" method="POST">
    @csrf
        <label for="nombreEmpleado">Nombre</label></br>
            <input type="text" name="nombreEmpleado" id="nombreEmpleado" placeholder="Ingresa el nombre del empleado" autocomplete="off"  value="{{ old('nombreEmpleado') }}" required>
        </br>
        <label for="apellidoEmpleado">Apellido</label></br>
            <input type="text" name="apellidoEmpleado" id="apellidoEmpleado" placeholder="Ingresa el apellido del empleado" autocomplete="off" value="{{ old('apellidoEmpleado') }}" required>
        </br>
        <label for="numeroSeguroSocialEmpleado">Numero de Seguro Social</label></br>
            <input type="text" name="numeroSeguroSocialEmpleado" id="numeroSeguroSocialEmpleado" placeholder="Ingresa el Número de Seguro Social del Empleado" autocomplete="off" value="{{ old('numeroSeguroSocialEmpleado') }}" required>
        </br>
        <label for="puestoLaboralEmpleado">Puesto Laboral</label></br>
            <input type="text" name="puestoLaboralEmpleado" id="puestoLaboralEmpleado" placeholder="Ingresa el puesto laboral del Empleado" autocomplete="off" value="{{ old('puestoLaboralEmpleado') }}" required>
        </br>
        <label for="sueldoEmpleado">Sueldo</label></br>
            <input type="number" name="sueldoEmpleado" id="sueldoEmpleado" step="0.01" min="0" max="999999" placeholder="Ingresa el Sueldo del Empleado" autocomplete="off" value="{{ old('sueldoEmpleado') }}" required>
        </br>
        <label for="rfcEmpleado">Registro Federal de Contribuyente</label></br>
            <input type="text" name="rfcEmpleado" id="rfcEmpleado" placeholder="Ingresa el RFC del empleado" autocomplete="off" value="{{ old('rfcEmpleado') }}" required>
        </br>
        <label for="fechaNacimientoEmpleado">Fecha Nacimiento</label></br>
            <input type="date" name="fechaNacimientoEmpleado" id="fechaNacimientoEmpleado" autocomplete="off" value="{{ old('fechaNacimientoEmpleado') }}" required>
        </br>
        <label for="curpEmpleado">CURP</label></br>
            <input type="text" name="curpEmpleado" id="curpEmpleado" placeholder="Ingresa la CURP del empleado" autocomplete="off" value="{{ old('curpEmpleado') }}" required>
        </br>
        <label for="antiguedadEmpleado">Antiguedad</label></br>
            <input type="integer" name="antiguedadEmpleado" id="antiguedadEmpleado" placeholder="Ingresa la antiguedad del empleado" autocomplete="off" value="{{ old('antiguedadEmpleado') }}" required>
        </br></br>

        <button type="submit">Guardar</button>

    </form>
</body>
</html>