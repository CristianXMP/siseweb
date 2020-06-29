@extends('plantilla')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/estudiantes.css') }}">
@endsection

@section('content')

    <div class="clearfix mb-2">
        <div class="float-left "><h1 class="font-weight-bold text-uppercase" style="font-size: 26px;
            color: #075a72 !important;
           ">
            <i class="far fa-file-alt"></i>
            Lista de Usuarios
        </h1></div>
        <div class="float-right text-capitalize  ">  <a class=" btn btn-main btn-sm btn-block" href="{{ route('create') }}">
            <i class="fa fa-plus mr-1"></i>
            Administrar usuarios
        </a></div>
      </div>
      <hr class="my-0 ">

    <div class="table-responsive mt-3">
        <table class="table table-stripe table-sm" id="tablaEstudiante">
            <thead class="text-left">
                <tr>
                    <th>ID</th>
                    <th>nombre</th>
                    <th>Apellidos</th>
                    <th>Cargo</th>
                    <th>Cédula</th>
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
                            <a href="{{ route('restore.user', $item->id) }}" class="color-option"  style="padding: 2px;" id="editTipoDoc">
                                <i class="fas fa-redo-alt mr-4"></i>
                            </a>

                             <a href="{{ route('delete.user', $item->id) }}" class="color-option"  style="padding: 2px;" id="borrarTipoDoc">
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


