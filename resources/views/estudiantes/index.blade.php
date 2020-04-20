@extends('plantilla')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/estudiantes.css') }}">
@endsection

@section('content')
    <div class="header-container">
        <div class="title">
            <h1>
                <i class="far fa-file-alt"></i>
                Lista de Estudiantes
            </h1>
        </div>
        <div>
            <a class=" btn btn-main" href="{{ route('estudiantes.create') }}">Nuevo</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-stripe ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Documento</th>
                    <th>Curso</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Diego Andres</td>
                    <td>100187947</td>
                    <td>1 - 4</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-table dropdown-toggle btn-primary" data-toggle="dropdown" aria-expanded="false" id="dropdownEstudiantes">
                                <span class="caret"></span>
                            </button>

                            <div class="dropdown-menu" aria-labelledby="dropdownEstudiantes">
                                <a class="dropdown-item" href="{{ route('estudiantes.edit', 1) }}">Editar</a>
                                <a class="dropdown-item" href="#">Eliminar</a>
                                <a class="dropdown-item" href="#">Ver</a>
                              </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>1</td>
                    <td>Diego Andres</td>
                    <td>100187947</td>
                    <td>1 - 4</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-table dropdown-toggle btn-primary" data-toggle="dropdown" aria-expanded="false" id="dropdownEstudiantes">
                                <span class="caret"></span>
                            </button>

                            <div class="dropdown-menu" aria-labelledby="dropdownEstudiantes">
                                <a class="dropdown-item" href="{{ route('estudiantes.edit', 1) }}">Editar</a>
                                <a class="dropdown-item" href="#">Eliminar</a>
                                <a class="dropdown-item" href="#">Ver</a>
                              </div>
                        </div>
                    </td>
                </tr>
                
            </tbody>
        </table>
    </div>
@endsection

