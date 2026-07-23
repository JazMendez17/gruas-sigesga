<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class TarifasPropiasController extends Controller
{
    public function index()
    {
        return Inertia::render('Panel/TarifasPropias/Index');
    }
}
