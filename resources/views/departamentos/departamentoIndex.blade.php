<!DOCTYPE html>
<html lang="es">

<x-head titulo="Index Departamentos">

<x-navbar></x-navbar>
<div class="container mt-5 pt-5">
    <div class="text-center">
        <h1 class="text-dark pt-3">Listado de Departamentos</h1>         
    </div>

    <x-alert></x-alert>
    
    <div class="border-button ps-4 pe-4 my-3 d-flex">
        <a href="/departamento/create">Añadir nuevo Departamento</a>
    </div>
    <div class="container-fluid mt-1 px-4">
        <div class="table-responsive">
            <div class="row">
                <div class="col">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th scope="col">Nombre Departamento</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        @foreach ($departamentos as $departamento)
                        <tbody>
                            <tr class="text-dark text-center">
                                <td class="table-dark">
                                    <a href="/departamento/{{ $departamento->id }}">
                                        {{ $departamento->nombreDepartamento }}
                                    </a>
                                </td>
                                <td>{{ $departamento->descripcionDepartamento }}</td>
                    
                                <td>
                                    <a class="btn btn-woox text-light" href="/departamento/{{ $departamento->id }}/edit">Editar</a>
                                </td>
                                <td>
                                    <form action="/departamento/{{ $departamento->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <input type="submit" class="btn btn-danger" value="Eliminar">
            
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2036 <a href="#">WoOx Travel</a> Company. All rights reserved. 
          <br>Design: <a href="https://templatemo.com" target="_blank" title="free CSS templates">TemplateMo</a> Distribution: <a href="https://themewagon.com target="_blank" >ThemeWagon</a></p>
        </div>
      </div>
    </div>
</footer> -->

</x-head>

</html>