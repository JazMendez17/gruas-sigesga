<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CotizacionesController extends Controller
{
    public function index()
    {
        return Inertia::render('Panel/Cotizaciones/Index');
    }

    public function create()
    {
        return Inertia::render('Panel/Cotizaciones/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente' => 'required|string|max:255',
            'tipo_servicio' => 'required|string|max:255',
            'origen' => 'required|string|max:500',
            'destino' => 'required|string|max:500',
            'distancia' => 'nullable|numeric',
            'monto' => 'nullable|numeric',
            'observaciones' => 'nullable|string',
        ]);

        return redirect()->route('panel.cotizaciones.index')
            ->with('success', 'Cotización creada correctamente');
    }

    public function show($id)
    {
        return Inertia::render('Panel/Cotizaciones/Show', [
            'id' => $id,
        ]);
    }
}
