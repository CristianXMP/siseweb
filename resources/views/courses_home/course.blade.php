@extends('templateCourse')

@section('style')
<link rel="stylesheet" href="{{ asset('css/style-nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/course.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="title-course shadow-sm">
                <h6 >{{ $subject->nombre }}: {{ $course->course }} - {{ $course->variation }}</h6>
                <p >Profesor: {{ $teacher_info->first_name }} {{ $teacher_info->last_name }} </p>

            </div>

            <div class="menu-coures mt-5 shadow">
                <ul>
                    @if (Auth::user()->type_user == "Teacher")
                    <li><a href="{{ route('cursoProfesor', $subject->id) }}">Anuncios</a></li>
                    @endif
                    @if (Auth::user()->type_user == "Student")
                    <li><a href="{{ route('cursoEstudiante', $subject->id) }}">Anuncios</a></li>
                    @endif


                    <li><a href="">Tareas</a></li>

                @if (Auth::user()->type_user == "Student")
                <li><a href="{{ route('foro.student', $subject->id) }}">Foros</a></li>
                @endif

                @if (Auth::user()->type_user == "Teacher")
                <li><a href="{{ route('foro.teacher', $subject->id) }}">Foros</a></li>
                @endif

                    <li><a href="">Examenes</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-8">
            <h2 class="mb-2">Anuncios</h2>
            @if (Auth::user()->type_user == 'Teacher')
            <div class="new-anun shadow-sm">
                <form action="{{ Route('publicar') }}" class="" method="POST">
                    @csrf


                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                    <input type="hidden" name="teacher_id" value="{{ $teacher_info->id }}">
                    <input type="hidden" name="subject_id" value="{{ $subject->id }}">

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

                            <button type="submit"  class="btn btn-transparent text-primary"> <i class="far fa-thumbs-up"></i>Me gusta</button>

                        </form>

                        @endif


                        <h6 class="text-primary">{{ $item->likes}} Me gustas</h6>

                    </div>
                </div>
                @endforeach



            </div>

        </div>
    </div>
@endsection

