@extends('plantilla')


@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
               <h1 class="display-3">Agregar Periodos</h1>
             <div>
               @if ($errors->any())
                 <div class="alert alert-danger">
                   <ul>
                       @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                       @endforeach
                   </ul>
                 </div><br />
               @endif
                 <form method="post" action="{{ route('periodos.store') }}">
                     @csrf
                     <div class="form-group">    
                         <label for="nombre">Nombre:</label>
                         <input type="text" class="form-control" name="nombre"/>
                     </div>
           
                     <div class="form-group">
                         <label for="fecha_inicio">Fecha Inicio:</label>
                         <input type="date" class="form-control" name="fecha_inicio"/>
                     </div>
                     
                     <div class="form-group">
                        <label for="fecha_final">Fecha Final:</label>
                        <input type="date" class="form-control" name="fecha_final"/>
                    </div>
                                          
                     <button type="submit" class="btn btn-primary">Guardar</button>
                 </form>
             </div>
           </div>
           </div>
    </div>

@endsection