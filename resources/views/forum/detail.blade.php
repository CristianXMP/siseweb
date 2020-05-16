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
            <div class="content-foro shadow-sm">
                <div class="main-content-foro">
                    <h2>Foro para discutir sobre desarrollo</h2>
                    <p class="text-date">Publicado el 02/02/2002</p>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci sunt reprehenderit asperiores dicta doloremque porro aut culpa iure! Laboriosam fugiat ad eius, dolor tempora eaque rerum obcaecati aut voluptatibus non.</p>

                    <div class="option-foro">
                        <a href="">3 Me gusta</a>
                        <a href="">5 Comentarios</a>
                    </div>
                </div>

                <section class="answer-form shadow-sm">
                    <form action="">
                        <textarea name="anuncio" id="" cols="30" rows="10" class="form-control" placeholder="Escribe una respuesta"></textarea>
                        <button type="submit" class="btn btn-secondary mt-2">
                            Publicar
                        </button>
                    </form>
                </section>

                <article class="answer">
                    <img src="{{ asset('img/profile-example.jpg') }}"
                        alt=""
                        class="mr-3">

                    <div class="comentario">
                        
                        <div class="comentario-head">
                            <h3>Pedrito Perez</h3>
                            <p>02/02/2002 a las 2:30pm</p>
                        </div>
                        <p class="text-comment">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, aut distinctio animi dolores illum magnam quasi aliquid nulla at tenetur officia totam repellendus hic sed dolor. Ipsam consectetur recusandae esse?</p>
                        <a href="">3 Me gusta</a>
                    </div>
    
                </article>
                <article class="answer">
                    <img src="{{ asset('img/profile-example.jpg') }}"
                        alt=""
                        class="mr-3">

                    <div class="comentario">
                        
                        <div class="comentario-head">
                            <h3>Pedrito Perez</h3>
                            <p>02/02/2002 a las 2:30pm</p>
                        </div>
                        <p class="text-comment">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, aut distinctio animi dolores illum magnam quasi aliquid nulla at tenetur officia totam repellendus hic sed dolor. Ipsam consectetur recusandae esse?</p>
                        <a href="">3 Me gusta</a>
                    </div>
    
                </article>
            </div>

        </div>    
    </div>
@endsection