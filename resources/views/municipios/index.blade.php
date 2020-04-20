@extends('plantilla')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/estudiantes.css') }}">
@endsection

@section('content')
    <div class="header-container">
        <div class="title">
            <h1>
                <i class="far fa-file-alt"></i>
                Lista de Municipios
            </h1>
        </div>
        <div>
            <a class=" btn btn-main" href="{{ route('municipios.create') }}">Nuevo</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-stripe ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Abreviatura</th>
                    <th>Departamento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Malambo</td>
                    <td>Mal</td>
                    <td>Atlantico</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-table dropdown-toggle btn-primary" data-toggle="dropdown" aria-expanded="false" id="dropdownMunicipio">
                                <span class="caret"></span>
                            </button>

                            <div class="dropdown-menu" aria-labelledby="dropdownMunicipio">
                                <a class="dropdown-item" href="{{ route('municipios.edit', 1) }}">
                                    <i class="fa fa-external-link-alt"></i>
                                    Editar
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fa fa-external-link-alt"></i>
                                    Eliminar
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fa fa-external-link-alt"></i>
                                    Ver
                                </a>
                              </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>1</td>
                    <td>Soledad</td>
                    <td>Sol</td>
                    <td>Atlantico</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-table dropdown-toggle btn-primary" data-toggle="dropdown" aria-expanded="false" id="dropdownMunicipio">
                                <span class="caret"></span>
                            </button>

                            <div class="dropdown-menu" aria-labelledby="dropdownMunicipio">
                                <a class="dropdown-item" href="{{ route('municipios.edit', 1) }}">Editar</a>
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

