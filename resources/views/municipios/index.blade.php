@extends('plantilla')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/estudiantes.css') }}">
@endsection

@section('content')
        @if (session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>

        @endif
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
        <table class="table text-center table-sm" style="width:100%" id="tablaMunicipio">
            <thead>
                <tr>
                    <th >ID</th>
                    <th >Nombre</th>
                    <th >Abreviatura</th>
                    <th >Departamento</th>
                    <th >Acciones</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($cities as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->nombre}}</td>
                    <td>{{$item->abreviatura}}</td>
                    <td>{{$item->departament->nombre}}</td>
                   <td>
                      <div class="btn-group">
                        <a href="{{route('municipios.edit', $item->id)}}" class="btn btn-transparent color-option"  style="padding: 2px;" id="editTipoDo" ><i class="fa fa-pencil-alt mr-2"></i></a>


                      </div>



                   </td>
                </tr>

                @endforeach

            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/municipality.js') }}"></script>
@endsection

