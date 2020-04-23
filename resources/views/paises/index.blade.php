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
        <table class="table table-striped"  id="tablaPais">
            <thead>
                <tr>
                    <th width="8px">ID</th>
                    <th width="8px" >Nombre</th>
                    <th width="3px">Abreviatura</th>
                    <th width="8px">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($country as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->nombre}}</td>
                    <td>{{$item->abreviatura}}</td>
                   <td>
                    <div class="btn-group" style="color: #00723d">
                        <form  action="{{ route('paises.destroy', $item->id)}}" method="post">
                        <a href="{{route('paises.edit', $item->id)}}" class="btn btn-transparent" style="color: #00723d" id="editTipoDo" ><i class="fa fa-pencil-alt mr-2"></i></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-transparent" style="color: #00723d" id="borrarTipoDoc" ><i class="fas fa-trash"></i></button>
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
