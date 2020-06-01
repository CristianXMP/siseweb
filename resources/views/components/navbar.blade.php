<div class="col-12 mt-3">
    <nav class="navWeb">
        <div class="container-menu">
            <div class="dropdown">
                <button class="dropdown-button" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                onclick="location.href='{{ route('Admin') }}'"
                >
                <i class="fas fa-home"></i>
                    Inicio
                </button>
            </div>
            <div class="dropdown">
                <button class="dropdown-button" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                onclick="location.href='{{ route('periodos.index') }}'"
                >
                <i class="far  fa-calendar"></i>
                    Periodos
                </button>
            </div>

            <div class="dropdown">
                <button class="dropdown-button" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                onclick="location.href='{{ route('profesores.index') }}'"
                >
                <i class="fas fa-chalkboard-teacher"></i>
                    Profesores
                </button>
            </div>

            <div class="dropdown">
                <button class="dropdown-button" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
            onclick="location.href='{{ route('estudiantes.index') }}'"
                >
                <i class="fas fa-user-graduate"></i>
                  Estudiantes
                </button>
            </div>







            <div class="dropdown">
                <button class="dropdown-button" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                onclick="location.href='{{ route('asignaciones.index') }}'"
                >
                <i class="fas fa-shapes"></i>
                  Asignacion academica
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

                    <a class="dropdown-item" href="{{ route('cursos.index') }}">
                        <i class="fas fa-chalkboard"></i>
                     Cursos
                    </a>
                    <a class="dropdown-item" href="{{ route('materias.index') }}">
                        <i class="fas fa-book-open"></i>
                     Materias
                    </a>

                    <a class="dropdown-item" href="{{ route('register') }}">
                        <i class="fas fa-users"></i>
                      Administrar usuarios
                    </a>

                  </div>
            </div>
        </div>
    </nav>
</div>
