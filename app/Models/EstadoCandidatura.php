<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoCandidatura extends Model
{
    use HasFactory;

    public static int $RECUSADO = 4;
    public static int $DESISTIDO = 6;
    public static int $INVALIDO = 7;
}
