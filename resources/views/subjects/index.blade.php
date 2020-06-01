@extends('plantilla')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/estudiantes.css') }}">
@endsection

@section('content')
    <div class="header-container">

        <div class="title">
            <h1>
                <i class="far fa-file-alt"></i>
                Lista de Materias
            </h1>
        </div>
        <div>
            <a class=" btn btn-main" href="{{ route('materias.create') }}">
                <i class="fa fa-plus mr-1"></i>
                Nuevo
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-sm" id="tablaMateria">
            <thead>
                <tr>
                    <th width="10px">ID</th>
                    <th width="10px" >Nombre</th>
                    <th width="10px">Abreviatura</th>
                    <th width="5px">Acciones</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($subject as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->nombre}}</td>
                    <td>{{$item->abreviatura}}</td>
                   <td>
                      <div class="btn-group" >
                        <a href="{{route('materias.edit', $item->id)}}" class="btn btn-transparent color-option"  style="padding: 2px;" id="editTipoDo" ><i class="fa fa-pencil-alt mr-2"></i></a>
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
    <script src="{{ asset('js/department.js') }}"></script>
@endsection

