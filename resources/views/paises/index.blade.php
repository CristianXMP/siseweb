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
        <table class="table table-stripe " id="tablaPais">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Abreviatura</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($country as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->nombre}}</td>
                    <td>{{$item->abreviatura}}</td>
                    <td>
                        <div class="btn-group">
                           <a href="" style="color: #00723d" id="editPais">
                               <i class="fa fa-pencil-alt mr-2"></i>
                           </a>
                           <a href="" style="color: #00723d" id="verPais">
                                <i class="fa fa-eye mr-2"></i>    
                            </a>
                            <a href="" style="color: #00723d" id="borrarPais">
                                <i class="fa fa-trash"></i>
                            </a>
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