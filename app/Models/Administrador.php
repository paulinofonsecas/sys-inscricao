<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    use HasFactory;

    function usuario() {
        return $this->belongsTo(User::class);
    }

    function tipoUsuario() {
        return $this->belongsTo(TipoUsuario::class);
    }

    function status() {
        return $this->belongsTo(Status::class);
    }
}
