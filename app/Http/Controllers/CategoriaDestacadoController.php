<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\CategoriaDestacado;
use App\Producto;
use Illuminate\Http\Request;

class CategoriaDestacadoController extends Controller
{
    public function index()
    {
        $destacados = CategoriaDestacado::orderBy('orden')->get();
        return view('adm.home.categoriasDestacados.index', compact('destacados'));
    }
    public function create()
    {
        $destacados = Categoria::orderBy('orden')->get();
        return view('adm.home.categoriasDestacados.create', compact('destacados'));
    }

    public function store(Request $request)
    {
        $destacado = new CategoriaDestacado();
        $destacado->categoria_id = $request->categoria_id;
        $destacado->orden = $request->orden;

        if($destacado->save())
            return redirect()->back()->with('alert', "Registro almacenado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar actualizar el registro" );
    }

    public function edit($id)
    {
        $destacado  = CategoriaDestacado::find($id);
        $destacados = Producto::orderBy('orden')->get();

        return view('adm.home.categoriasDestacados.edit', compact('destacado', 'destacados'));
    }

    public function update(Request $request, $id)
    {
        $destacado              = CategoriaDestacado::find($id);
        $destacado->categoria_id = $request->categoria_id;
        $destacado->orden       = $request->orden;

        if($destacado->save())
            return redirect('adm/home/destacados')->with('alert', "Registro almacenado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar actualizar el registro" );
    }
}
