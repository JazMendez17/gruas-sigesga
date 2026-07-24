<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ConfiguracionController extends Controller
{
    public function index()
    {
        return Inertia::render('Panel/Configuracion/Index');
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $empresa = $user->empresa;

        if (!$empresa) {
            return back()->with('error', 'No hay empresa asociada');
        }

        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'siglas' => 'required|string|max:20',
            'slogan' => 'nullable|string|max:500',
            'texto_derechos' => 'nullable|string|max:500',
            'telefono_contacto' => 'nullable|string|max:50',
            'email_contacto' => 'nullable|email|max:255',
            'color_primario' => 'nullable|string|max:20',
            'color_secundario' => 'nullable|string|max:20',
            'color_texto' => 'nullable|string|max:20',
            'tipografia' => 'nullable|string|max:100',
            'modo_oscuro' => 'nullable|boolean',
            'logo' => 'nullable|string|max:500',
            'imagen_fondo' => 'nullable|string|max:500',
        ]);

        $data['modo_oscuro'] = $request->boolean('modo_oscuro');

        $empresa->update($data);

        return back()->with('success', 'Configuración guardada correctamente');
    }
}
