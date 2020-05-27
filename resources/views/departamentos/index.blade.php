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
                Lista de Departamentos
            </h1>
        </div>
        <div>
            <a class=" btn btn-main" href="{{ route('departamentos.create') }}">
                <i class="fa fa-plus mr-1"></i>
                Nuevo
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table" id="tablaDepartamento">
            <thead>
                <tr>
                    <th width="10px">ID</th>
                    <th width="10px" >Nombre</th>
                    <th width="10px">Abreviatura</th>
                    <th width="10px">Pais</th>
                    <th width="5px">Acciones</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($departament as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->nombre}}</td>
                    <td>{{$item->abreviatura}}</td>
                    <td>{{$item->pais->nombre}}</td>
                   <td>
                      <div class="btn-group">
                        <a href="{{route('departamentos.edit', $item->id)}}" class="btn btn-transparent color-option" id="editTipoDo" ><i class="fa fa-pencil-alt mr-2"></i></a>
                      </div>

                   </td>
                </tr>

                @endforeach

            </tbody>
        </table>
    </div>
@endsection


@section('script')
    <script src="{{ asset('js/department.js') }}"></script>
@endsection

