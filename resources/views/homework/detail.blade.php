@extends('templateCourse')

@section('style')
<link rel="stylesheet" href="{{ asset('css/style-nav.css') }}">
<link rel="stylesheet" href="{{ asset('css/homework.css') }}">

<style>
    .btn-main {
        color: #fff;
        background-color: #075a72 !important;
        border-color: #075a72 !important;
        margin-right: 30px;
        border-radius: 3rem;
        padding: 8px 23px;

    }

</style>
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

                    <h2 class="text-uppercase">Tarea: {{$homework->title}}</h2>
                    <p>Fecha de entrega: {{$homework->deliver_date}}</p>
                </div>

                @if (Auth::user()->type_user == "Teacher")


                <div class="dropdown no-arrow">
                    <button class="" type="button" data-toggle="dropdown" aria-expanded="true" aria-haspopup="true">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z" />
                        </svg>
                    </button>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{route('homework.edit', $homework->id)}}">Ediar</a>
                    </div>
                </div>

                @endif
            </div>

            <div class="body">

                <p class="text-center ">{{$homework->description}}</p>
                <hr class="mb-3">

                <div class="row ">

                    @if(Auth::user()->type_user == "Teacher")
                    <div class="content-state-home text-sm col-md-8 col-sm-12">

                        <x-card-state-homework number="{{$HomeworkCount}}" text="Han sido calificadas">
                        </x-card-state-homework>
                    </div>
                    <div class="clearfix">
                        <div class="col-md-8 col-sm-12 float-left mt-1">
                            <a href="{{route('qualify.homework', $homework->id)}}" style=" font-size: 1em; font-weight: 600" class="btn btn-block btn-main">
                                Calificaciones
                                <i class="fas  fa-check-square ml-2 "> </i>
                            </a>
                        </div>
                    </div>
                    @endif

                </div>

                @if (Auth::user()->type_user == "Student")

                @if (count($homeworksend) > 0)
                <div class="text-center" style="color: #075a72 !important; font-weight: bold !important; ">
                    <h3 class="text-cente text-uppercase">tarea calificada</h3>
                    <h4 class="text-center mb-3">NOTA: {{$homeworksend[0]['qualification']}}</h4>
                    <hr class="mt-2">
                    <h3 class="text-cente text-uppercase">observación</h3>
                    <p class="text-center">{{$homeworkinfo[0]['description']}}</p>


                </div>

                @elseif(strtotime(now()->format('y-m-d')) > strtotime($homework->deliver_date) && (count($homeworkinfo)
                == null))
                <p class="text-center" style="color: #075a72 !important; font-weight: bold !important; ">
                    Lo siento, pero has dejado pasar la fecha de entrega y tu nota por defecto de esta tarea
                    es 0 al menos que el profesor vuelva a habilitar la tarea.
                </p>
                @elseif(isset($homeworkinfo[0]['homework']))
                <p class="text-center py-2" style="color: #075a72 !important; font-weight: bold !important; ">
                    <h5 class="text-center">Esperando calificación.....</h5>
                    <div class="text-center">
                        <div class="spinner-border" role="status">
                        </div>

                      </div>
                </p>
                @else
                <h5 class="mt-4 mb-4">Tu Trabajo</h5>
                <form action="{{route('upload.homework', $homework->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="custom-file">
                        <input type="file" accept=".doc,.docx,.pdf,.xls" name="resource" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile" data-browse="Elegir">Ningún archivo
                            seleccionado</label>
                    </div>
                    <small class="text-left">Solo archivos (word, excel o pdf)</small>

                    <div class="mt-4">

                        <button style=" font-size: 1em; font-weight: 600" class="btn  btn-main">Entregar</button>


                    </div>

                </form>

                @endif

                @endif

            </div>



        </div>
        @if (Auth::user()->type_user == "Student")
        <a href="{{route('homework-list')}}" style=" font-size: 1em; font-weight: 600" class="btn  btn-main mt-3 btn-block">Volver</a>
        @endif
        @if (Auth::user()->type_user == "Teacher")
        <a href="{{route('homework')}}" style=" font-size: 1em; font-weight: 600" class="btn  btn-main mt-3 btn-block">Volver</a>
        @endif
    </div>
</div>

@endsection

@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
<script>
    $(document).ready(function() {
        bsCustomFileInput.init()
    })

</script>
@endsection
