<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    public function docentes()
    {
    return $this->belongsToMany(Docente::class, 'docente_alumno_seccion', 'id_alumno', 'id_docente')
               ->withPivot('id_seccion');
    }
}
