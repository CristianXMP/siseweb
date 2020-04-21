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
            <a class=" btn btn-main" href="{{ route('municipios.create') }}">
                <i class="fa fa-plus mr-1"></i>
                Nuevo
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-stripe " id="tablaMunicipio">
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
                            <a href="" style="color: #00723d" id="editMuni">
                                <i class="fa fa-pencil-alt mr-2"></i>
                            </a>
                            <a href="" style="color: #00723d" id="verMuni">
                                 <i class="fa fa-eye mr-2"></i>    
                             </a>
                             <a href="" style="color: #00723d" id="borrarMuni">
                                 <i class="fa fa-trash"></i>
                             </a>
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
                            <a href="" style="color: #00723d" id="editMuni">
                                <i class="fa fa-pencil-alt mr-2"></i>
                            </a>
                            <a href="" style="color: #00723d" id="verMuni">
                                 <i class="fa fa-eye mr-2"></i>    
                             </a>
                             <a href="" style="color: #00723d" id="borrarMuni">
                                 <i class="fa fa-trash"></i>
                             </a>
                        </div>
                    </td>
                </tr>
                
            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/municipality.js') }}"></script>
@endsection

