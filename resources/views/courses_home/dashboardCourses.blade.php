@extends('templateCourse')

@section('style')
<link rel="stylesheet" href="{{ asset('css/sec-card.css') }}">
<link rel="stylesheet" href="{{ asset('css/homecardstyle.css') }}">
@endsection

@section('content')
<div class="row">
    @if (Auth::user()->type_user == "Teacher")


    @forelse ($cargaacademica as $item)


    <div class="col-md-4 col-lg-4  col-sm-12 ">
        <div class="card shadow panel.card-linked" style="width: 20rem;">
            <a href="{{ route('cursoProfesor', $item->id) }}" class="card-link">
            <div class="card-body">
                <div class="title-card-header">
                    <h5 class="card-title">{{ $item->subject->nombre }}</h5>
                    <h6 class="font-weight-bold">{{ $item->course->course }} - °{{ $item->course->variation }}</h6>
                </div>
                <h6 class="mt-3">Profesor: {{ $item->teacher->first_name }} {{ $item->teacher->last_name }}</h6>
            </div>
        </a>
        </div>
      </div>
  {{-- <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card shadow" style="width: 20rem;">
            <a href="{{ route('cursoProfesor', $item->subject_id) }}">
                <img src="{{ asset('img/example2.png') }}" class="card-img-top" alt="...">
            </a>

    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card shadow panel.card-linked" style="width: 20rem;">
            <a href="{{ route('cursoProfesor', $item->subject_id) }}" draggable="false" class="card-link">
                <div class="card-body">
                    <div class="title-card-header">
                        <h5 class="card-title">{{ $item->subject->nombre }}</h5>
                        <h6 class="font-weight-bold">{{ $item->course->course }} - °{{ $item->course->variation }}</h6>
                    </div>
                    <h6 class="mt-1">Profesor: {{ $item->teacher->first_name }} {{ $item->teacher->last_name }}</h6>


                    <h6 class="mt-1">Periodo: {{ $item->period->nombre }}</h6>
                </div>
            </a>
        </div>
    </div>--}}
    @empty
    <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center">
        <i class="fas fa-10x fa-exclamation-triangle text-center ">
            <h3 class="text-center text-primary ">No tienes asignacion academica.</h3>
        </i>

    </div>

    @endforelse

    @else

    @if (Auth::user()->type_user == "Student")

    @forelse ($materias as $item)
    <div class="col-lg-4 col-md-6 col-sm-12">

            <div class="card shadow panel.card-linked" style="width: 20rem;">
                <a href="{{ route('cursoEstudiante', $item->id) }}" class="card-link">
                <div class="card-body">
                    <div class="title-card-header">
                        <h5 class="card-title">{{ $item->subject->nombre }}</h5>
                        <h6 class="font-weight-bold">{{ $item->course->course }} - °{{ $item->course->variation }}</h6>
                    </div>
                    <h6 class="mt-3">Profesor: {{ $item->teacher->first_name }} {{ $item->teacher->last_name }}</h6>
                </div>
            </a>
            </div>

    </div>
    @empty
    <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center">
        <i class="fas fa-10x fa-exclamation-triangle text-center ">
            <h3 class="text-center text-primary ">No tienes materias asignadas.</h3>
        </i>
    </div>
    @endforelse

    @endif

    @endif

</div>
@endsection
