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
        'fecha',
        'tipo',
        'descripcion',
        'costo',
        'proveedor',
    ];

    public function unidad()
    {
        return $this->belongsTo(Unidade::class, 'unidad_id');
    }
}
