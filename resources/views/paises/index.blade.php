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
            <a class=" btn btn-main" href="{{ route('paises.create') }}">Nuevo</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-stripe ">
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
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-secondary">Left</button>
                        <button type="button" class="btn btn-secondary">Middle</button>
                        <button type="button" class="btn btn-secondary">Right</button>
                      </div>
                </td>





                </tr>

                @endforeach

            </tbody>
        </table>
    </div>
@endsection

