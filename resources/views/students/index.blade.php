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
            Lista de Estudiantes
        </h1></div>
        <div class="float-right text-capitalize"> <a class=" btn btn-main btn-block btn-sm" href="{{ route('estudiantes.create') }}">
            <i class="fa fa-plus mr-1"></i>
        Nuevo</a></div>
      </div>
      <hr class="my-0 ">

        <div class="table-responsive mt-3">
            <table class="table table-stripe  table-sm" id="tablaEstudiante">
                <thead>
                    <tr class="text-center" >
                        <th class="th" >ID</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>No. documento</th>
                        <th >Curso</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $item)
                    <tr class="text-center" >

                        <td>{{$item->id}}</td>
                        <td  >{{$item->first_name}} {{ $item->second_name}}</td>
                        <td >{{$item->last_name}}</td>
                        <td >{{$item->number_document}}</td>
                        <td >{{$item->course->course}} - {{$item->course->variation}}</td>
                        <td>{{ $item->state }}</td>
                        <td >


                                <div class="btn-group" style="color: #00723d">
                                  <a href="{{route('estudiantes.edit', $item->id)}}" class="btn btn-transparent color-option py-1"  id="editTipoDo" ><i class="fa fa-pencil-alt "></i></a>
                                  <a href="{{route('estudiantes.show', $item->id)}}" class="btn btn-transparent color-option py-1"  id="editTipoDo" ><i class="fas fa-eye"></i></a>


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
