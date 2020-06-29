@extends('templateCourse')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/style-nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/homework.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estudiantes.css') }}">
@endsection
@section('scripts')
    <script src="{{ asset('js/homework.js') }}"></script>
@endsection

@section('content')

<div class="row">

    <div class="col-md-4">
        @component('components.navbar-course')
        @endcomponent
    </div>

    <div class="col-md-8">

        <div class="clearfix">
            <div class="float-left">
                <h2 class="">Tareas</h2>
            </div>
            <div class="float-right">
                @if (Auth::user()->type_user == 'Teacher')

                    <div class=" col-sm-12 text-center ">
                        <a href="{{route('new.homework')}}" class="btn-main btn text-white btn-block rounded-lg "
                        style=" font-size: 1em; font-weight: 600" >

                            Crear Tarea
                            <i class="fas  fa-plus ml-1"></i>
                        </a>
                    </div>

            @endif
            </div>
        </div>
        <hr>


        <div class="table-responsive">
            <table class="table text-center table-sm" style="width:100%" id="homework-list">
                <thead>
                    <tr>
                        <th >Titulo</th>
                        <th >Fecha de entrega</th>
                        <th >Guía</th>
                        <th>Estado</th>
                        <th>Acción</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($car as $item)

                    <tr>
                    <td class="">{{ $item->title}}</td>
                    @if (strtotime(now()->format('y-m-d')) == strtotime($item->deliver_date))
                    <td class="text-center">{{$item->deliver_date}}</td>
                    @else
                    @if (strtotime(now()->format('y-m-d')) > strtotime($item->deliver_date))
                        <td>{{$item->deliver_date}}</td>
                    @else
                    <td >{{$item->deliver_date }}</td>
                    @endif

                    @endif

                    <td class="">
                        @if ($item->resource == "")

                        @else
                        @if (Auth::user()->type_user == "Student")
                        <small><a href="{{route('download.homework', $item->id)}}" class="btn btn-sm text-white btn-block" style="background: #075a72; font-size: 1em; font-weight: 600">
                            <i class="fas  fa-arrow-alt-circle-down"></i> </a></small>
                        @elseif(Auth::user()->type_user == "Teacher")
                        <small><a href="{{route('download.file', $item->id)}}" class="btn btn-sm text-white btn-block" style="background: #075a72; font-size: 1em; font-weight: 600">
                            <i class="fas  fa-arrow-alt-circle-down"></i> </a></small>
                        @endif

                        @endif
                        </td>
                    <td>{{ $item->state}}</td>
                    <td class=""><small>
                        @if (Auth::user()->type_user == "Teacher")
                        <a href="{{ route('detail.homework', $item->id) }}" class="btn btn-sm text-white btn-block" style="background: #075a72; font-size: 1em; font-weight: 600">
                            Detalles</a>
                        @endif
                        @if (Auth::user()->type_user == "Student")




                            <a href="{{ route('homework-student', $item->id) }}" class="btn btn-sm text-white btn-block" style="background: #075a72; font-size: 1em; font-weight: 600">
                                Detalles</a>



                        @endif


                    </small></td>
                    </tr>

                    @endforeach



                </tbody>
            </table>
        </div>


    </div>
</div>

@endsection

