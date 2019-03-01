<?php

namespace App\Http\Controllers;

use App\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function index()
    {
        $marcas = Marca::orderBy('orden')->get();

        return view('adm.marcas.index', compact('marcas'));
    }

    public function create()
    {
        return view('adm.marcas.create', compact('marca'));
    }

    public function store(Request $request)
    {
        if ($request->hasFile('file_image'))
        {
            $file = $request->file('file_image');
            $imagename = uniqid().'_'.$file->getClientOriginalName();
            if (!file_exists('images/marcas'))
            {
                mkdir('images/marcas',0777,true);
            }
            $file->move('images/marcas',$imagename);
        }else{
            $imagename = "no-image.jpg";
        }
        $marca = new Marca;
        $marca->nombre = $request->nombre;
        $marca->file_image = $imagename;
        $marca->orden = $request->orden;
        if($marca->save())
            return redirect()->back()->with('alert', "Registro almacenado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar almacenado el registro" );
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marca = Marca::find($id);

        return view('adm.marcas.edit', compact('marca'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $marca = Marca::find($id);
        if ($request->hasFile('file_image'))
        {
            $file = $request->file('file_image');
            $imagename = uniqid().'_'.$file->getClientOriginalName();
            if (!file_exists('images/marcas'))
            {
                mkdir('images/marcas',0777,true);
            }
            $file->move('images/marcas',$imagename);
        }else{
            $imagename = $marca->file_image;
        }
        $marca->nombre = $request->nombre;
        $marca->file_image = $imagename;
        $marca->orden = $request->orden;
        if($marca->save())
            return redirect('adm/marcas/marca')->with('alert', "Registro actualizado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar actualizar el registro" );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id)
    {
        $marca = Marca::find($id);

        if($marca->delete())
            return redirect()->back()->with('alert', "Registro eliminado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar eliminar el registro" );
    }
}
