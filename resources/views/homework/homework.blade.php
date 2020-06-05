@extends('templateCourse')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/style-nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/homework.css') }}">
@endsection

@section('content')

<div class="row">

    <div class="col-md-4">
        @component('components.navbar-course')
        @endcomponent
    </div>

    <div class="col-md-8">
        <h2 class="mb-4">Tarea</h2>
        <hr>
        <div class="content-button-homework">
            <a href="">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/></svg>
                Crear Tarea</a>
        </div>
        
        <div class="info-date-homework">
            <p>
                <svg width="16px" height="16px">
                    <circle cx="10" cy="10" r="5"/>
                </svg>
                Tareas aun a tiempo</p>   
            <p>
                <svg width="16px" height="16px">
                    <circle cx="10" cy="10" r="5"/>
                </svg>
                Tarea que llego fecha limite de entrega</p>
        </div>


        <div class="list-homeworks">
            <a href="" class="card-link">
                <div class="card-homework card-danger shadow-car-danger">
                    
                    <div class="title-homework">
                        <p>Informe sobre vicent Van vohg</p>
                    </div>
                    <div class="date-homework">
                        <p>Fecha limite</p>
                        <p>05/04/2002</p>
                    </div>
                    <div class="option-homework">
                        @if (Auth::user()->type_user == "Student")
                        @endif
                        <p>Sin calificación</p>
                        
                    </div>
                    
                </div>
                
            </a>
            <a href="" class="card-link">
                <div class="card-homework card-success shadow-car-success">
                    
                    <div class="title-homework">
                        <p>Conexion PHP- Mysql</p>
                    </div>
                    <div class="date-homework">
                        <p>Fecha limite</p>
                        <p>10/06/2020</p>
                    </div>
                    <div class="option-homework">
                        @if (Auth::user()->type_user == "Student")
                        @endif
                        <p>100</p>
                        
                    </div>
                    
                </div>
                
            </a>
        </div>
    </div>
</div>

@endsection