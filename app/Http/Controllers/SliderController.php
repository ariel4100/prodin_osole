<?php

namespace App\Http\Controllers;

use App\Extensions\Helpers;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index($seccion)
    {
        $sliders = Slider::where('seccion', $seccion)->orderBy('orden', 'asc')->get();

        return view('adm.sliders.index', compact('sliders', 'seccion'));
    }
    public function create($seccion)
    {
        return view('adm.sliders.create', compact('seccion'));
    }

    public function store(Request $request, $seccion)
    {
        if ($request->hasFile('file_image'))
        {
            $file = $request->file('file_image');
            $imagename = uniqid().'_'.$file->getClientOriginalName();
            if (!file_exists('images/sliders'))
            {
                mkdir('images/sliders',0777,true);
            }
            $file->move('images/sliders',$imagename);
        }else{
            $imagename = "no-image.jpg";
        }

        $slider = new Slider();
        $slider->titulo = $request->titulo;
        $slider->file_image = $imagename;
        $slider->seccion = $seccion;
        $slider->orden = $request->orden;

        if($slider->save())
            return redirect()->back()->with('alert', "Registro almacenado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar almacenado el registro" );
    }


    public function edit($seccion, $id)
    {
        $slider = Slider::find($id);

        return view('adm.sliders.edit', compact('seccion', 'slider'));
    }

    public function update(Request $request, $seccion, $id)
    {
        $slider = Slider::find($id);
        if ($request->hasFile('file_image'))
        {
            $file = $request->file('file_image');
            $imagename = uniqid().'_'.$file->getClientOriginalName();
            if (!file_exists('images/sliders'))
            {
                mkdir('images/sliders',0777,true);
            }
            $file->move('images/sliders',$imagename);
        }else{
            $imagename = $slider->file_image;
        }

        $slider->titulo = $request->titulo;
        $slider->file_image = $imagename;
        $slider->orden = $request->orden;

        if($slider->save())
            return redirect()->back()->with('alert', "Registro actualizado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar actualizar el registro" );
    }

    public function eliminar($id){
        $slider = Slider::find($id);

        if($slider->delete())
            return redirect()->back()->with('alert', "Registro eliminado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar eliminar el registro" );
    }
}
