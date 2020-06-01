@extends('plantilla')

@section('style')
<link rel="stylesheet" href="{{ asset('css/estudiantes.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Estudiantes sin usuarios</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row" style="margin-top: 1rem;">
                            <label for="col-sm-4 col-form-label student">Estudiante:</label>
                            <div class="col-sm-8 input-group ">

                                <input type="hidden" name="student" value="student">

                                <select name="estudiante" id="student" class="form-control d-flex justify-content-end">
                                    <option value="" selected disabled>Selecciona un estudiante</option>
                                    @forelse ($student as $item)
                                    <option value="{{$item->id}}">{{$item->first_name}} Curso:
                                        {{ $item->course->course }}</option>
                                    @empty
                                    <option value="" selected disabled>No hay datos</option>
                                    @endforelse

                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn  btn-main">
                                    Generar usuario
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

        <div class="col-md-6">
            <div class="card">
                
                <div class="card-header">Profesores sin usuario</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row" style="margin-top: 1rem;">
                            <label for="col-sm-4 col-form-label student">profesores:</label>
                            <div class="col-sm-8 input-group ">
                                <input type="hidden" name="teacher" value="teacher">
                                <select name="profesor" id="student" class="form-control d-flex justify-content-end">
                                    <option value="" selected>Selecciona un profesor</option>
                                    @forelse ($teacher as $item)
                                    <option value="{{$item->id}}">{{$item->first_name}} -- {{ $item->second_name }} --
                                        {{ $item->profession }} </option>
                                    @empty
                                    <option value="" selected disabled>No hay datos</option>
                                    @endforelse

                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn  btn-main">
                                    Generar usuario
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
    <br>
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registro de usuarios Administrativos</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row">

                            <div class="col-md-6">
                                <input type="hidden" name="admin" value="admin">
                                <div class="form-group">
                                    <label for="name" class="col-md-8 col-form-label text-md-right">Nombre</label>

                                    <div class="col-md-12">
                                        <input id="name" type="text" class="form-control " name="nombre"
                                            value="{{ old('nombre') }}" required autocomplete="name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="name" class="col-md-8 col-form-label text-md-right">Apellidos</label>

                                    <div class="col-md-12">
                                        <input id="name" type="text" class="form-control" name="apellidos"
                                            value="{{ old('apellidos') }}" required autocomplete="name">
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="name" class="col-md-8 col-form-label text-md-right">Cargo</label>

                                    <div class="col-md-12">
                                        <input id="name" type="text" class="form-control " name="cargo"
                                            value="{{ old('cargo') }}" required autocomplete="name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="name" class="col-md-8 col-form-label text-md-right">Cedula</label>

                                    <div class="col-md-12">
                                        <input id="name" type="text" class="form-control" name="cedula"
                                            value="{{ old('cedula') }}" required autocomplete="name">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-12">

                                <button type="submit" class="btn btn-main btn-block">Crear administrador</button>

                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection
