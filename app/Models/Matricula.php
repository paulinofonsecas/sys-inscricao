<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;

    public function candidato()
    {
        return $this->belongsTo(Candidato::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function turma()
    {
        return $this->belongsTo(Turma::class);
    }

    public function periodo()
    {
        return $this->belongsTo(Periodo::class);
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

}
