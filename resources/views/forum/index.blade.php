@extends('templateCourse')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/style-nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/foro.css') }}">
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
            <h2 class="mb-4">Foros</h2>

            <div class="card-new-foro shadow-sm">
                <h3>Crear Foro</h3>
                <form action="">
                    <input type="text" placeholder="Titulo del foro">
                    <textarea name="" id="" cols="30" rows="10" placeholder="¿Que quisieras publicar?" ></textarea>
                    <button type="submit" class="btn btn-primary">Publicar</button>
                </form>

            </div>

            <div class="card-foro shadow-sm">
            
                <div class="card-head-foro">
                    <h3>Title Foro</h3>
                    <p>publicado el 20/20/2002</p>
                </div>
                <div class="card-body-foro">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam consequuntur, officiis nam error accusamus nulla veniam voluptatibus excepturi porro doloribus..</p>
                </div>
                <div class="card-footer-foro">
                    <a href="">3 Me gusta</a>
                    <a href="">3 Comentarios</a>
                </div>
                <a href="#" class="foro-anchor"></a>
            </div>

            <div class="card-foro shadow-sm">
            
                <div class="card-head-foro">
                    <h3>Title Foro</h3>
                    <p>publicado el 20/20/2002</p>
                </div>
                <div class="card-body-foro">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam consequuntur, officiis nam error accusamus nulla veniam voluptatibus excepturi porro doloribus..</p>
                </div>
                <div class="card-footer-foro">
                    <a href="">3 Me gusta</a>
                    <a href="">3 Comentarios</a>
                </div>
                <a href="#" class="foro-anchor"></a>
            </div>
            
        </div>

    </div>

    
@endsection
