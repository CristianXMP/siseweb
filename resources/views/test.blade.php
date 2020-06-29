
<h5>{{$student->first_name}}</h5>

<div class="table-responsive mt-3">
    <table class="table text-center table-sm" style="width:100%" id="tablaMunicipio">
        <thead>
            <tr>
                <th >ID</th>
                <th >Foros</th>
                <th >Fecha calificacion</th>
                <th>Nota</th>
            </tr>
        </thead>
        <tbody>

               @foreach ($notas as $item)
               <tr>
           <td>{{$item->id}}</td>
           @if ($item->forum == null)
               <td>{{$item->job->title}}</td>
               
           @else
           <td>{{$item->forum->title}}</td>

           @endif
               <td>{{$item->qualification}}</td>

               @endforeach
           </tr>

        </tbody>
    </table>
</div>
