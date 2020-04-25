@extends('plantilla')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/estudiantes.css') }}">
@endsection

@section('content')
    <div class="header-container">
        <div class="title">
            <h1>
                <i class="far fa-file-alt"></i>
                Ver estudiante
            </h1>
        </div>


    </div>

        <form action="" class="row col-lg-12" style="border-radius: 1rem;background-color: white;box-shadow: 0 0 2px 1px #c3c3c3; margin-left: 3px; padding: 25px 15px;">
            <div class="col-md-12 col-lg-6 form-left">
                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Primer Nombre:</label>
                    <div class="col-sm-8 input-group">
                        <input type="text" class="form-control" d name="first_name" value=" {{$student->first_name}}">
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 form-left">
                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Segundo Nombre:</label>
                    <div class="col-sm-8 input-group ">
                    <input type="text" class="form-control" name="second_name" value="{{$student->second_name}}">
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 form-left">
                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Apellidos:</label>
                    <div class="col-sm-8 input-group">
                    <input type="text" class="form-control" name="last_name" value="{{$student->last_name}}">
                    </div>
                </div>
            </div>


            <div class="col-md-12 col-lg-6 form-left">
                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Municipio:</label>
                    <div class="col-sm-8 input-group">
                    <input type="text" class="form-control" name="city" value="{{$student->city->nombre}}">
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-6 form-left">
                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Tipo documento:</label>
                    <div class="col-sm-8 input-group">
                        <input type="text" class="form-control" name="type_document" value="{{$student->type_document->abreviatura}}"">
                    </div>
                </div>
            </div>



            <div class="col-md-12 col-lg-6 form-left">
                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Numero de Documento:</label>
                    <div class="col-sm-8 input-group">
                    <input type="text" class="form-control" name="number_document" value="{{$student->number_document}}">
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-6 form-left">
                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Fecha de expedición:</label>
                    <div class="col-sm-8 input-group">
                    <input type="date" class="form-control" name="date_expedition" value="{{$student->expedition_date}}">
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-6 form-left">
                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Fecha de Nacimiento:</label>
                    <div class="col-sm-8 input-group">
                    <input type="date" class="form-control" name="birth_date" value="{{$student->birth_date}}">
                    </div>
                </div>
            </div>




            <div class="col-md-12 col-lg-6 form-left mt-4">
                <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">Volver</a>
            </div>

            <div class="col-md-12 col-lg-6 form-left">
                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Curso:</label>
                    <div class="col-sm-8 input-group">
                    <input type="text" class="form-control" name="" value="{{$student->course->course}} - °{{$student->course->variation}}">
                    </div>
                </div>
            </div>
        </form>
@endsection
