<?php

namespace App\Http\Controllers;

use App\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public function index()
    {
        $servicios = Servicio::orderBy('orden')->get();

        return view('adm.servicios.index', compact('servicios'));
    }

    public function create()
    {
        return view('adm.servicios.create', compact('marca'));
    }

    public function store(Request $request)
    {
        if ($request->hasFile('file_image'))
        {
            $file = $request->file('file_image');
            $imagename = uniqid().'_'.$file->getClientOriginalName();
            if (!file_exists('images/servicios'))
            {
                mkdir('images/servicios',0777,true);
            }
            $file->move('images/servicios',$imagename);
        }else{
            $imagename = "no-image.jpg";
        }
        $servicio = new Servicio;
        $servicio->nombre = $request->nombre;
        $servicio->descripcion_breve = $request->descripcion_breve;
        $servicio->descripcion = $request->descripcion;
        $servicio->orden = $request->orden;
        $servicio->file_image = $imagename;


        if($servicio->save())
            return redirect()->route('servicio.index')->with('alert', "Registro almacenado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar almacenado el registro" );
    }


    public function edit($id)
    {
        $servicio      = Servicio::find($id);

        return view('adm.servicios.edit', compact('servicio'));
    }

    public function update(Request $request, $id)
    {
        $servicio = Servicio::find($id);
        if ($request->hasFile('file_image'))
        {
            $file = $request->file('file_image');
            $imagename = uniqid().'_'.$file->getClientOriginalName();
            if (!file_exists('images/servicios'))
            {
                mkdir('images/servicios',0777,true);
            }
            $file->move('images/servicios',$imagename);
        }else{
            $imagename = $servicio->file_image;
        }
        $servicio->nombre = $request->nombre;
        $servicio->descripcion_breve = $request->descripcion_breve;
        $servicio->descripcion = $request->descripcion;
        $servicio->orden = $request->orden;
        $servicio->file_image = $imagename;
        if($servicio->save())
            return redirect()->route('servicio.index')->with('alert', "Registro actualizado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar actualizar el registro" );
    }


    public function eliminar($id)
    {
        $servicio = Servicio::find($id);

        if($servicio->delete())
            return redirect()->back()->with('alert', "Registro eliminado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar eliminar el registro" );
    }
}
