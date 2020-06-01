@extends('plantilla')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/estudiantes.css') }}">
@endsection

@section('content')
    <div class="header-container">
        <div class="title">
            <h1>
                <i class="far fa-file-alt"></i>
                Lista de Tipos de documentos
            </h1>
        </div>
        <div>
            <a class=" btn btn-main" href="{{ route('tiposdocumentos.create') }}">
                <i class="fa fa-plus mr-1"></i>
                Nuevo
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-stripe table-sm" id="tablaTipoDocuemnto">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Abreviatura</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ( $type_documents as $item)

                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->abreviatura }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ Route('tiposdocumentos.edit', $item->id) }}" style="color: #00723d" id="editTipoDoc">
                                <i class="fa fa-pencil-alt mr-2"></i>
                            </a>

                        </div>
                    </td>
                </tr>

                @empty

                @endforelse


            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/typeDocument.js') }}"></script>
@endsection
