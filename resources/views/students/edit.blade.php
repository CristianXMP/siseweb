@extends('plantilla')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/estudiantes.css') }}">
@endsection

@section('content')
    <div class="header-container">
        <div class="title">
            <h1>
                <i class="far fa-file-alt"></i>
                Editar Estudiante
            </h1>
        </div>


    </div>

<form action="{{route('estudiantes.update', $student->id)}}" method="POST" class="row col-lg-12" style="border-radius: 1rem;background-color: white;box-shadow: 0 0 2px 1px #c3c3c3; margin-left: 3px; padding: 25px 15px;">
    @method('PATCH')
    @csrf
        <div class="col-md-12 col-lg-6 form-left">
            <div class="form-group row" style="margin-top: 1rem;">
                <label for="col-sm-4 col-form-label">Primer Nombre:</label>
                <div class="col-sm-8 input-group">
                <input type="text" class="form-control" name="primer_nombre" value="{{$student->first_name}}">
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6 form-left">
            <div class="form-group row" style="margin-top: 1rem;">
                <label for="col-sm-4 col-form-label">Segundo Nombre:</label>
                <div class="col-sm-8 input-group ">
                <input type="text" class="form-control" name="segundo_nombre" value="{{$student->second_name}}">
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6 form-left">
            <div class="form-group row" style="margin-top: 1rem;">
                <label for="col-sm-4 col-form-label">Apellidos:</label>
                <div class="col-sm-8 input-group">
                <input type="text" class="form-control" name="apellidos" value="{{$student->last_name}}">
                </div>
            </div>
        </div>


        <div class="col-md-12 col-lg-6 form-left">
            <div class="form-group row" style="margin-top: 1rem;">
                <label for="col-sm-4 col-form-label">Municipio:</label>
                <div class="col-sm-8 input-group ">
                    <select name="municipio" id="" class="form-control">
                    <option value="{{$student->city_id}}" selected >{{$student->city->nombre}} - {{$student->city->abreviatura}}</option>
                        @forelse ($city as $item)
                    <option value="{{$item->id}}">{{$item->nombre}} - {{$item->abreviatura}}</option>
                        @empty
                        <option value="" selected disabled>No hay datos</option>
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
                    <option value="{{$student->document_type_id}}" selected >{{$student->type_document->abreviatura}} - {{$student->type_document->nombre}}</option>
                        @forelse ($type_document as $item)
                    <option value="{{$item->id}}">{{$item->abreviatura}} - {{$item->nombre}}</option>
                        @empty
                        <option value="">Example 2</option>
                        @endforelse


                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-6 form-left">
            <div class="form-group row" style="margin-top: 1rem;">
                <label for="col-sm-4 col-form-label">Numero de Documento:</label>
                <div class="col-sm-8 input-group">
                    <input type="number" class="form-control" name="numero_de_documento" value="{{$student->number_document}}">
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-6 form-left">
            <div class="form-group row" style="margin-top: 1rem;">
                <label for="col-sm-4 col-form-label">Fecha de expedición:</label>
                <div class="col-sm-8 input-group">
                <input type="date" class="form-control" name="fecha_de_expedicion" value="{{$student->expedition_date}}">
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-6 form-left">
            <div class="form-group row" style="margin-top: 1rem;">
                <label for="col-sm-4 col-form-label">Fecha de Nacimiento:</label>
                <div class="col-sm-8 input-group">
                <input type="date" class="form-control" name="fecha_de_nacimiento" value="{{$student->birth_date}}">
                </div>
            </div>
        </div>


        <div class="col-md-12 col-lg-6 form-left">
            <div class="form-group row" style="margin-top: 1rem;">
                <label for="col-sm-4 col-form-label">Curso:</label>
                <div class="col-sm-8 input-group ">
                    <select name="curso" id="" class="form-control">
                    <option value="{{$student->course_id}}" selected>{{$student->course->course}} -  °{{$student->course->variation}}</option>
                        @forelse ($course as $item)
                    <option value="{{$item->id}}">{{$item->course}} -  °{{$item->variation}}</option>
                        @empty
                        <option value="">Example 1</option>
                        @endforelse


                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-6 form-left"></div>


        <div class="col-md-12 col-lg-6 form-left mt-4">
            <button type="submit" class="btn btn-main">Guardar</button>
            <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
@endsection
