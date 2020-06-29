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
            Lista de Cursos
        </h1></div>
        <div class="float-right text-capitalize  ">  <a class=" btn btn-main btn-block btn-sm" href="{{ route('cursos.create') }}">
            <i class="fa fa-plus mr-1"></i>
            Nuevo
        </a></div>
      </div>
      <hr class="my-0 ">

    <div class="table-responsive mt-3">
        <table class="table text-center table-sm" style="width:100%" id="tablaCursos">
            <thead>
                <tr>
                    <th width="10px">ID</th>
                    <th width="10px" >Curso</th>
                    <th width="10px">Jornada</th>
                    <th width="10px">D.grupo</th>
                    <th width="5px">Acciones</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($courses as $item)
                <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->course}} - °{{$item->variation}}</td>
                <td>{{$item->working_day}}</td>
                @if ($item->teacher == "")
                    <td>N/A</td>
                @else
                <td>{{$item->teacher->first_name}} {{$item->teacher->last_name}}</td>
                @endif

                   <td>
                      <div class="btn-group" style="color: #00723d">

                        <a href="{{route('cursos.edit', $item->id)}}" class="btn btn-transparent color-option" style="padding: 2px;" id="editTipoDo" ><i class="fa fa-pencil-alt mr-2"></i></a>



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
    <script src="{{ asset('js/course.js') }}"></script>
@endsection

