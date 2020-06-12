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
        <hr class="my-0">

        <hr class="my-auto">
        <div class="accordion mt-4" id="accordionExample">

            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-sm btn-block text-center text-white collapsed " type="button"
                            data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                            aria-controls="collapseTwo">
                            CALIFICAR
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="table-responsive">
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
                                                    class="btn btn-primary btn-sm btn-block">Calificar</button></td>
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
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-sm text-center text-white btn-block  collapsed" type="button"
                            data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                            aria-controls="collapseThree">
                            CALIFICADOS
                        </button>
                    </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-center table-sm" style="width:100%" id="tablaMunicipio">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Estudiante</th>
                                        <th>Nota</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($qualificationStudent as $item)
                                    <tr>

                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->student->first_name }} {{ $item->student->last_name }} </td>

                                        <td>{{ $item->qualification }}</td>

                                    </tr>

                                    @empty

                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- --}}

        </div>

    </div>

    @endsection
