<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'type' => 'required|in:logo,imagen_fondo,servicio',
        ]);

        $path = $request->file('file')->store('empresa', 'public');

        return back()->with('success', 'Imagen subida correctamente')->with('uploaded_path', $path);
    }
}
