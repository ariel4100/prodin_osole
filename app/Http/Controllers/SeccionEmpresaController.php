<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Slider;
use Illuminate\Http\Request;

class SeccionEmpresaController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('seccion', 'empresa')->orderBy('orden', 'asc')->get();
        $empresa = Empresa::first();

        return view('page.empresa.index', compact('empresa','sliders'));
    }
}
