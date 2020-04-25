@extends('plantilla')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/estudiantes.css') }}">
@endsection

@section('content')
           
            @if (session()->get('danger'))
            <div class="alert alert-success">
            {{ session()->get('danger') }}
            </div>
            @endif

    <div class="header-container">
        <div class="title">
            <h1>
                <i class="far fa-file-alt"></i>
                Agregar Asignacion Academica
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
    <form action="{{route('asignaciones.store')}}" method="POST" class="row col-lg-12" style="border-radius: 1rem;background-color: white;box-shadow: 0 0 2px 1px #c3c3c3; margin-left: 3px; padding: 25px 15px;">
           @csrf
           <div class="col-md-12 col-lg-6 form-left">
            <div class="form-group row" style="margin-top: 1rem;">
                <label for="col-sm-4 col-form-label">Profesor:</label>
                <div class="col-sm-8 input-group ">
                    <select name="profesor" id="" class="form-control">
                        <option value="" selected disabled>Escoger un Profesor </option>
                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-6 form-left">
            <div class="form-group row" style="margin-top: 1rem;">
                <label for="col-sm-4 col-form-label">Curso:</label>
                <div class="col-sm-8 input-group ">
                    <select name="curso" id="" class="form-control">
                        <option value="" selected disabled>Escoger un Curso</option>
        
                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-6 form-left">
            <div class="form-group row" style="margin-top: 1rem;">
                <label for="col-sm-4 col-form-label">Periodo:</label>
                <div class="col-sm-8 input-group ">
                    <select name="periodo" id="" class="form-control">
                        <option value="" selected disabled>Escoger un Periodo</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-6 form-left">
            <div class="form-group row" style="margin-top: 1rem;">
                <label for="col-sm-4 col-form-label">Materia:</label>
                <div class="col-sm-8 input-group ">
                    <select name="materia" id="" class="form-control">
                        <option value="" selected disabled>Escoger un Materia</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-6 form-left mt-4">
            <button type="submit" class="btn btn-main">Guardar</button>
            <a href="{{ route('asignaciones.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
@endsection
