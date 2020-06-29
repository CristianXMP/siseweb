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
            <form enctype="multipart/form-data" action="{{ route('PublicHomework', in_c('car', 'id', null)) }}" method="POST">
                @csrf
                <input type="text" placeholder="Titulo" class="control" name="title">
                <textarea name="description" id="" cols="30" rows="10" placeholder="Descripcción" class="style-textarea-new-form"></textarea>

                <div class="row">
                    <div class="col-md-6">
                        <label for="">Fecha de Entrega</label>
                        <input type="date" class="control" name="deliverdate">
                    </div>
                    <div class="col-md-6">
                        <label for="">Recurso (opcional)</label>

                        <div class="custom-file text-center">
                            <input accept=".doc,.docx,.pdf,.xls" type="file" class="custom-file-input form-control-md" id="customFile" name="resource">
                            <label class="custom-file-label text-left" for="customFile"  data-browse="Elegir">Ningún archivo seleccionado</label>


                        </div>
                        <small  class="text-left">Solo archivos (word, excel o pdf)</small>
                    </div>
                </div>
                <div class="mt-4">
                <a href="{{ route('homework') }}" class="btn-secundary">Cancelar</a>
                    <button type="submit">Publicar</button>
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
