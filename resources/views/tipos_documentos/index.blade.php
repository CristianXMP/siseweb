@extends('plantilla')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/estudiantes.css') }}">
@endsection

@section('content')
    <div class="header-container">
        <div class="title">
            <h1>
                <i class="far fa-file-alt"></i>
                Lista de Tipos de documentos
            </h1>
        </div>
        <div>
            <a class=" btn btn-main" href="{{ route('tiposdocumentos.create') }}">
                <i class="fa fa-plus mr-1"></i>
                Nuevo
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-stripe " id="tablaTipoDocuemnto">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Abreviatura</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Tarjeta de Indentidad</td>
                    <td>T.I</td>
                    <td>
                        <div class="btn-group">
                            <a href="" style="color: #00723d" id="editTipoDoc">
                                <i class="fa fa-pencil-alt mr-2"></i>
                            </a>
                            <a href="" style="color: #00723d" id="verTipoDoc">
                                 <i class="fa fa-eye mr-2"></i>    
                             </a>
                             <a href="" style="color: #00723d" id="borrarTipoDoc">
                                 <i class="fa fa-trash"></i>
                             </a>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>1</td>
                    <td>Cedula de Ciudadania</td>
                    <td>C.C</td>
                    <td>
                        <div class="btn-group">
                            <a href="" style="color: #00723d" id="editTipoDoc">
                                <i class="fa fa-pencil-alt mr-2"></i>
                            </a>
                            <a href="" style="color: #00723d" id="verTipoDoc">
                                 <i class="fa fa-eye mr-2"></i>    
                             </a>
                             <a href="" style="color: #00723d" id="borrarTipoDoc">
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
    <script src="{{ asset('js/typeDocument.js') }}"></script>
@endsection
