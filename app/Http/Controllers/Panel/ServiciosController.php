<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class ServiciosController extends Controller
{
    public function index()
    {
        return Inertia::render('Panel/Servicios/Index');
    }

    public function show($id)
    {
        return Inertia::render('Panel/Servicios/Show', [
            'id' => $id,
        ]);
    }
}
