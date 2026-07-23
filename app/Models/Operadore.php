<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Operadore extends Model
{
    use HasFactory;

    protected $table = 'operadores';

    protected $fillable = [
        'empresa_id',
        'empleado_id',
        'numero_empleado',
        'puesto',
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }

    public function servicios()
    {
        return $this->hasMany(Servicio::class, 'operador_id');
    }

    public function unidad()
    {
        return $this->hasOne(Unidade::class, 'operador_asignado_id');
    }
}
