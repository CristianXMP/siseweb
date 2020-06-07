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
    <h4 class="title text-center mt-1 mb-1">PROFESORES</h4>
    <hr class="my-auto">
    <div class="col-md-6">
        <div class="panel-group mt-3" id="accordion">
            @forelse ($academicAssignment as $item)
            <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a class="btn  btn-primary btn-block text-left border " data-toggle="collapse" data-parent="#accordion" href="{{ '#'.$item->teacher->first_name }}">
                    {{ $item->teacher->first_name }} {{ $item->teacher->last_name }}</a>
                  </h4>
                </div>
                <div id="{{$item->teacher->first_name }}" class="panel-collapse collapse in">
                  <div class="panel-body">
                      <div class="table-responsive ">
                          <table class="table-sm">
                            <thead >
                              <tr class="text-center bg-info text-white">
                                <th>Materias</th>
                                <th>Cursos</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr class="text-center">
                                <td>matematicas</td>
                                <td>11-°A</td>
                                <td><a href="" class="btn btn-primary btn-sm"><i class="fa fa-pencil-alt"></i></a></td>
                              </tr>
                            </tbody>
                          </table>
                          </div>
                  </div>
                </div>
              </div>
            @empty

            @endforelse


          </div>
    </div>

{{--<div class="table-responsive">
        <table class="table table-sm text-center" id="tablaAsignacion">
            <thead>
                <tr>
                    <th width="10px">ID</th>
                    <th width="10px">Nombre</th>
                    <th width="10px">Apellidos</th>


                </tr>
            </thead>
            <tbody>
                @forelse ($teacher as $item)
                <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->first_name}}</td>
                <td>{{$item->last_name}}</td>


                  {{--
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
        </div>--}}

@endsection


@section('script')
    <script src="{{ asset('js/department.js') }}"></script>
@endsection

