@extends('plantilla')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/estudiantes.css') }}">
@endsection

@section('content')
    <div class="header-container">
        <div class="title">
            <h1>
                <i class="far fa-file-alt"></i>
                Lista de Estudiantes
            </h1>
        </div>
        <div>
            <a class=" btn btn-main" href="{{ route('estudiantes.create') }}">
                <i class="fa fa-plus mr-1"></i>
            Nuevo</a>
        </div>
    </div>
    <hr class="my-auto">

        <div class="table-responsive mt-5">
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
                                  <form  action="{{route('estudiantes.destroy', $item->id)}}" method="post">
                                  <a href="{{route('estudiantes.edit', $item->id)}}" class="btn btn-transparent color-option" style="padding: 2px; id="editTipoDo" ><i class="fa fa-pencil-alt "></i></a>
                                  <a href="{{route('estudiantes.show', $item->id)}}" class="btn btn-transparent color-option" style="padding: 2px;  id="editTipoDo" ><i class="fas fa-eye"></i></a>

                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-transparent color-option" style="padding: 2px;" id="borrarTipoDoc" ><i class="fas fa-trash"></i></button>
                                    </form>

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
