@extends('templateCourse')

@section('style')
<link rel="stylesheet" href="{{ asset('css/style-nav.css') }}">
<link rel="stylesheet" href="{{ asset('css/foro.css') }}">

@endsection

@section('content')
<div class="row">

    <div class="col-md-4">
        @component('components.navbar-course')
        @endcomponent

    </div>
    <div class="col-md-8 shadow p-3 mb-5 bg-white rounded">
        <h2 class="mb-4 text-center">{{ $GetForum->title }}</h2>


        <hr class="mb-3">



        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active" id="nav-home-tab" style="color: #3f36df; " data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Calificar</a>
              <a class="nav-item nav-link" id="nav-profile-tab" style="color: #3f36df; " data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Calificados</a>
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                <div class="table-responsive mt-2">
                    <table class="table text-center table-sm" style="width:100%" id="tablaMunicipio">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Estudiante</th>
                                <th>Estado</th>
                                <th>Nota</th>
                                <th>Accion</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($participantsforo as $item)
                            <tr>
                                @if ($item->state == false)

                                <td>{{ $item->id }}</td>
                                <td>{{ $item->student->first_name }} {{ $item->student->last_name }} </td>
                                <td>Sin calificacion</td>
                                <form action="{{ route('forum.qualification', $item->forum_id) }}"
                                    method="post">
                                    @csrf
                                    <input type="hidden" name="estudiante" value="{{ $item->student->id }}">
                                    <td><input type="text" name="calificacion" id=""
                                            class="mx-auto text-center form-control form-control-sm"
                                            style="width: 40%;"></td>

                                    <td><button type="submit"
                                            class="btn  btn-sm btn-block text-white" style="background-color: #3f36df; ">Calificar</button></td>
                                </form>

                                @else

                                @endif

                            </tr>

                            @empty

                            @endforelse

                        </tbody>
                    </table>

                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile"   role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="table-responsive mt-2">
                    <table class="table text-center table-sm" style="width:100%" id="tablaMunicipio">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Estudiante</th>
                                <th>Nota</th>
                                <th>R.v</th>
                                <th>Accion</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($qualificationStudent as $item)
                            <tr>

                                <td>{{ $item->id }}</td>
                                <td>{{ $item->student->first_name }} {{ $item->student->last_name }} </td>

                                <td>{{ $item->qualification }}</td>
                                <form action="{{ route('modified.qualify.forum', $item->id) }}"
                                    method="post">
                                    @csrf
                                    <td><input type="text" name="mqualify" id=""
                                            class="mx-auto text-center form-control form-control-sm"
                                            style="width: 40%;"></td>

                                    <td><button type="submit"
                                            class="btn  btn-sm btn-block text-white" style="background-color: #3f36df; ">Reevaluar</button></td>
                                </form>

                            </tr>

                            @empty

                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
          </div>



    </div>

    @endsection
