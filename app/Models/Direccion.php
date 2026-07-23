<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Direccion extends Model
{
    use HasFactory;

    protected $table = 'direcciones';

    protected $fillable = [
        'calle',
        'numero',
        'colonia',
        'codigo_postal',
        'ciudad',
        'estado',
        'pais',
        'referencia',
    ];

    public function oficinas()
    {
        return $this->hasMany(Oficina::class, 'direccion_id');
    }

    public function empleados()
    {
        return $this->hasMany(Empleado::class, 'direccion_id');
    }

    public function clientes()
    {
        return $this->hasMany(Cliente::class, 'direccion_id');
    }
}
