<?php

namespace App\Http\Controllers;

use App\Models\Seccion;
use App\Models\Alumno;
use Illuminate\Http\Request;

class SeccionController extends Controller
 {
    public function index()
    {
        $secciones = Seccion::with('docente')->get();
        return view('secciones.index', compact('secciones'));
    }

    public function show(Seccion $seccion)
    {
        $seccion->load('alumnos', 'docente');
        $alumnos = Alumno::whereDoesntHave('docentes', function($query) use ($seccion) {
            $query->where('docente_alumno_seccion.id_seccion', $seccion->id);
        })->get();
        
        return view('secciones.show', compact('seccion', 'alumnos'));
    }

    public function asignarAlumnos(Request $request, Seccion $seccion)
    {
        $request->validate([
            'alumnos' => 'required|array',
            'alumnos.*' => 'exists:alumnos,id',
        ]);

        // Asignar alumnos a la sección (y al docente asociado)
        $seccion->alumnos()->attach($request->alumnos, [
            'id_docente' => $seccion->id_docente
        ]);

        return redirect()->route('secciones.show', $seccion)
            ->with('success', 'Alumnos asignados correctamente');
    }
 }