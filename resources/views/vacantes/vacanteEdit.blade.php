<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vacante Edit</title>
</head>
<body>
    <h1>Editar Vacante</h1>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/vacante/{{ $vacante->id }}" method="POST">
        @csrf
        @method('PATCH')

        <label for="nombreVacante">Nombre</label></br>
            <input type="text" name="nombreVacante" id="nombreVacante" value="{{ $vacante->nombreVacante }}" autocomplete="off" required>
        </br>
        <label for="descripcionVacante">Descripcion</label></br>
            <input type="text" name="descripcionVacante" id="descripcionVacante" value="{{ $vacante->descripcionVacante }}" autocomplete="off" required>
        </br>
        <label for="sueldoVacante">Sueldo</label></br>
            <input type="number" step="0.01" min="0" max="999999" name="sueldoVacante" id="sueldoVacante" value="{{ $vacante->sueldoVacante}}" autocomplete="off">
        </br>
        <label for="direccionVacante">Dirección</label></br>
            <input type="text" name="direccionVacante" id="direccionVacante" value="{{ $vacante->direccionVacante }}" autocomplete="off" required>
        </br>
        <label for="horarioVacante">Horario</label></br>
            <input type="text" name="horarioVacante" id="horarioVacante" value="{{ $vacante->horarioVacante}}" autocomplete="off">
        </br>
        <label for="puestosDisponibles">Puestos Disponibles</label></br>
            <input type="integer" name="puestosDisponibles" id="puestosDisponibles" value="{{ $vacante->puestosDisponibles}}" autocomplete="off">
        </br>

        <button type="submit">Guardar</button>

    </form>
</body>
</html>