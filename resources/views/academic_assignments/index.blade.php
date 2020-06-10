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


    <hr class="my-auto">



        <div class="table-responsive mt-4">
            <table class="table table-sm text-center" id="tablaEstudiante">
                <thead>
                    <tr>
                        <th width="10px">ID</th>
                        <th width="10px">Nombre</th>
                        <th width="10px">Apellidos</th>
                        <th width="10px">Cedula</th>
                        <th width="10px">Carga academica</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($teacher as $item)
                    <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->first_name}}</td>
                    <td>{{$item->last_name}}</td>
                    <td>{{$item->number_document}}</td>
                    <td><a href="{{ route('asignaciones.show', $item->id) }}" class="btn color-option"><i class="fas fa-eye"></i></a></td>



                         {{--  <td>
                    <div class="btn-group" style="color: #00723d">
                            <form  action="{{route('asignaciones.destroy', $item->id)}}" method="post">
                                <a href="{{route('asignaciones.edit', $item->id)}}" class="btn btn-transparent color-option"  style="padding: 2px;" id="editTipoDo" ><i class="fa fa-pencil-alt"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-transparent color-option"  style="padding: 2px;" id="borrarTipoDoc" ><i class="fas fa-trash"></i></button>
                                  </form>
                        </div>

                         </td> --}}

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

