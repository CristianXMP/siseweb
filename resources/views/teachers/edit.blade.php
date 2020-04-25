@extends('plantilla')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/estudiantes.css') }}">
@endsection

@section('content')
    <div class="header-container">
        <div class="title">
            <h1>
                <i class="far fa-file-alt"></i>
                Editar Profesor
            </h1>
        </div>


    </div>

<form action="{{route('profesores.update', $TeacherEdit->id)}}" method="POST" class="row col-lg-12" style="border-radius: 1rem;background-color: white;box-shadow: 0 0 2px 1px #c3c3c3; margin-left: 3px; padding: 25px 15px;">
    @method('PATCH')
    @csrf

    <div class="col-md-12 col-lg-6 form-left">

                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Primer Nombre:</label>
                    <div class="col-sm-8 input-group">
                    <input type="text" class="form-control" name="primer_nombre" value="{{$TeacherEdit->first_name}}">
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 form-left">
                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Segundo Nombre:</label>
                    <div class="col-sm-8 input-group ">
                        <input type="text" class="form-control" name="segundo_nombre" value="{{$TeacherEdit->second_name}}">
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 form-left">
                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Apellidos:</label>
                    <div class="col-sm-8 input-group">
                        <input type="text" class="form-control" name="apellidos" value="{{$TeacherEdit->last_name}}">
                    </div>
                </div>
            </div>


            <div class="col-md-12 col-lg-6 form-left">
                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Municipio:</label>
                    <div class="col-sm-8 input-group ">
                        <select name="municipio" id="" class="form-control">
                        <option value="{{$TeacherEdit->city->id}}" selected>{{$TeacherEdit->city->nombre}} - {{$TeacherEdit->city->abreviatura}}</option>
                        @forelse ($TeacherCity as $item)
                        <option value="{{$item->id}}">{{$item->nombre}} - {{$item->abreviatura}}</option>
                        @empty
                        <option value="" selected disabled>No hay registros de ciudades o municipios</option>
                        @endforelse

                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-6 form-left">
                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Tipo de Documento:</label>
                    <div class="col-sm-8 input-group ">
                        <select name="tipo_de_documento" id="" class="form-control">
                        <option value="{{ $TeacherEdit->type_document->id}}" selected >{{ $TeacherEdit->type_document->nombre}} - {{ $TeacherEdit->type_document->abreviatura}}</option>
                            @forelse ($TeacherTypeDocument as $item)
                            <option value="{{$item->id}}">{{$item->nombre}} - {{$item->abreviatura}}</option>
                            @empty
                            <option value="" selected disabled>No hay registros de ciudades o municipios</option>
                            @endforelse
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-6 form-left">
                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Profesion:</label>
                    <div class="col-sm-8 input-group">
                    <input type="text" class="form-control" name="profesion" value="{{$TeacherEdit->profession}}">
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-6 form-left">
                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Numero de Documento:</label>
                    <div class="col-sm-8 input-group">
                    <input type="number" class="form-control" name="numero_de_documento" value="{{$TeacherEdit->number_document}}">
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-6 form-left">
                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Fecha de expedición:</label>
                    <div class="col-sm-8 input-group">
                    <input type="date" class="form-control" name="fecha_de_expedicion" value="{{$TeacherEdit->expedition_date}}">
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-6 form-left">
                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Fecha de Nacimiento:</label>
                    <div class="col-sm-8 input-group">
                    <input type="date" class="form-control" name="fecha_de_nacimiento" value="{{$TeacherEdit->birth_date}}">
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-6 form-left"></div>


            <div class="col-md-12 col-lg-6 form-left mt-4">
                <button type="submit" class="btn btn-main">Editar</button>
                <a href="{{ route('profesores.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
@endsection
