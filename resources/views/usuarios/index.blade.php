@extends('plantilla')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/estudiantes.css') }}">
@endsection

@section('content')
    <div class="header-container">
        <div class="title">
            <h1>
                <i class="far fa-file-alt"></i>
                Lista de usuarios
            </h1>
        </div>
        <div>
            <a class=" btn btn-main" href="{{ route('create') }}">
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
                    <th>nombre</th>
                    <th>Apellidos</th>
                    <th>Cargo</th>
                    <th>Cedula</th>
                    <th>Tipo de usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($user as $item)
                <tr>

                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nombre }}</td>
                            <td>{{ $item->apellidos }}</td>
                            <td>{{ $item->cargo }}</td>
                            <td>{{ $item->cedula }}</td>
                            <td>{{ $item->type_user }}</td>


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
                @empty
                @endforelse



            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/typeDocument.js') }}"></script>
@endsection
