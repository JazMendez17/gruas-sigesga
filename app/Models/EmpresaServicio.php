<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmpresaServicio extends Model
{
    use HasFactory;

    protected $table = 'empresa_servicios';

    protected $fillable = [
        'empresa_id',
        'titulo',
        'descripcion',
        'icono',
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }
}
