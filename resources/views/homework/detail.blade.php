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

        <div class="container-detail-homework">
            <div class="header">
                <div>
                    
                    <h2>Tarea sobre Vicent Van Gog</h2>
                    <p>Fecha de entrega: 02/02/2002</p>
                </div>

                @if (Auth::user()->type_user == "Teacher")


                <div class="dropdown no-arrow">
                    <button class="" type="button" data-toggle="dropdown" aria-expanded="true"  aria-haspopup="true">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/></svg>
                    </button>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" >
                      <a class="dropdown-item" href="#">Ediar</a>
                      <a class="dropdown-item" href="#">Eliminar</a>
                    </div>
                  </div>

                    
                    
                @endif
            </div>

            <div class="body">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veniam accusamus saepe minus, itaque error alias eos. Cupiditate rem labore, nobis ullam ea autem, ad animi laudantium esse itaque veritatis.</p>

                <a href="" download>
                   
                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><g><rect fill="none" height="24" width="24"/><path d="M12,4c4.41,0,8,3.59,8,8s-3.59,8-8,8s-8-3.59-8-8S7.59,4,12,4 M12,2C6.48,2,2,6.48,2,12c0,5.52,4.48,10,10,10 c5.52,0,10-4.48,10-10C22,6.48,17.52,2,12,2L12,2z M13,12l0-3c0-0.55-0.45-1-1-1h0c-0.55,0-1,0.45-1,1l0,3H9.21 c-0.45,0-0.67,0.54-0.35,0.85l2.79,2.79c0.2,0.2,0.51,0.2,0.71,0l2.79-2.79c0.31-0.31,0.09-0.85-0.35-0.85H13z"/></g></svg>
                   
                    Archivo de guia
                </a>

                @if(Auth::user()->type_user == "Teacher")
                <div class="content-state-home">
                    <x-card-state-homework number="3" text="Han presentado la tarea"></x-card-state-homework>

                    <x-card-state-homework number="7" text="Han sido calificadas"></x-card-state-homework>
                </div>

                @endif

                @if (Auth::user()->type_user == "Student")
                    <h5 class="mt-4 mb-4">Tu Trabajo</h5>
                    <form action="">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile"  data-browse="Elegir">Ningún archivo seleccionado</label>
                        </div>

                        <button>Entregar</button>
                    </form>
                @endif

            </div>
        </div>

        @if (Auth::user()->type_user == "Teacher")
        <h3 class="mt-5 mb-2 title-items">Tareas entregadas</h3>
        {{-- <hr> --}}
        
            <x-item-homework name="Diego Andres Rambao Jimenez" qualification="4.5"></x-item-homework>
            <x-item-homework name="Maribel Sofia Jimenez Nibles" qualification="4.5"></x-item-homework>
            <x-item-homework name="Daniel Enrique Rambao Jimenez" qualification="4.5"></x-item-homework>
            <x-item-homework name="Ivan Rafael Rambao Moreno" qualification="4.5"></x-item-homework>
        @else

        @endif

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>
</div>

@endsection

@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    <script>
        $(document).ready(function () {
            bsCustomFileInput.init()
        })

    </script>
@endsection