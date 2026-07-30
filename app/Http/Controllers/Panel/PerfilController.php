<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class PerfilController extends Controller
{
    public function index()
    {
        $user = auth()->user()->load('empresa');

        return Inertia::render('Panel/MiPerfil/Index', [
            'usuario' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'telefono' => $user->telefono,
                'foto' => $user->foto,
                'rol' => $user->rol,
                'empresa' => $user->empresa?->nombre ?? 'Sin empresa',
            ],
        ]);
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'email' => 'required|email|max:150|unique:usuarios,email,' . $user->id,
            'telefono' => 'nullable|string|max:20',
        ]);

        $user->update($validated);

        return back()->with('success', 'Perfil actualizado correctamente');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'actual' => 'required|string',
            'nueva' => 'required|string|min:6',
        ]);

        $user = auth()->user();

        if (!Hash::check($request->actual, $user->password)) {
            return back()->withErrors(['actual' => 'La contraseña actual no es correcta'])->with('error', 'La contraseña actual no es correcta');
        }

        $user->update([
            'password' => Hash::make($request->nueva),
        ]);

        return back()->with('success', 'Contraseña actualizada correctamente');
    }

    public function updateFoto(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $user = auth()->user();
        $path = $request->file('foto')->store('fotos', 'public');

        if ($user->foto) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($user->foto);
        }

        $user->update(['foto' => $path]);

        return back()->with('success', 'Foto de perfil actualizada correctamente');
    }
}
