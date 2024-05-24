<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tecnico extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tipoUsuario() {
        return $this->belongsTo(TipoUsuario::class, 'tipo_usuario_id');
    }

    public function status() {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
