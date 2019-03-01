<?php

namespace App\Http\Controllers;

use App\CategoriaDestacado;
use App\Enlace;
use App\Informacion;
use App\Marca;
use App\Producto;
use App\ProductoDestacado;
use App\Slider;
use Illuminate\Http\Request;

class SeccionHomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('seccion', 'home')->get();
        $informacion = Informacion::first();
        $destacados = ProductoDestacado::all();
        $destacados2 = CategoriaDestacado::all();
        $enlaces = Enlace::all();
        $marcas = Marca::all();
        return view('page.home.index', compact('sliders', 'informacion', 'destacados','destacados2','enlaces','marcas'));
    }

    public function footer()
    {
        $sliders = Slider::where('seccion', 'home')->get();
        $informacion = Informacion::first();
        $destacados = ProductoDestacado::all();
        $destacados2 = CategoriaDestacado::all();
        $enlaces = Enlace::all();
        $marcas = Marca::all();
        return view('page.home.index', compact('sliders', 'informacion', 'destacados','destacados2','enlaces','marcas'));
    }

    public function buscador(Request $request)
    {
        $busqueda  = $request->nombre;
        $resultado = Producto::where('nombre', 'like', '%'.$busqueda.'%')->get();

        return view('page.home.busqueda', ['resultado' => $resultado]);
    }
}
