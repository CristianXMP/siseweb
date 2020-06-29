@extends('templateCourse')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/style-nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/homework.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estudiantes.css') }}">
@endsection

@section('content')

<div class="row">
    <div class="col-md-4">
        @component('components.navbar-course')
        @endcomponent
    </div>

    <div class="col-md-8">
        <div class="content-qualify">
            <div class="header">
                <h4 class="text-left text-uppercase">tarea: {{$homework->title}} </h4>
                <p>Publicada: {{$homework->created_at}} </p>
            </div>

            <nav class="bg-white text-uppercase" >
                <div class="nav nav-tabs" id="nav-tab" role="tablist" >
                  <a class="nav-item nav-link " style="color: #075a72; " id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Calificar</a>
                  <a class="nav-item nav-link" style="color: #075a72; " id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Calificados</a>

                </div>
              </nav>
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

            <div class="table-responsive mt-3">
                <table class="table text-center table-sm" style="width:100%" >
                    <thead>
                        <tr>
                            <th >Estudiante</th>
                            <th>Tarea</th>
                            <th >Nota</th>
                            <th >Observación</th>
                            <th >Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($participants as $item)
                        <tr>
                        <td class="">{{$item->student->first_name}} {{$item->student->last_name}} </td>
                            <td class="">
                            <a href="{{route('download.student', $item->id)}}" class="btn btn-sm btn-block text-white" style="font-size: 1em; background-color: #3f36df"><i class="fas fa-sm fa-file-download"></i></a>
                            </td>
                        <form action="{{route('send.qualify', $item->id)}}" method="POST">
                                @csrf
                                <td class="">
                                    <input type="text" name="qualify" class="form-control form-control-sm text-center">
                                </td>
                                <td class="">
                                    <input type="text" name="description" class="form-control form-control-sm text-center">
                                </td>
                               <td class="">
                               <button type="submit" class="btn btn-sm btn-block text-white"style="font-size: 1em; background-color: #075a72">calificar</button>
                               </td>
                            </form>

                        </tr>
                        @endforeach





                    </tbody>
                </table>
            </div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                    <div class="table-responsive mt-3">
                        <table class="table text-center table-sm" style="width:100%" >
                            <thead>
                                <tr>
                                    <th >Estudiante</th>
                                    <th >Nota</th>
                                    <th>R.v</th>
                                    <th >Acciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($calificados as $item)
                                <tr>
                                <td>{{$item->student->first_name}} {{$item->student->last_name}}</td>
                                <td class="">{{$item->qualification}}</td>

                                <form action="{{route('modified.qualify', $item->id)}}" method="POST">
                                        @csrf
                                        <td class="">
                                            <input type="text" name="mqualify" class="form-control form-control-sm text-center">
                                        </td>
                                        <td >
                                       <button type="submit" class="btn btn-sm btn-block text-white"style="font-size: 1em; background-color: #075a72">Reevaluar</button>
                                       </td>
                                    </form>

                                </tr>
                                @endforeach





                            </tbody>
                        </table>
                    </div>

                </div>



           {{-- <form action="" >
                <div class="form-row">
                    <div class="col-md-3">
                        <input type="text" placeholder="Nota" class="form-control-h">
                    </div>
                    <div class="col-md-9">
                        <input type="text" placeholder="Observación" class="form-control-h">
                    </div>
                </div>
                <button class="btn-h">Calificar</button>
            </form>--}}
        </div>
    </div>
</div>

@endsection

