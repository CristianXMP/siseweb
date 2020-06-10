@extends('plantilla')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/estudiantes.css') }}">
@endsection

@section('content')
    <div class="header-container">
        <div class="title">
            <h1>
                <i class="far fa-file-alt"></i>
                Actualizar Municipio
            </h1>
        </div>


    </div>
            @if ($errors->any())
                        <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        </div><br />
                    @endif
                    <form action="{{route('municipios.update', $city->id)}}"  method="POST" class="row col-lg-12" style="border-radius: 1rem;background-color: white;box-shadow: 0 0 2px 1px #c3c3c3; margin-left: 3px; padding: 25px 15px;">
            @method('PATCH')
            @csrf
            <div class="col-md-12 col-lg-6 form-left">
                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Nombre:</label>
                    <div class="col-sm-8 input-group">
                    <input type="text" name="nombre" class="form-control" value="{{$city->nombre}}">
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 form-left">
                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Abreviatura:</label>
                    <div class="col-sm-8 input-group ">
                    <input type="text" name="abreviatura" class="form-control" value="{{$city->abreviatura}}">
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-6 form-left">
                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Departamento:</label>
                    <div class="col-sm-8 input-group ">
                        <select name="departamento" id="" class="form-control">

                            <option value="{{$city->departament_id}}" selected>{{$city->Departament->nombre}}</option>

                        @forelse ($departament as $item)
                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                        @empty
                        <option value="">No hay datos en departamento</option>
                        @endforelse


                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 form-left"></div>

            <div class="col-md-12 col-lg-6 form-left mt-4">
                <button type="submit" class="btn btn-main">Actualizar</button>
                <a href="{{ route('municipios.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
@endsection