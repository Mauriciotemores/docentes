@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Secciones</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Docente</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($secciones as $seccion)
            <tr>
                <td>{{ $seccion->id }}</td>
                <td>{{ $seccion->nombre }}</td>
                <td>{{ $seccion->docente->name ?? 'Sin docente' }}</td>
                <td>
                    <a href="{{ route('secciones.show', $seccion) }}" class="btn btn-info">Ver</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
