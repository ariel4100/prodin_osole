<?php

namespace App\Http\Controllers;

use App\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function index()
    {
        $empresa = Empresa::first();
        return view('adm.empresa.index',compact('empresa'));
    }
    public function edit($id)
    {
        $empresa = Empresa::find($id);
        return view('adm.empresa.edit', compact('empresa'));
    }

    public function update(Request $request, $id)
    {
        $empresa = Empresa::find($id);
        if ($request->hasFile('file_image'))
        {
            $file = $request->file('file_image');
            $imagename = uniqid().'_'.$file->getClientOriginalName();
            if (!file_exists('images/empresa'))
            {
                mkdir('images/empresa',0777,true);
            }
            $file->move('images/empresa',$imagename);
        }else{
            $imagename = $empresa->file_image;
        }
        $empresa->titulo1 = $request->titulo1;
        $empresa->descripcion = $request->descripcion;
        $empresa->file_image = $imagename;

        if($empresa->save())
            return redirect()->route('empresa')->with('alert', "Registro actualizado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar actualizar el registro" );
    }
}
