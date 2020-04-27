@extends('plantilla')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/estudiantes.css') }}">
@endsection

@section('content')



    <div class="header-container">
        <div class="title">
            <h1>
                <i class="far fa-file-alt"></i>
                Editar Asignacion Academica
            </h1>
        </div>


    </div>

    <form action="{{route('asignaciones.update', $asignacion->id)}}" method="POST" class="row col-lg-12" style="border-radius: 1rem;background-color: white;box-shadow: 0 0 2px 1px #c3c3c3; margin-left: 3px; padding: 25px 15px;">
        @method('PATCH')
        @csrf
        <div class="col-md-12 col-lg-6 form-left">
            <div class="form-group row" style="margin-top: 1rem;">
                <label for="col-sm-4 col-form-label">Profesor:</label>
                <div class="col-sm-8 input-group ">
                    <select name="profesor" id="" class="form-control">
                    <option value="{{$asignacion->teacher_id}}" selected >{{$asignacion->teacher->first_name}} - ({{$asignacion->teacher->profession}})</option>

                        @forelse ($teacher as $item)
                    <option value="{{$item->id}}">{{$item->first_name}} - {{$item->last_name}} - ({{$item->profession}})</option>

                        @empty
                        <option value="" selected disabled>Escoger un Profesor </option>

                        @endforelse
                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-6 form-left">
            <div class="form-group row" style="margin-top: 1rem;">
                <label for="col-sm-4 col-form-label">Curso:</label>
                <div class="col-sm-8 input-group ">
                    <select name="curso" id="" class="form-control">
                    <option value="{{$asignacion->course_id}}" selected >{{$asignacion->course->course}} - °{{$asignacion->course->variation}}</option>

                        @forelse ($course as $item)

                    <option value="{{$item->id}}">{{$item->course}} - ({{$item->variation}})</option>

                        @empty
                        <option value="" selected disabled>No Hay Datos </option>

                        @endforelse

                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-6 form-left">
            <div class="form-group row" style="margin-top: 1rem;">
                <label for="col-sm-4 col-form-label">Periodo:</label>
                <div class="col-sm-8 input-group ">
                    <select name="periodo" id="" class="form-control">
                        <option value="{{$asignacion->period_id}}" selected >{{$asignacion->period->nombre}} </option>

                        @forelse ($period as $item)

                    <option value="{{$item->id}}">{{$item->nombre}}</option>

                        @empty
                        <option value="" selected disabled>No Hay Datos </option>

                        @endforelse

                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-6 form-left">
            <div class="form-group row" style="margin-top: 1rem;">
                <label for="col-sm-4 col-form-label">Materia:</label>
                <div class="col-sm-8 input-group ">
                    <select name="materia" id="" class="form-control">
                        <option value="{{$asignacion->subject_id}}" selected >{{$asignacion->subject->nombre}} - ({{$asignacion->subject->abreviatura}})</option>

                        @forelse ($subject as $item)

                    <option value="{{$item->id}}">{{$item->nombre}} - ({{$item->abreviatura}})</option>

                        @empty
                        <option value="" selected disabled>No Hay Datos </option>

                        @endforelse

                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-6 form-left mt-4">
            <button type="submit" class="btn btn-main">Editar</button>
            <a href="{{ route('asignaciones.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
@endsection
