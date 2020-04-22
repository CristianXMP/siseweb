@extends('plantilla')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/estudiantes.css') }}">
@endsection

@section('content')
    <div class="header-container">

        @if (session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>

      @endif
      @if (session()->get('danger'))
      <div class="alert alert-success">
          {{ session()->get('danger') }}
      </div>
      @endif
        <div class="title">
            <h1>
                <i class="far fa-file-alt"></i>
                Lista de Paises
            </h1>
        </div>
        <div>
            <a class=" btn btn-main" href="{{ route('paises.create') }}">
                <i class="fa fa-plus mr-1"></i>
                Nuevo
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered text-center" style="width:100%" id="tablaPais">
            <thead>
                <tr>
                    <th width="10px">ID</th>
                    <th width="10px" >Nombre</th>
                    <th width="10px">Abreviatura</th>
                    <th width="5px">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($country as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->nombre}}</td>
                    <td>{{$item->abreviatura}}</td>
                   <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <form  action="{{ route('paises.destroy', $item->id)}}" method="post">
                        <a href="{{route('paises.edit', $item->id)}}" class="btn  btn btn-primary rounded" data-toggle="tooltip" data-placement="top" title="Editar" href="{{ route('paises.edit', $item->id)}}"><i class="fas fa-pen-alt"></i></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit"  class=" btn  btn-danger rounded" data-toggle="tooltip" data-placement="top" title="Eliminar" type="submit"><i class="fas fa-trash"></i></button>
                          </form>

                      </div>

                   </td>
                </tr>

                @endforeach

            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/country.js') }}"></script>

@endsection
