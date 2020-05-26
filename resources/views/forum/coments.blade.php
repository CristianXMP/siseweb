@extends('templateCourse')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/style-nav.css') }}">
<link rel="stylesheet" href="{{ asset('css/foro.css') }}">

<style>
    .coments {
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

#coment {
	height: 250px;
	width: auto;
	overflow-y: scroll;
    scrollbar-color: #6a6adb white;
    scrollbar-width: 5px;
}
#coments {
	height: auto;
}
.texto {
	padding:4px;
	background:#fff;
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
        <div class="col-md-8 shadow p-3 mb-5 bg-white rounded" >
            <h2 class="mb-4">{{ $GetForum->title }}</h2>
            <hr class="my-0">
            <p class="text-center " id="content">{{ $GetForum->content }}</p>

            <hr class="my-2">

            <div id="coment">

                @foreach ($coments as $item)

                @if ($item->type_user == 'Teacher')
                <small><h6 class="text-sm-right text-primary">{{ $item->created_at }}</h6> </small>

                <div class="bg-success text-white shadow p-1 mb-2  rounded " style="width: 20rem;">

                @endif
                @if ($item->type_user == 'Student')
                <small><h6 class="text-sm-right text-primary">{{ $item->created_at }}</h6> </small>

                <div class="bg-primary text-white shadow p-1 mb-2  rounded " style="width: 20rem;">

                @endif

                    <h6 class="text-white"> {{ $item->name_user }}</h6>
                    <p class="text-center">{{ $item->coment }}</p>

                     </div>

                @endforeach



              </div>
              <div class="mt-2">
                  @if (Auth::user()->type_user == "Student")
                  <form action="{{ route('public.comentstudent',$GetForum->id) }}" method="POST">
                    @csrf
                <textarea class="form-control rounded " name="coment" id="exampleFormControlTextarea1"
                rows="1" placeholder="Escribe tu comentario..."></textarea>
                 <button class="btn btn-primary btn-block mt-3">Comentar</button>
                  @endif

                  @if (Auth::user()->type_user == "Teacher")
                  <form action="{{ route('public.coment',$GetForum->id) }}" method="POST">
                    @csrf
                <textarea class="form-control rounded " name="coment" id="exampleFormControlTextarea1"
                rows="1" placeholder="Escribe tu comentario..."></textarea>
                 <button class="btn btn-primary btn-block mt-3">Comentar</button>
                 @endif
            </form>
              </div>


        </div>





    </div>


    <!-- Large modal coments -->

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Comentarios</h4>
        </div>
        <div class="modal-body">
            <div class="container">

                <div class="coments">
                    <h4>nombre de usuario</h4>
                    <p>Hello. How are you today?</p>
                    <span class="time-right">11:00</span>
                  </div>

            </div>
        </div>


           <div class="modal-footer">
            <div class="container">

                <div class="row">

                    <div class="col-md-10">
                        <textarea class="form-control rounded" id="exampleFormControlTextarea1"
                         rows="1" placeholder="Escribe tu comentario..."></textarea>
                    </div>
                    <div class="col-md-2 mt-1">
                       <button class="btn btn-primary btn-block">Comentar</button>
                    </div>

                </div>

               </div>
           </div>



      </div>
    </div>
  </div>
@endsection




