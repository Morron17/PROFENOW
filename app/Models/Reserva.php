<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reservas';

    protected $fillable = [
        'user_id',
        'teacher',
        'materia',
        'horario',
        'email',
        'tipo_reunion',
        'mensaje_profesor',
        'estado',
    ];

    public function alumno()
{
    return $this->belongsTo(User::class, 'user_id');
}
    public function profesor()
{
    return $this->belongsTo(Teacher::class, 'teacher', 'name');
}
}
