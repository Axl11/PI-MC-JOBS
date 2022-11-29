<!DOCTYPE html>
<html lang="en">

<x-head titulo="Reemplazar Archivo">

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
                    <form id="reservation-form" action="/archivos/{{ $archivo->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-lg-12">
                                <h1>Editando Archivo {{ $archivo->nombreOriginal }}</h1>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="archivo" class="form-label">Nuevo Archivo</label></br>
                                        <input type="file" name="archivo" id="archivo" value="{{ $archivo->nombreOriginal }}">
                                    </br>
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <div class="border-button">
                                        <a href="/solicitude">Cancelar cambios</a>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <button type="submit">Actualizar</button>
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