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
                Administrar usuarios
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-stripe " id="tablaEstudiante">
            <thead class="text-left">
                <tr>
                    <th>ID</th>
                    <th>nombre</th>
                    <th>Apellidos</th>
                    <th>Cargo</th>
                    <th>Cedula</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="text-left">
                @forelse ($user as $item)
                <tr>

                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nombre }}</td>
                            <td>{{ $item->apellidos }}</td>
                            <td>{{ $item->cargo }}</td>
                            <td>{{ $item->cedula }}</td>


                    <td>
                        <div class="btn-group float-center">
                            <a href="{{ route('restore.user', $item->id) }}" class="color-option" id="editTipoDoc">
                                <i class="fas fa-redo-alt mr-4"></i>
                            </a>

                             <a href="{{ route('delete.user', $item->id) }}" class="color-option" id="borrarTipoDoc">
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
    <script src="{{ asset('js/student.js') }}"></script>
@endsection


