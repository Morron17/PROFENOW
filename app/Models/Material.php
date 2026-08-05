<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Material extends Model
{
    use HasFactory;

    protected $table = 'materiales';

    protected $primaryKey = 'material_id';

    protected $fillable = ['titulo','contenido', 'materia', 'archivo', 'tipo', 'fecha' ];
    public function getRouteKeyName()
    {
        return 'material_id';
    }
}
