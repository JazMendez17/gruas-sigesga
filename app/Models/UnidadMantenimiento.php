<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UnidadMantenimiento extends Model
{
    use HasFactory;

    protected $table = 'unidad_mantenimientos';

    protected $fillable = [
        'unidad_id',
        'tipo',
        'fecha',
        'kilometraje',
        'costo',
        'proximo_mantenimiento_fecha',
        'proximo_mantenimiento_km',
        'observaciones',
    ];

    public function unidad()
    {
        return $this->belongsTo(Unidade::class, 'unidad_id');
    }
}
