<!DOCTYPE html>
<html lang="es">

<x-head titulo="Index Empresas">

<x-navbar></x-navbar>
<div class="container mt-5 pt-5">
    <div class="text-center">
        <h1 class="text-dark pt-3">Listado de Empresas</h1>         
    </div>
    <div class="border-button ps-4 pe-4 my-3 d-flex">
        <a href="/empresa/create">Añadir nueva empresa</a>
    </div>
    <div class="container-fluid mt-1 px-4">
        <div class="table-responsive">
            <div class="row">
                <div class="col">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th scope="col">Nombre Empresa</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        @foreach ($empresas as $empresa)
                        <tbody>
                            <tr class="text-dark text-center">
                                <td class="table-dark">
                                    <a href="/empresa/{{ $empresa->id }}">
                                        {{ $empresa->nombreEmpresa }}
                                    </a>
                                </td>
                                <td>{{ $empresa->descripcionEmpresa }}</td>
                    
                                <td>
                                    <a class="btn btn-woox text-light" href="/empresa/{{ $empresa->id }}/edit">Editar</a>
                                </td>
                                <td>
                                    <form action="/empresa/{{ $empresa->id }}" method="POST">
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