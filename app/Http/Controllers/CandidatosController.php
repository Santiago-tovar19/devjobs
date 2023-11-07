<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use Illuminate\Http\Request;

class CandidatosController extends Controller
{
    public function index(Vacante $vacante)
    {
        return view("candidatos.index", [
            "vacante" => $vacante
        ]);
    }
}
