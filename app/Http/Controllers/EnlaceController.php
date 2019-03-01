<?php

namespace App\Http\Controllers;

use App\Enlace;
use Illuminate\Http\Request;

class EnlaceController extends Controller
{
    public function index()
    {
        $enlaces = Enlace::orderBy('orden')->get();

        return view('adm.home.enlaces.index', compact('enlaces'));
    }

    public function create()
    {
        return view('adm.home.enlaces.create', compact('marca'));
    }

    public function store(Request $request)
    {
        if ($request->hasFile('file_image'))
        {
            $file = $request->file('file_image');
            $imagename = uniqid().'_'.$file->getClientOriginalName();
            if (!file_exists('images/enlace'))
            {
                mkdir('images/enlace',0777,true);
            }
            $file->move('images/enlace',$imagename);
        }else{
            $imagename = "no-image.jpg";
        }
        $enlace = new Enlace();
        $enlace->nombre = $request->nombre;
        $enlace->file_image = $imagename;
        $enlace->orden = $request->orden;
        $enlace->url = $request->url;
        if($enlace->save())
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
        $enlace = Enlace::find($id);

        return view('adm.home.enlaces.edit', compact('enlace'));
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
        $enlace = Enlace::find($id);
        if ($request->hasFile('file_image'))
        {
            $file = $request->file('file_image');
            $imagename = uniqid().'_'.$file->getClientOriginalName();
            if (!file_exists('images/enlace'))
            {
                mkdir('images/enlace',0777,true);
            }
            $file->move('images/enlace',$imagename);
        }else{
            $imagename = $enlace->file_image;
        }
        $enlace->nombre = $request->nombre;
        $enlace->file_image = $imagename;
        $enlace->orden = $request->orden;
        $enlace->url = $request->url;
        if($enlace->save())
            return redirect()->back()->with('alert', "Registro actualizado exitósamente" );
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
        $enlace = Enlace::find($id);

        if($enlace->delete())
            return redirect()->back()->with('alert', "Registro eliminado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar eliminar el registro" );
    }
}
