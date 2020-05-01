<div class="col-12">
    <nav class="navWeb">
        <div class="container-menu">
            <div class="dropdown">
                <button class="dropdown-button" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                onclick="location.href='{{ route('periodos.index') }}'"
                >
                    <i class="far fa-user"></i>
                    Periodos
                </button>
            </div>

            <div class="dropdown">
                <button class="dropdown-button" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                onclick="location.href='{{ route('profesores.index') }}'"
                >
                    <i class="far fa-user"></i>
                    Profesores
                </button>
            </div>

            <div class="dropdown">
                <button class="dropdown-button" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
            onclick="location.href='{{ route('estudiantes.index') }}'"
                >
                    <i class="far fa-user"></i>
                  Estudiantes
                </button>
            </div>

            <div class="dropdown">
                <button class="dropdown-button" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="subAjustes">
                    <i class="fa fa-cogs"></i>
                  Ajustes

                  <i class="fa fa-angle-right pull-left"></i>
                </button>

                <div class="dropdown-menu" aria-labelledby="subAjustes">
                    <a class="dropdown-item" href="{{ route('paises.index') }}">
                        <i class="fa fa-flag"></i>
                        Paises
                    </a>
                    <a class="dropdown-item" href="{{ route('departamentos.index') }}">
                        <i class="fa fa-map"></i>
                        Departamentos
                    </a>
                    <a class="dropdown-item" href="{{ route('municipios.index') }}">
                        <i class="fa fa-map-marker-alt"></i>
                        Municipios
                    </a>
                    <a class="dropdown-item" href="{{ route('tiposdocumentos.index') }}">
                        <i class="fa fa-list-alt"></i>
                        Tipos de documentos
                    </a>
                  </div>
            </div>

            <div class="dropdown">
                <button class="dropdown-button" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                onclick="location.href='{{ route('materias.index') }}'"
                >
                    <i class="far fa-user"></i>
                  Materias
                </button>
            </div>

            <div class="dropdown">
                <button class="dropdown-button" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                onclick="location.href='{{ route('cursos.index') }}'">
                    <i class="far fa-user"></i>
                  Cursos
                </button>
            </div>

            <div class="dropdown">
                <button class="dropdown-button" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                onclick="location.href='{{ route('asignaciones.index') }}'"
                >
                    <i class="far fa-user"></i>
                  Asignacion academica
                </button>
            </div>

            <div class="dropdown">
                <button class="dropdown-button" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                onclick="location.href='{{ route('asignaciones.index') }}'"
                >
                    <i class="far fa-user"></i>
                  Administrar Usuarios
                </button>
            </div>
        </div>
    </nav>
</div>
