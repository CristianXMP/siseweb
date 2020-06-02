@extends('plantilla')

@section('content')

  <div class="container-fluit">
      <div class="row">


            <div class="col-md-4 col-sm-4 mt-3">
              <div class="wrimagecard wrimagecard-topimage">
                  <a href="#">
                  <div class="wrimagecard-topimage_header" style="background-color:  rgba(51, 105, 232, 0.1)">
                     <center><i class="fa fa-chalkboard-teacher" style="color:#3369e8"> </i></center>
                  </div>
                  <div class="wrimagecard-topimage_title">
                    <h4 class="text-center">Profesores
                    <div class="pull-right badge" id="WrGridSystem"></div></h4>
                    <h4 class="text-center">{{$countteacher }}
                        <div class="pull-right badge" id="WrInformation"></div></h4>
                  </div>

                </a>
              </div>
            </div>
            <div class="col-md-4 col-sm-4 mt-3">
              <div class="wrimagecard wrimagecard-topimage">
                  <a href="#">
                  <div class="wrimagecard-topimage_header" style="background-color:  rgba(250, 188, 9, 0.1)">
                     <center><i class="fa fa-user-graduate" style="color:#fabc09"> </i></center>
                  </div>
                  <div class="wrimagecard-topimage_title">
                    <h4 class="text-center">Estudiantes
                    <div class="pull-right badge" id="WrInformation"></div></h4>

                    <h4 class="text-center">{{ $countstudent }}
                        <div class="pull-right badge" id="WrInformation"></div></h4>
                  </div>

                </a>
              </div>
            </div>
            <div class="col-md-4 col-sm-4 mt-3">
              <div class="wrimagecard wrimagecard-topimage">
                  <a href="#">
                    <div class="wrimagecard-topimage_header" style="background-color: rgba(121, 90, 71, 0.1)">
                   <center><i class="fa fa-book-open" style="color:#795a47"> </i></center>
                  </div>
                  <div class="wrimagecard-topimage_title">
                    <h4 class="text-center">Materias
                    <div class="pull-right badge" id="WrNavigation"></div></h4>

                    <h4 class="text-center">{{ $countsubject }}
                        <div class="pull-right badge" id="WrInformation"></div></h4>
                  </div>

                </a>
              </div>
            </div>

      </div>

      <div class="row mt-auto">


        <div class="col-md-4 col-sm-4 mt-3">
          <div class="wrimagecard wrimagecard-topimage">
              <a href="#">
              <div class="wrimagecard-topimage_header" style="background-color:  rgba(51, 105, 232, 0.1)">
                 <center><i class="fa fa-shapes" style="color:#3369e8"> </i></center>
              </div>
              <div class="wrimagecard-topimage_title">
                <h4 class="text-center">Cargas academicas
                <div class="pull-right badge" id="WrGridSystem"></div></h4>
                <h4 class="text-center">{{ $countacademicassignment }}
                    <div class="pull-right badge" id="WrInformation"></div></h4>
              </div>

            </a>
          </div>
        </div>
        <div class="col-md-4 col-sm-4 mt-3">
          <div class="wrimagecard wrimagecard-topimage">
              <a href="#">
              <div class="wrimagecard-topimage_header" style="background-color:  rgba(250, 188, 9, 0.1)">
                 <center><i class="fa fa-chalkboard" style="color:#fabc09"> </i></center>
              </div>
              <div class="wrimagecard-topimage_title">
                <h4 class="text-center">Cursos
                <div class="pull-right badge" id="WrInformation"></div></h4>

                <h4 class="text-center">{{ $countcourses }}
                    <div class="pull-right badge" id="WrInformation"></div></h4>
              </div>

            </a>
          </div>
        </div>
        <div class="col-md-4 col-sm-4 mt-3">
          <div class="wrimagecard wrimagecard-topimage">
              <a href="#">
                <div class="wrimagecard-topimage_header" style="background-color: rgba(121, 90, 71, 0.1)">
               <center><i class="fa fa-users" style="color:#795a47"> </i></center>
              </div>
              <div class="wrimagecard-topimage_title">
                <h4 class="text-center">Usuarios
                <div class="pull-right badge" id="WrNavigation"></div></h4>

                <h4 class="text-center">{{ $countuser }}
                    <div class="pull-right badge" id="WrInformation"></div></h4>
              </div>

            </a>
          </div>
        </div>

  </div>
  </div>
@endsection
