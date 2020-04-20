@extends('plantilla')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/estudiantes.css') }}">
@endsection

@section('content')
    <div class="header-container">
        <div class="title">
            <h1>
                <i class="far fa-file-alt"></i>
                Agregar Estudiante
            </h1>
        </div>

        
    </div>

        <form action="" class="row col-lg-12" style="border-radius: 1rem;background-color: white;box-shadow: 0 0 2px 1px #c3c3c3; margin-left: 3px; padding: 25px 15px;">
            <div class="col-md-12 col-lg-6 form-left">
                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Primer Nombre:</label>
                    <div class="col-sm-8 input-group">
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 form-left">
                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Segundo Nombre:</label>
                    <div class="col-sm-8 input-group ">
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 form-left">
                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Apellidos:</label>
                    <div class="col-sm-8 input-group">
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 form-left">
                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Pais: </label>
                    <div class="col-sm-8 input-group ">
                        <select name="" id="" class="form-control">
                            <option value="">Example 1</option>
                            <option value="">Example 2</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 form-left">
                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Departamento:</label>
                    <div class="col-sm-8 input-group ">
                        <select name="" id="" class="form-control">
                            <option value="">Example 1</option>
                            <option value="">Example 2</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 form-left">
                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Municipio:</label>
                    <div class="col-sm-8 input-group ">
                        <select name="" id="" class="form-control">
                            <option value="">Example 1</option>
                            <option value="">Example 2</option>
                        </select>
                    </div>
                </div>
            </div>
    
            <div class="col-md-12 col-lg-6 form-left">
                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Tipo de Documento:</label>
                    <div class="col-sm-8 input-group ">
                        <select name="" id="" class="form-control">
                            <option value="">Example 1</option>
                            <option value="">Example 2</option>
                        </select>
                    </div>
                </div>
            </div>
    
            <div class="col-md-12 col-lg-6 form-left">
                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Numero de Documento:</label>
                    <div class="col-sm-8 input-group">
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>
    
            <div class="col-md-12 col-lg-6 form-left">
                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Fecha de expedición:</label>
                    <div class="col-sm-8 input-group">
                        <input type="date" class="form-control">
                    </div>
                </div>
            </div>
    
            <div class="col-md-12 col-lg-6 form-left">
                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Fecha de Nacimiento:</label>
                    <div class="col-sm-8 input-group">
                        <input type="date" class="form-control">
                    </div>
                </div>
            </div>


            <div class="col-md-12 col-lg-6 form-left">
                <div class="form-group row" style="margin-top: 1rem;">
                    <label for="col-sm-4 col-form-label">Curso:</label>
                    <div class="col-sm-8 input-group ">
                        <select name="" id="" class="form-control">
                            <option value="">Example 1</option>
                            <option value="">Example 2</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-6 form-left"></div>

    
            <div class="col-md-12 col-lg-6 form-left mt-4">
                <a href="" class="btn btn-main">Guardar</a>
                <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
@endsection