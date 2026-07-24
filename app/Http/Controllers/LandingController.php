<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class LandingController extends Controller
{
    public function index()
    {
        return Inertia::render('Landing/Index');
    }

    public function solicitar()
    {
        return Inertia::render('Landing/SolicitarServicio');
    }

    public function rastrear()
    {
        return Inertia::render('Landing/RastrearServicio');
    }

    public function soporte()
    {
        return Inertia::render('Landing/Soporte');
    }
}