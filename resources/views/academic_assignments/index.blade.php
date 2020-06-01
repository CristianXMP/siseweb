@extends('plantilla')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/estudiantes.css') }}">
@endsection

@section('content')
    <div class="header-container">

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
        <table class="table table-sm text-center" id="tablaAsignacion">
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
                @forelse ($academicAssignment as $item)
                <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->teacher->first_name}}</td>
                <td>{{$item->course->course}} - °{{$item->course->variation}}</td>
                <td>{{$item->period->nombre}}</td>
                <td>{{$item->subject->nombre}}</td>
                   <td>
                      <div class="btn-group" style="color: #00723d">
                        <form  action="{{route('asignaciones.destroy', $item->id)}}" method="post">
                            <a href="{{route('asignaciones.edit', $item->id)}}" class="btn btn-transparent color-option"  style="padding: 2px;" id="editTipoDo" ><i class="fa fa-pencil-alt"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-transparent color-option"  style="padding: 2px;" id="borrarTipoDoc" ><i class="fas fa-trash"></i></button>
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
    <script src="{{ asset('js/department.js') }}"></script>
@endsection

