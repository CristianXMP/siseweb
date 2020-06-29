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
                <form action="{{ Route('publicar', in_c('car','id', null)) }}" class="" method="POST">
                    @csrf

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


                            <p class="name-anun mr-3">{{ in_c('car','teacher', 'first_name')}} {{ in_c('car','teacher', 'last_name')}}</p>

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

                        @if (Auth::user()->type_user == 'Teacher')



                            <small class="text-primary"><i class="far fa-thumbs-up"></i> {{ $item->likes}} Me gusta</small>



                        @endif


                    </div>
                </div>

                @endforeach
                @if (count($anuncios) != null)
                <div class="mt-5">
                    <small>Paginación de anuncios</small>
                    {{ $anuncios->links() }}
                </div>


                @endif




            </div>

        </div>

    </div>
@endsection

