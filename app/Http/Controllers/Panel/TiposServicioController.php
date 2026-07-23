<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class TiposServicioController extends Controller
{
    public function index()
    {
        return Inertia::render('Panel/TiposServicio/Index');
    }
}
