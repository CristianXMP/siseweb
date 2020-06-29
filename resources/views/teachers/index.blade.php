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
            Lista de Profesores
        </h1></div>
        <div class="float-right text-capitalize"><a class=" btn btn-main btn-block btn-sm" href="{{ route('profesores.create') }}" >
            <i class="fa fa-plus mr-1"></i>
        Nuevo</a></div>
      </div>
      <hr class="my-0 ">


    <div class="table-responsive mt-3">
        <table class="table table-stripe table-sm " id="tablaEstudiante">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Documento</th>
                    <th>Profesión</th>
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
                              <a href="{{route('profesores.edit', $item->id)}}" class="btn btn-transparent color-option" style="padding: 2px;" id="editTipoDo" ><i class="fa fa-pencil-alt"></i></a>
                              <a href="{{route('profesores.show', $item->id)}}" class="btn btn-transparent color-option" style="padding: 2px;" id="editTipoDo" ><i class="fas fa-eye"></i></a>

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
