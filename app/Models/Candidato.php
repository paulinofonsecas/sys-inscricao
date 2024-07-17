<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;

    public function cancelarInscricao()
    {
        $this->estado_candidatura_id = EstadoCandidatura::$DESISTIDO;
        $this->save();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function genero()
    {
        return $this->belongsTo(Genero::class);
    }

    //estadoDaCandidata
    public function estadoDaCandidatura()
    {
        return $this->belongsTo(EstadoCandidatura::class, 'estado_candidatura_id');
    }

    //curso
    public function opcaoCurso1()
    {
        return $this->belongsTo(Curso::class, 'curso_opcao_1');
    }

    public function opcaoCurso2()
    {
        return $this->belongsTo(Curso::class, 'curso_opcao_2');
    }

    // periodo
    public function periodo()
    {
        return $this->belongsTo(Periodo::class);
    }
}
