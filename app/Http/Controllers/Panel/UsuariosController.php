<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class UsuariosController extends Controller
{
    public function index()
    {
        return Inertia::render('Panel/Usuarios/Index');
    }
}
