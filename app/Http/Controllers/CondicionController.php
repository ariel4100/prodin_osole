<?php

namespace App\Http\Controllers;

use App\Condicion;
use Illuminate\Http\Request;

class CondicionController extends Controller
{
    public function edit($id)
    {
        $condicion = Condicion::first();
        return view('adm.general.condiciones.edit', compact('condicion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $condicion = Condicion::find($id);
        $datos     = $request->all();
        $condicion->fill($datos);

        if($condicion->save())
            return redirect()->back()->with('alert', "Registro actualizado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar actualizar el registro" );
    }
}
