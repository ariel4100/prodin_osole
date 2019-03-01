<?php

namespace App\Http\Controllers;

use App\Metadato;
use Illuminate\Http\Request;

class MetadatoController extends Controller
{
    function index()
    {
        $metadatos = Metadato::all();
        return view('adm.metadatos.index',  compact('metadatos'));
    }

    function edit($id)
    {
        $metadato = Metadato::find($id);

        return view('adm.metadatos.edit', compact('metadato'));
    }

    public function update(Request $request,$id )
    {
        $datos    = $request->all();
        $metadato = Metadato::find($id);
        $metadato->fill($datos);

        if($metadato->save())
            return redirect('adm/metadatos')->with('alert', "Registro actualizado exitósamente" );
        else
            return redirect('adm/metadatos')->with('errors', "Ocurrió un error al intentar actualizar el registro" );

    }
}
