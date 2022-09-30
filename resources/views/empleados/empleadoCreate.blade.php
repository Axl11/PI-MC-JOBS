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
        <label for="nombreEmpleado">Nombre</label>
            <input type="text" name="nombreEmpleado" id="nombreEmpleado" autocomplete="off" required>
        </br>
        <label for="apellidoEmpleado">Apellido</label>
            <input type="text" name="apellidoEmpleado" id="apellidoEmpleado" autocomplete="off" required>
        </br>
        <label for="numeroSeguroSocialEmpleado">Numero de Seguro Social</label>
            <input type="text" name="numeroSeguroSocialEmpleado" id="numeroSeguroSocialEmpleado" autocomplete="off" required>
        </br>
        <label for="puestoLaboralEmpleado">Puesto Laboral</label>
            <input type="text" name="puestoLaboralEmpleado" id="puestoLaboralEmpleado" autocomplete="off" required>
        </br>
        <label for="sueldoEmpleado">Sueldo</label>
            <input type="number" name="sueldoEmpleado" id="sueldoEmpleado" step="0.01" min="0" max="999999" autocomplete="off" required>
        </br>
        <label for="rfcEmpleado">Registro Federal de Contribuyente</label>
            <input type="text" name="rfcEmpleado" id="rfcEmpleado" autocomplete="off" required>
        </br>
        <label for="fechaNacimientoEmpleado">Fecha Nacimiento</label>
            <input type="date" name="fechaNacimientoEmpleado" id="fechaNacimientoEmpleado" autocomplete="off" required>
        </br>
        <label for="curpEmpleado">CURP</label>
            <input type="text" name="curpEmpleado" id="curpEmpleado" autocomplete="off" required>
        </br>
        <label for="antiguedadEmpleado">Antiguedad</label>
            <input type="integer" name="antiguedadEmpleado" id="antiguedadEmpleado" autocomplete="off" required>
        </br>

        <button type="submit">Guardar</button>

    </form>
</body>
</html>