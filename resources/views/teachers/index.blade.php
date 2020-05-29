@extends('plantilla')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/estudiantes.css') }}">
@endsection

@section('content')
    <div class="header-container">
        <div class="title">
            <h1>
                <i class="far fa-file-alt"></i>
                Lista de Profesores
            </h1>
        </div>
        <div>
            <a class=" btn btn-main" href="{{ route('profesores.create') }}">
                <i class="fa fa-plus mr-1"></i>
            Nuevo</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-stripe " id="tablaProfesor">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Documento</th>
                    <th>Profesion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($teachers as $item)
                <tr>


                <td>{{$item->id}}</td>
                <td>{{$item->first_name}} {{$item->second_name}}</td>
                <td>{{$item->last_name}}</td>
                <td>{{$item->number_document}}</td>
                <td>{{$item->profession}}</td>


                    <td>


                            <div class="btn-group" style="color: #00723d">

                              <form  action="{{route('profesores.destroy', $item->id)}}" method="post">
                              <a href="{{route('profesores.edit', $item->id)}}" class="btn btn-transparent" style="color: #00723d;padding: 2px;" id="editTipoDo" ><i class="fa fa-pencil-alt"></i></a>
                              <a href="{{route('profesores.show', $item->id)}}" class="btn btn-transparent" style="color: #00723d;padding: 2px;" id="editTipoDo" ><i class="fas fa-eye"></i></a>

                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-transparent" style="color: #00723d;padding: 2px;" id="borrarTipoDoc" ><i class="fas fa-trash"></i></button>
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
    <script src="{{ asset('js/teacher.js') }}"></script>
@endsection
