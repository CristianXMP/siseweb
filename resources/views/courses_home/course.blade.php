@extends('templateCourse')

@section('style')
<link rel="stylesheet" href="{{ asset('css/style-nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/course.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="title-course shadow-sm">
                <h6>Matematicas 7-A</h6>
                <p>Profesor: Pedrito Perez</p>
            </div>

            <div class="menu-coures mt-5 shadow">
                <ul>
                    <li><a href="">Anuncios</a></li>
                    <li><a href="">Tareas</a></li>
                    <li><a href="">Foros</a></li>
                    <li><a href="">Examenes</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-8">
            <h2 class="mb-2">Anuncios</h2>

            <div class="new-anun shadow-sm">
                <form action="" class="">
                    <textarea name="" id="" cols="30" rows="10" class="form-control" placeholder="Compartir con tu clase"></textarea>
                        <button class="btn btn-secondary mt-2">
                            Publicar
                        </button>
                </form>
            </div>

            <div class="lista-anuncios">
                <div class="card-anun shadow-sm">
                    <div class="card-hea-anu">
                        <img 
                            src="{{ asset('img/profile-example.jpg') }}" 
                            alt="" 
                            class="mr-3">
                        <p class="name-anun mr-3">Pedrito perez</p>
                        <p class="date-anun">04/03/2002 a las 03:30pm</p>
                    </div>
                    <div class="body-anu">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque quaerat veritatis dolorum libero excepturi! Modi porro praesentium maxime quas hic unde consectetur totam quisquam minus. Inventore recusandae amet ipsa perspiciatis.</p>
                    </div>
                    <div class="footer-anu">
                        <a href="" class="">
                            10 Me gustas
                        </a>
                    </div>
                </div>

                <div class="card-anun shadow-sm">
                    <div class="card-hea-anu">
                        <img 
                            src="{{ asset('img/profile-example.jpg') }}" 
                            alt="" 
                            class="mr-3">
                        <p class="name-anun mr-3">Pedrito perez</p>
                        <p class="date-anun">04/03/2002 a las 03:30pm</p>
                    </div>
                    <div class="body-anu">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque quaerat veritatis dolorum libero excepturi! Modi porro praesentium maxime quas hic unde consectetur totam quisquam minus. Inventore recusandae amet ipsa perspiciatis.</p>
                    </div>
                    <div class="footer-anu">
                        <a href="" class="">
                            10 Me gustas
                        </a>
                    </div>
                </div>
                <div class="card-anun shadow-sm">
                    <div class="card-hea-anu">
                        <img 
                            src="{{ asset('img/profile-example.jpg') }}" 
                            alt="" 
                            class="mr-3">
                        <p class="name-anun mr-3">Pedrito perez</p>
                        <p class="date-anun">04/03/2002 a las 03:30pm</p>
                    </div>
                    <div class="body-anu">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque quaerat veritatis dolorum libero excepturi! Modi porro praesentium maxime quas hic unde consectetur totam quisquam minus. Inventore recusandae amet ipsa perspiciatis.</p>
                    </div>
                    <div class="footer-anu">
                        <a href="" class="">
                            10 Me gustas
                        </a>
                    </div>
                </div>
                <div class="card-anun shadow-sm">
                    <div class="card-hea-anu">
                        <img 
                            src="{{ asset('img/profile-example.jpg') }}" 
                            alt="" 
                            class="mr-3">
                        <p class="name-anun mr-3">Pedrito perez</p>
                        <p class="date-anun">04/03/2002 a las 03:30pm</p>
                    </div>
                    <div class="body-anu">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque quaerat veritatis dolorum libero excepturi! Modi porro praesentium maxime quas hic unde consectetur totam quisquam minus. Inventore recusandae amet ipsa perspiciatis.</p>
                    </div>
                    <div class="footer-anu">
                        <a href="" class="">
                            10 Me gustas
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection