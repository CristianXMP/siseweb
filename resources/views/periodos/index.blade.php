@extends('plantilla')

@section('content')
<div class="container">

    
    <div class="row">

        <div class="col-sm-12">

            @if(session()->get('success'))
              <div class="alert alert-success">
                {{ session()->get('success') }}  
              </div>
            @endif
          </div>

        <h4>Registros</h4>
       
        <table class="table table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Perdiodo </th>
                <th scope="col">Fecha inicio</th>
                <th scope="col">Fecha Final</th>
                <th scope="col">Año</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
                @foreach($periodos as $items)
                <tr>
                <td>{{$items->id}} </td>
                    <td>{{$items->nombre}}</td>
                    <td>{{$items->fecha_inicial}}</td>
                    <td>{{$items->fecha_final}}</td>
                    <td>{{$items->ano}}</td>
                    <td>{{$items->estado}}</td>
                
                    <td>
                        <a href="{{ route('periodos.edit', $items->id)}}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('periodos.destroy', $items->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>

        <a href="{{route('periodos.create')}}" class="btn btn-primary">Registra periodos</a><br>
    </div>
</div>
@endsection