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

        <div class="content-form-new-home">
            <form action="">
                <input type="text" placeholder="Titulo" class="control">
                <textarea name="" id="" cols="30" rows="10" placeholder="Descripcción" class="style-textarea-new-form"></textarea>

                <div class="form-row">
                    <div class="col-md-6">
                        <label for="">Fecha de Entrega</label>
                        <input type="date" class="control">
                    </div>
                    <div class="col-md-6">
                        <label for="">Recurso (opcional)</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile"  data-browse="Elegir">Ningún archivo seleccionado</label>
                          </div>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="" class="btn-secundary">Cancelar</a>
                    <button>Publicar</button>
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