@extends('plantilla')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/estudiantes.css') }}">
@endsection

@section('content')
    <div class="header-container">
        @if (session()->get('success'))
        <script>
            swal('Exito','El registro se agrego', 'success');
        </script>



      @endif
      @if (session()->get('danger'))
      <div class="alert alert-success">
          {{ session()->get('danger') }}
      </div>
      @endif
        <div class="title">
            <h1>
                <i class="far fa-file-alt"></i>
                Asignaciones academicas
            </h1>
        </div>
        <div>
            <a class=" btn btn-main" href="{{ route('asignaciones.create') }}">
                <i class="fa fa-plus mr-1"></i>
                Nueva
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table" id="tablaAsignacion">
            <thead>
                <tr>
                    <th width="10px">ID</th>
                    <th width="10px">Profesor</th>
                    <th width="10px">Curso</th>
                    <th width="10px">Periodo</th>
                    <th width="10px">Materia</th>
                    <th width="5px">Acciones</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Pepito Perez</td>
                    <td> 11 - A</td>
                    <td>Periodo 1</td>
                    <td>Matematicas Avanzadas</td>
                   <td>
                      <div class="btn-group" style="color: #00723d">
                        <a href="{{route('asignaciones.edit', 1)}}" class="btn btn-transparent" style="color: #00723d" id="editTipoDo" ><i class="fa fa-pencil-alt"></i></a>
                        <a href="" class="btn btn-transparent" style="color: #00723d" id="editTipoDo" ><i class="fas fa-trash"></i></a>
                      </div>
                   </td>
                </tr>


            </tbody>
        </table>
    </div>
@endsection


@section('script')
    <script src="{{ asset('js/department.js') }}"></script>
@endsection

