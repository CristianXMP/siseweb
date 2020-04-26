@extends('plantilla')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/estudiantes.css') }}">
@endsection

@section('content')
    <div class="header-container">

        <div class="title">
            <h1>
                <i class="far fa-file-alt"></i>
                Lista de Periodos
            </h1>
        </div>
        <div>
            <a class=" btn btn-main" href="{{ route('periodos.create') }}">
                <i class="fa fa-plus mr-1"></i>
                Nuevo
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table text-center"  id="tablaPeriodo">
            <thead>
                <tr>
                    <th scope="col" >ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Fecha inicio</th>
                    <th scope="col">Fecha Final</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Periodo 1</td>
                    <td>2002/02/02</td>
                    <td>2002/02/02</td>
                   <td>
                    <div class="btn-group" style="color: #00723d">
                        <a href="{{route('periodos.edit', 1)}}" class="btn btn-transparent" style="color: #00723d" id="editTipoDo" ><i class="fa fa-pencil-alt"></i></a>
                        <a href="" class="btn btn-transparent" style="color: #00723d" id="editTipoDo" ><i class="fa fa-trash"></i></a>
                      </div>
                   </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/country.js') }}"></script>
@endsection
