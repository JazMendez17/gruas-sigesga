<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CatalogoServicio extends Model
{
    use HasFactory;

    protected $table = 'catalogo_servicios';

    protected $fillable = [
        'empresa_id',
        'nombre',
        'descripcion',
        'precio',
        'duracion',
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }

    public function convenios()
    {
        return $this->hasMany(Convenio::class, 'catalogo_servicio_id');
    }

    public function tarifasEmpresa()
    {
        return $this->hasMany(TarifasEmpresa::class, 'catalogo_servicio_id');
    }

    public function cotizaciones()
    {
        return $this->hasMany(Cotizacione::class, 'catalogo_servicio_id');
    }
}
