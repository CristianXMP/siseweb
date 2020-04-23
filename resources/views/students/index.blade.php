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

    <div class="table-responsive">
        <table class="table table-stripe " id="tablaEstudiante">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Curso</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $item)
                <tr>

                    <td>{{$item->id}}</td>
                    <td>{{$item->first_name}} {{ $item->second_name}}</td>
                    <td>{{$item->last_name}}</td>
                <td>{{$item->course->course}} - {{$item->course->variation}}</td>
                    <td>


                            <div class="btn-group" style="color: #00723d">
                              <form  action="{{route('estudiantes.destroy', $item->id)}}" method="post">
                              <a href="{{route('estudiantes.edit', $item->id)}}" class="btn btn-transparent" style="color: #00723d" id="editTipoDo" ><i class="fa fa-pencil-alt mr-2"></i></a>
                              <a href="{{route('estudiantes.show', $item->id)}}" class="btn btn-transparent" style="color: #00723d" id="editTipoDo" ><i class="fas fa-eye mr-2"></i></a>

                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-transparent" style="color: #00723d" id="borrarTipoDoc" ><i class="fas fa-trash"></i></button>
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
