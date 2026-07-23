<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class AseguradorasController extends Controller
{
    public function index()
    {
        return Inertia::render('Panel/Aseguradoras/Index');
    }

    public function show($id)
    {
        return Inertia::render('Panel/Aseguradoras/Show', [
            'id' => $id,
        ]);
    }
}
