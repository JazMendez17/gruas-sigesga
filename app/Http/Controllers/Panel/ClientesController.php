<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class ClientesController extends Controller
{
    public function index()
    {
        return Inertia::render('Panel/Clientes/Index');
    }

    public function show($id)
    {
        return Inertia::render('Panel/Clientes/Show', [
            'id' => $id,
        ]);
    }
}
