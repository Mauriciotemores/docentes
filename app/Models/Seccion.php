<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    public function docente()
    {
        return $this->belongsTo(Docente::class, 'id_docente');
    }
    
    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class, 'docente_alumno_seccion', 'id_seccion', 'id_alumno')
                   ->withPivot('id_docente');
    }
}
