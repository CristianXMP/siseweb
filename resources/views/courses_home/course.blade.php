@extends('templateCourse')

@section('style')
<link rel="stylesheet" href="{{ asset('css/style-nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/course.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4">
            
            @component('components.navbar-course')
            @endcomponent

        </div>
        <div class="col-md-8">
            <h2 class="mb-2">Anuncios</h2>
            @if (Auth::user()->type_user == 'Teacher')
            <div class="new-anun shadow-sm">
                <form action="{{ Route('publicar') }}" class="" method="POST">
                    @csrf


                    <input type="hidden" name="course_id" value="{{ in_c('cur', 'id') }}">
                    <input type="hidden" name="teacher_id" value="{{ in_c('tea', 'id') }}">
                    <input type="hidden" name="subject_id" value="{{ in_c('sub', 'id') }}">

                    <textarea name="anuncio" id="" cols="30" rows="10" class="form-control" placeholder="Compartir con tu clase"></textarea>
                    <button type="submit" class="btn btn-secondary mt-2">
                        Publicar
                    </button>




                </form>
            </div>
            @endif
            <div class="lista-anuncios">

                @foreach ($anuncios as $item)
                <div class="card-anun shadow-sm">
                    <div class="card-hea-anu">
                        <img
                            src="{{ asset('img/profile-example.jpg') }}"
                            alt=""
                            class="mr-3">


                            <p class="name-anun mr-3">{{ $item->teacher->first_name }} {{ $item->teacher->last_name }} (Profesor)</p>

                            <p class="date-anun">Publicado {{ $item->created_at}}</p>

                    </div>
                    <div class="body-anu">
                        <p >{{ $item->announced }}</p>
                    </div>
                    <div class="footer-anu">

                        @if (Auth::user()->type_user == 'Student')

                        <form action="{{ Route('likes', $item->id) }}" method="get">

                            <button type="submit"  class="btn btn-transparent text-primary"> <i class="far fa-thumbs-up"></i> {{ $item->likes}} Me gusta</button>

                        </form>

                        @endif


                    </div>
                </div>
                @endforeach



            </div>

        </div>
    </div>
@endsection

