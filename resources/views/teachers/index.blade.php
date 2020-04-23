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
                <tr>
                    <td>1</td>
                    <td>Pepito Andrés</td>
                    <td>Perez Castro</td>
                    <td>11222112</td>
                    <td>Fisico cuantico</td>
                    <td>
                            <div class="btn-group" style="color: #00723d">
                              <form  action="{{route('profesores.destroy', 1)}}" method="post">
                              <a href="{{route('profesores.edit', 1)}}" class="btn btn-transparent" style="color: #00723d;padding: 2px;" id="editTipoDo" ><i class="fa fa-pencil-alt"></i></a>
                              <a href="{{route('profesores.show', 1)}}" class="btn btn-transparent" style="color: #00723d;padding: 2px;" id="editTipoDo" ><i class="fas fa-eye"></i></a>

                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-transparent" style="color: #00723d;padding: 2px;" id="borrarTipoDoc" ><i class="fas fa-trash"></i></button>
                                </form>

                            </div>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/teacher.js') }}"></script>
@endsection
