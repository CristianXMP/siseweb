@extends('templateCourse')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/style-nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/homework.css') }}">
    <style>
        .btn-main{
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
        <h2 class="mb-4">Tarea</h2>

        <div class="content-form-new-home">
        <form enctype="multipart/form-data" action="{{route('homework.update', $homework->id)}}" method="POST">
                @csrf
            <input type="text" placeholder="Titulo" class="control" name="title" value="{{$homework->title}}">
            <textarea name="description" id="" cols="30" rows="10" placeholder="Descripcción" class="style-textarea-new-form">{{$homework->description}}</textarea>

                <div class="row">
                    <div class="col-md-6">
                        <label for="">Fecha de Entrega</label>
                    <input type="date" class="control" name="deliverdate" value="{{$homework->deliver_date}}">
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="">Recurso (opcional)</label>

                        <div class="custom-file text-center">
                        <input accept=".doc,.docx,.pdf,.xls" type="file" class="custom-file-input form-control-md" id="customFile" name="resource">
                            <label class="custom-file-label text-left" for="customFile"  data-browse="Elegir">Ningún archivo seleccionado</label>


                        </div>
                        <small  class="text-left">Solo archivos (word, excel o pdf)</small>
                    </div>
                    <div class="col-md-6 col-sm-12" >
                        <label for="state">Estado</label>
                        <select name="state" id="state" class="custom-select">
                        <option value="{{$homework->state}}" selected>{{$homework->state}}</option>
                        @if ($homework->state == "Disponible")
                        <option value="Inactiva">Inactiva</option>
                        @else
                        <option value="Disponible">Disponible</option>
                        @endif

                        </select>

                    </div>
                    <div class="col-md-6">
                        <div class="mt-4">
                            <a href="{{ route('homework') }}" class="btn-secundary">Cancelar</a>
                                <button type="submit" class="btn" >Actualizar</button>
                            </div>
                    </div>

                </div>

            </form>
        </div>
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
