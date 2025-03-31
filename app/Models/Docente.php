<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    public function secciones()
    {
        return $this->hasMany(Seccion::class, 'id_docente');
    }
    
    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class, 'docente_alumno_seccion', 'id_docente', 'id_alumno')
                   ->withPivot('id_seccion');
    }
}

