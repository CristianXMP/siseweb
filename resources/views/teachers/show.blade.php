@extends('plantilla')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/estudiantes.css') }}">
@endsection

@section('content')
    <div class="header-container">
        <div class="title">
            <h1>
                <i class="far fa-file-alt"></i>
                Ver Profesor
            </h1>
        </div>


    </div>

        <form action="" class="row col-lg-12" style="border-radius: 1rem;background-color: white;box-shadow: 0 0 2px 1px #c3c3c3; margin-left: 3px; padding: 25px 15px;">
            <div class="col-md-12 col-lg-6 form-left">
                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Primer Nombre:</label>
                    <div class="col-sm-8 input-group">
                    <input type="text" class="form-control" name="" value="{{$TeacherShow->first_name}}">
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 form-left">
                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Segundo Nombre:</label>
                    <div class="col-sm-8 input-group ">
                    <input type="text" class="form-control" name="second_name" value="{{$TeacherShow->second_name}}">
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 form-left">
                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Apellidos:</label>
                    <div class="col-sm-8 input-group">
                    <input type="text" class="form-control" name="last_name" value="{{$TeacherShow->last_name}}">
                    </div>
                </div>
            </div>


            <div class="col-md-12 col-lg-6 form-left">
                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Municipio:</label>
                    <div class="col-sm-8 input-group">
                    <input type="text" class="form-control" name="city" value="{{$TeacherShow->city->nombre}} - {{$TeacherShow->city->abreviatura}}">
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-6 form-left">
                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Tipo documento:</label>
                    <div class="col-sm-8 input-group">
                    <input type="text" class="form-control" name="type_document" value="{{$TeacherShow->type_document->nombre}} - {{$TeacherShow->type_document->abreviatura}}">
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-6 form-left">
                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Profesión:</label>
                    <div class="col-sm-8 input-group">
                    <input type="text" class="form-control" name="profession" value="{{$TeacherShow->profession}}">
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-6 form-left">
                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Numero de Documento:</label>
                    <div class="col-sm-8 input-group">
                    <input type="text" class="form-control" name="number_document" value="{{$TeacherShow->number_document}}">
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-6 form-left">
                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Fecha de expedición:</label>
                    <div class="col-sm-8 input-group">
                    <input type="text" class="form-control" name="date_expedition" value="{{$TeacherShow->expedition_date}}">
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-6 form-left">
                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Fecha de Nacimiento:</label>
                    <div class="col-sm-8 input-group">
                    <input type="text" class="form-control" name="birth_date" value="{{$TeacherShow->birth_date}}">
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-6 form-left"></div>


            <div class="col-md-12 col-lg-6 form-left mt-4">
                <a href="{{ route('profesores.index') }}" class="btn btn-secondary">Volver</a>
            </div>
        </form>
@endsection
