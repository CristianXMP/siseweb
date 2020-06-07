@extends('templateCourse')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/style-nav.css') }}">
<link rel="stylesheet" href="{{ asset('css/foro.css') }}">

<style>
    .coments {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

</style>
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
            <h2 class="mb-4">Foros</h2>

            @if (Auth::user()->type_user == "Teacher")

            <div class="card-new-foro shadow-sm">
                <h3>Crear Foro</h3>
                <form action="{{ Route('public.forums', $subject->id) }}" method="POST">
                    @csrf
                    <input type="text" name="title" placeholder="Titulo del foro">
                    <textarea name="content" id="" cols="30" rows="10" placeholder="¿Que quisieras publicar?" ></textarea>
                    <button type="submit" class="btn btn-primary">Publicar</button>
                </form>

            </div>

            @endif

            @foreach ($forums as $item)

            <div class="card-foro shadow-sm">

                <div class="card-head-foro">
                    <h3>{{ $item->title }}</h3>
                    <p>publicado el {{ $item->created_at }}</p>
                </div>
                <div class="card-body-foro">
                    <p>{{ $item->content }} {{ $item->id }}</p>
                </div>
                <hr class="my-0 mt-5">
                <div class="card-footer-foro">
                    @if (Auth::user()->type_user == "Student")
                    <a class="btn btn-transparent" href="{{ route('forum.likestudent', $item->id) }}"><i class="far fa-thumbs-up"></i> {{ $item->likecount }} Me gusta</a>
                    <a class="btn btn-transparent text-primary"  href="{{ route('forum.comentstudent', $item->id) }}" class=""> <i class="far fa-comments"></i> {{ $item->comentcount }} Comentarios</a>
                    @endif
                    @if (Auth::user()->type_user == "Teacher")
                    <a class="btn btn-transparent text-primary" href="{{ route('forum.like', $item->id) }}"><i class="fas fa-thumbs-up"></i>  {{ $item->likecount }} Me gusta</a>
                    <a class="btn btn-transparent text-primary"  href="{{ route('forum.coment', $item->id) }}" > <i class="fas fa-comment-alt"></i> {{ $item->comentcount }} Comentarios</a>
                    <a class="btn btn-transparent text-primary"  href="{{ route('forum.participant', $item->id) }}" > <i class="fas fa-users"></i> 43 Participantes</a>
                    @endif


                </div>



            </div>
            @endforeach


        </div>



    </div>

@endsection




