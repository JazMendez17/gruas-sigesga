<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmpresaIntegracione extends Model
{
    use HasFactory;

    protected $table = 'empresa_integraciones';

    protected $fillable = [
        'empresa_id',
        'proveedor',
        'api_key',
        'configuracion_json',
        'activo',
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }
}
