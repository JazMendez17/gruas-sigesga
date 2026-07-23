<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ConveniosController extends Controller
{
    public function index()
    {
        return Inertia::render('Panel/Convenios/Index');
    }

    public function create()
    {
        return Inertia::render('Panel/Convenios/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'aseguradora' => 'required|string|max:255',
            'tipo_servicio' => 'required|string|max:255',
            'fecha_inicio' => 'nullable|date',
            'fecha_vencimiento' => 'nullable|date',
            'descuento' => 'nullable|numeric',
            'comision' => 'nullable|numeric',
            'condiciones' => 'nullable|string',
        ]);

        return redirect()->route('panel.convenios.index')
            ->with('success', 'Convenio creado correctamente');
    }

    public function show($id)
    {
        return Inertia::render('Panel/Convenios/Show', [
            'id' => $id,
        ]);
    }

    public function edit($id)
    {
        return Inertia::render('Panel/Convenios/Edit', [
            'id' => $id,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'aseguradora' => 'required|string|max:255',
            'tipo_servicio' => 'required|string|max:255',
            'fecha_inicio' => 'nullable|date',
            'fecha_vencimiento' => 'nullable|date',
            'descuento' => 'nullable|numeric',
            'comision' => 'nullable|numeric',
            'condiciones' => 'nullable|string',
        ]);

        return redirect()->route('panel.convenios.index')
            ->with('success', 'Convenio actualizado correctamente');
    }
}
