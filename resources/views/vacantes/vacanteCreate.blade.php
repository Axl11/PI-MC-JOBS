<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Vacante</title>

    @vite([
        'resources/css/bootstrap.css', 
        'resources/css/woox/animate.css',
        'resources/css/woox/fontawesome.css',
        'resources/css/woox/owl.css',
        'resources/css/woox/templatemo-woox-travel.css',
        'resources/js/bootstrap1.js',
        'resources/js/woox/vendor/jquery.js',
        'resources/js/woox/custom.js',
        'resources/js/woox/isotope.js',
        'resources/js/woox/owl-carousel.js',
        'resources/js/woox/popup.js',
        'resources/js/woox/tabs.js'
    ])

</head>
<body>
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
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit">Enviar</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>