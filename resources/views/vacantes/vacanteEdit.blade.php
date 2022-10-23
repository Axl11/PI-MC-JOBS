<!DOCTYPE html>
<html lang="es">

<x-head titulo="Editar Vacante">

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
                    <form id="reservation-form" action="/vacante/{{ $vacante->id }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-lg-12">
                                <h1>Editar Vacante</h1>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <label for="nombreVacante">Nombre</label></br>
                                        <input type="text" name="nombreVacante" id="nombreVacante" value="{{ $vacante->nombreVacante }}" autocomplete="off" required>
                                    </br>
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <label for="descripcionVacante">Descripcion</label></br>
                                        <input type="text" name="descripcionVacante" id="descripcionVacante" value="{{ $vacante->descripcionVacante }}" autocomplete="off" required>
                                    </br>
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <label for="sueldoVacante">Sueldo</label></br>
                                        <input type="number" step="0.01" min="0" max="999999" name="sueldoVacante" id="sueldoVacante" value="{{ $vacante->sueldoVacante}}" autocomplete="off">
                                    </br>
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <label for="direccionVacante">Dirección</label></br>
                                        <input type="text" name="direccionVacante" id="direccionVacante" value="{{ $vacante->direccionVacante }}" autocomplete="off" required>
                                    </br>
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <label for="horarioVacante">Horario</label></br>
                                        <input type="text" name="horarioVacante" id="horarioVacante" value="{{ $vacante->horarioVacante}}" autocomplete="off">
                                    </br>
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <label for="puestosDisponibles">Puestos Disponibles</label></br>
                                        <input type="integer" name="puestosDisponibles" id="puestosDisponibles" value="{{ $vacante->puestosDisponibles}}" autocomplete="off">
                                    </br>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
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
</x-head>
</html>