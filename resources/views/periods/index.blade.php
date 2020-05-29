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


            @if (count($periodos) == 0 )

            <a class=" btn btn-main" href="{{ route('periodos.create') }}">
                <i class="fa fa-plus mr-1"></i>
                Nuevo
            </a>

            @else

            @if ($periodos[0]['fecha_final'] == "")

            @else

            <a class=" btn btn-main" href="{{ route('periodos.create') }}">
                <i class="fa fa-plus mr-1"></i>
                Nuevo
            </a>

            @endif




            @endif

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
                    <th scope="col">Estado</th>
                    <th scope="col">Año</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($periodos as $item)

                <tr>

                <th scope="row">{{$item->id}}</th>
                <td> {{$item->nombre}}        </td>
                <td>{{$item->fecha_inicial}}</td>
                @if ($item->fecha_final == "")

                        <td> <i class="fas fa-clock"></i></td>
                @else

                    <td>{{ $item->fecha_final }}</td>

                @endif
                <td>{{ $item->estado }}</td>
                <td>{{ $item->ano }}</td>

                   <td>

                      <a href="{{route('periodos.edit', $item->id)}}" class="btn btn-transparent" style="color: #00723d" id="editTipoDo" ><i class="fa fa-pencil-alt"></i></a>
                      </div> <div class="btn-group" style="color: #00723d">



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
