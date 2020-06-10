@extends('plantilla')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/estudiantes.css') }}">
@endsection


@section('content')
<div class="header-container">

    <div class="title">
        <h1>
            <i class="far fa-file-alt"></i>
          lista de carga academica
        </h1>
    </div>

</div>
<hr class="my-auto">



<div class="row justify-content-center h-100 mt-3">
    <div class="col-sm-8 align-self-center text-center">
        <div class="card ">
            <div class="card-body">
                <h4 class="text-center text-capitalize">{{ $teacher->first_name }} {{ $teacher->last_name }}</h4>

                <div class="table-responsive mt-4">
                    <table class="table table-sm text-center" >
                        <thead>
                               <tr>
                                   <th>Id</th>
                                   <th>Cursos</th>
                                   <th>Materias</th>
                                   <th>Acciones</th>
                               </tr>
                           </thead>
                           <tbody>
                               @forelse ($academicCourses  as $item)
                               <tr>
                                   <td>{{ $item->id }}</td>
                                   <td>{{ $item->course->course }} °{{ $item->course->variation }}</td>
                                   <td>{{ $item->subject->nombre }}</td>
                                   <td><a href="{{route('asignaciones.edit', $item->id)}}" class="btn btn-transparent color-option"  style="padding: 2px;" id="editTipoDo" ><i class="fa fa-pencil-alt"></i></a>
                                   </td>
                               </tr>
                                   @empty

                                   @endforelse



                               </tbody>
                           </table>
                </div>
                <div class="card-footer">
                    <a href="{{ route('asignaciones.index') }}" class="btn btn-primary btn-block">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection









