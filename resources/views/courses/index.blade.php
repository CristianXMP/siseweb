@extends('plantilla')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/estudiantes.css') }}">
@endsection

@section('content')
        @if (session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>

        @endif
    <div class="header-container">
        <div class="title">
            <h1>
                <i class="far fa-file-alt"></i>
                Lista de Cursos
            </h1>
        </div>
        <div>
            <a class=" btn btn-main" href="{{ route('cursos.create') }}">
                <i class="fa fa-plus mr-1"></i>
                Nuevo
            </a>
        </div>
    </div>


    <div class="table-responsive">
        <table class="table text-center" style="width:100%" id="tablaCursos">
            <thead>
                <tr>
                    <th width="10px">ID</th>
                    <th width="10px" >Nombre</th>
                    <th width="10px">Abreviatura</th>
                    <th width="10px">Jornada</th>
                    <th width="10px">Director de grupo</th>
                    <th width="5px">Acciones</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Cuarto A</td>
                    <td>4 - A</td>
                    <td>Mañana</td>
                    <td>Diego Rambao</td>
                   <td>
                      <div class="btn-group" style="color: #00723d">
                        <form  action="{{ route('cursos.destroy', 1)}}" method="post">
                        <a href="{{route('cursos.edit', 1)}}" class="btn btn-transparent" style="color: #00723d;padding: 2px;" id="editTipoDo" ><i class="fa fa-pencil-alt mr-2"></i></a>

                        <a href="{{route('cursos.show', 1)}}" class="btn btn-transparent" style="color: #00723d;padding: 2px;" id="editTipoDo" ><i class="fas fa-eye"></i></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-transparent" style="color: #00723d" id="borrarTipoDoc" ><i class="fas fa-trash"></i></button>
                          </form>

                      </div>
                   </td>
                </tr>


            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/course.js') }}"></script>
@endsection

