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

    public function genero() {
        return $this->belongsTo(Genero::class);
    }

    // classe pretendida
    public function classeFeita() {
        return $this->belongsTo(Classe::class, 'classe_feita_id', 'id');
    }

    // classe
    public function classe() {
        return $this->belongsTo(Classe::class, 'classe_id');
    }

    //estadoDaCandidata
    public function estadoDaCandidatura() {
        return $this->belongsTo(EstadoCandidatura::class, 'estado_candidatura_id');
    }

    //curso
    public function curso() {
        return $this->belongsTo(Curso::class);
    }

    // periodo
    public function periodo() {
        return $this->belongsTo(Periodo::class);
    }

}
