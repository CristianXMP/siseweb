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
                Lista de Periodos
            </h1></div>
            <div class="float-right text-capitalize">   @if (count($periodos) == 0 )

                <a class=" btn btn-main" href="{{ route('periodos.create') }}">
                    <i class="fa fa-plus mr-1"></i>
                    Nuevo
                </a>

                @else

                @if ($periodos[0]['fecha_final'] == "")

                @else

                <a class=" btn btn-main btn-block btn-sm" href="{{ route('periodos.create') }}">
                    <i class="fa fa-plus mr-1"></i>
                    Nuevo
                </a>

                @endif

                @endif</div>
          </div>
          <hr class="my-0 ">

    <div class="table-responsive mt-3">
        <table class="table text-center table-sm"  id="tablaPeriodo">
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

                      <a href="{{route('periodos.edit', $item->id)}}" class="btn btn-transparent color-option"  style="padding: 2px;"  id="editTipoDo" ><i class="fa fa-pencil-alt"></i></a>
                      </div> <div class="btn-group">



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
