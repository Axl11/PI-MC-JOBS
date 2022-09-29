<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Vacante</title>
</head>
<body>
    <h1>Crear Vacante</h1>
    <form action="/vacante" method="POST">
        @csrf
        <label for="nombreVacante">Nombre</label>
            <input type="text" name="nombreVacante" id="nombreVacante">
        </br>
        <label for="descripcionVacante">Descripcion</label>
            <input type="text" name="descripcionVacante" id="descripcionVacante">
        </br>
        <label for="sueldoVacante">Sueldo</label>
            <input type="number" step="0.01" min="0" max="999999" name="sueldoVacante" id="sueldoVacante">
        </br>
        <label for="direccionVacante">Dirección</label>
            <input type="text" name="direccionVacante" id="direccionVacante">
        </br>
        <label for="horarioVacante">Horario</label>
            <input type="text" name="horarioVacante" id="horarioVacante">
        </br>
        <label for="puestosDisponibles">Puestos Disponibles</label>
            <input type="integer" name="puestosDisponibles" id="puestosDisponibles">
        </br>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>