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
                @forelse ($periodos as $item)
                <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->nombre}}</td>
                <td>{{$item->fecha_inicial}}</td>
                <td>{{$item->fecha_final}}</td>
                   <td>
                    <div class="btn-group" style="color: #00723d">
                        <a href="{{route('periodos.edit', $item->id)}}" class="btn btn-transparent" style="color: #00723d" id="editTipoDo" ><i class="fa fa-pencil-alt"></i></a>
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
    <script src="{{ asset('js/country.js') }}"></script>
@endsection
