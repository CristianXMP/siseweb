@extends('plantilla')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/estudiantes.css') }}">
@endsection

@section('content')



    <div class="header-container">
        <div class="title">
            <h1>
                <i class="far fa-file-alt"></i>
                Editar Curso
            </h1>
        </div>


    </div>

<form action="{{route('cursos.update', $CourseEdit->id)}}" method="POST" class="row col-lg-12" style="border-radius: 1rem;background-color: white;box-shadow: 0 0 2px 1px #c3c3c3; margin-left: 3px; padding: 25px 15px;">
    @method('PATCH')
    @csrf
    <div class="col-md-12 col-lg-6 form-left">
                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Curso:</label>
                    <div class="col-sm-8 input-group">
                    <input type="text" class="form-control" name="curso" value="{{$CourseEdit->course}}">
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-6 form-left">
                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Variacion:</label>
                    <div class="col-sm-8 input-group ">
                        <input type="text" class="form-control" name="abreviatura" value="{{$CourseEdit->variation}}">
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-6 form-left">
                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Jornada:</label>
                    <div class="col-sm-8 input-group ">
                    <input type="text" class="form-control" name="jornada" value="{{$CourseEdit->working_day}}">
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-6 form-left">
                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Director de Grupo:</label>
                    <div class="col-sm-8 input-group ">
                        <select name="director_de_grupo" id="" class="form-control">
                        <option value="{{$CourseEdit->teacher->id}}" selected>{{$CourseEdit->teacher->first_name}} {{$CourseEdit->teacher->last_name}} ({{$CourseEdit->teacher->profession}})</option>
                            @forelse ($Teacher as $item)
                        <option value="{{$item->id}}">{{$item->first_name}} {{$item->last_name}} ({{$item->profession}})</option>
                            @empty
                            <option value=""></option>
                            @endforelse
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-6 form-left mt-4">
                <button type="submit" class="btn btn-main">Editar</button>
                <a href="{{ route('cursos.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
@endsection
