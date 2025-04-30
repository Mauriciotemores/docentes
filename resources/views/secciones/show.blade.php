@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Sección: {{ $seccion->nombre }}</h1>
    <h3>Docente: {{ $seccion->docente->name ?? 'Sin docente asignado' }}</h3>

    <div class="row mt-4">
        <div class="col-md-6">
            <h4>Alumnos inscritos</h4>
            @if($seccion->alumnos->count() > 0)
                <ul class="list-group">
                    @foreach($seccion->alumnos as $alumno)
                    <li class="list-group-item">{{ $alumno->name }}</li>
                    @endforeach
                </ul>
            @else
                <div class="alert alert-info">No hay alumnos inscritos en esta sección</div>
            @endif
        </div>

        <div class="col-md-6">
            <h4>Inscribir alumnos</h4>
            <form action="{{ route('secciones.asignar-alumnos', $seccion) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="alumnos">Seleccionar alumnos:</label>
                    <select name="alumnos[]" id="alumnos" class="form-control" multiple>
                        @foreach($alumnos as $alumno)
                            <option value="{{ $alumno->id }}">{{ $alumno->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Inscribir alumnos</button>
            </form>
        </div>
    </div>
</div>
@endsection