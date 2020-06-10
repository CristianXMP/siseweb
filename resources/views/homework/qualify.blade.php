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
        <div class="content-qualify">
            <div class="header">
                <h4>Diego Rambao Jimenez</h4>
                <p>Sin calificación</p>
            </div>

            <div class="container-button-download">
                <a href="" download class="btn-h">
                       
                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><g><rect fill="none" height="24" width="24"/><path d="M12,4c4.41,0,8,3.59,8,8s-3.59,8-8,8s-8-3.59-8-8S7.59,4,12,4 M12,2C6.48,2,2,6.48,2,12c0,5.52,4.48,10,10,10 c5.52,0,10-4.48,10-10C22,6.48,17.52,2,12,2L12,2z M13,12l0-3c0-0.55-0.45-1-1-1h0c-0.55,0-1,0.45-1,1l0,3H9.21 c-0.45,0-0.67,0.54-0.35,0.85l2.79,2.79c0.2,0.2,0.51,0.2,0.71,0l2.79-2.79c0.31-0.31,0.09-0.85-0.35-0.85H13z"/></g></svg>
                   
                    Archivo de guia
                </a>
            </div>

            <form action="" >
                <div class="form-row">
                    <div class="col-md-3">
                        <input type="text" placeholder="Nota" class="form-control-h">
                    </div>
                    <div class="col-md-9">
                        <input type="text" placeholder="Observación" class="form-control-h">
                    </div>
                </div>
                <button class="btn-h">Calificar</button>
            </form>
        </div>
    </div>
</div>

@endsection