<div class="col-md-4">
    <div class="title-course shadow-sm">
        <h6 >{{ $subject->nombre }}: {{ $course->course }} - {{ $course->variation }}</h6>
        <p >Profesor: {{ $teacher_info->first_name }} {{ $teacher_info->last_name }} </p>

    </div>

    <div class="menu-coures mt-5 shadow">
        <ul>
            <li><a href="{{ route('cursoProfesor', $subject->id) }}">Anuncios</a></li>
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
