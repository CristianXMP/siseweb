@extends('plantilla')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/estudiantes.css') }}">
@endsection

@section('content')
    <div class="header-container">
        <div class="title">
            <h1>
                <i class="far fa-file-alt"></i>
                Lista de Departamentos
            </h1>
        </div>
        <div>
            <a class=" btn btn-main" href="{{ route('departamentos.create') }}">
                <i class="fa fa-plus mr-1"></i>
                Nuevo
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-stripe" id="tablaDepartamento">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Abreviatura</th>
                    <th>Pais</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Atlantico</td>
                    <td>Atl</td>
                    <td>Colombia</td>
                    <td>
                        <div class="btn-group">
                            <div class="btn-group">
                                <a href="" style="color: #00723d" id="editDepar">
                                    <i class="fa fa-pencil-alt mr-2"></i>
                                </a>
                                <a href="" style="color: #00723d" id="verDepar">
                                     <i class="fa fa-eye mr-2"></i>    
                                 </a>
                                 <a href="" style="color: #00723d" id="borrarDepar">
                                     <i class="fa fa-trash"></i>
                                 </a>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>1</td>
                    <td>Cordoba</td>
                    <td>Cor</td>
                    <td>Colombia</td>
                    <td>
                        <div class="btn-group">
                            <a href="" style="color: #00723d" id="editDepar">
                                <i class="fa fa-pencil-alt mr-2"></i>
                            </a>
                            <a href="" style="color: #00723d" id="verDepar">
                                 <i class="fa fa-eye mr-2"></i>    
                             </a>
                             <a href="" style="color: #00723d" id="borrarDepar">
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
    <script src="{{ asset('js/department.js') }}"></script>
@endsection

