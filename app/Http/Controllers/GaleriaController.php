<?php

namespace App\Http\Controllers;

use App\Galeria;
use App\Producto;
use Illuminate\Http\Request;

class GaleriaController extends Controller
{
    public function index($id)
    {
        $producto = Producto::where('id', $id)->with('galerias')->first();
        return view('adm.productos.galeria.index', ['producto' => $producto]);
    }


    public function create($id)
    {
        $producto = Producto::find($id);
        return view('adm.productos.galeria.create', ['producto' => $producto]);
    }

    public function store(Request $request)
    {
        $producto_id = $request->producto_id;

        $status      = 0;
        if ($request->hasFile('file_image'))
        {
            $file = $request->file('file_image');
            foreach($file as $img){

                $imagename = uniqid().'_'.$img->getClientOriginalName();
                if (!file_exists('images/productos/galeria'))
                {
                    mkdir('images/productos/galeria',0777,true);
                }

                $img->move('images/productos/galeria',$imagename);

                $galeria = new Galeria();
                $galeria->producto_id = $producto_id;
                $galeria->file_image = $imagename;
                $galeria->orden = $request->orden;

                if($galeria->save())
                    $status = 1;
                else
                    return redirect('adm/productos/producto')->with('errors', "Ocurrió un error al intentar almacenar el registro" );
            }
        }
        if($status==1)
            return redirect()->back()->with('alert', "Registro almacenado exitósamente" );
        else
            return redirect()->with('errors', "Ocurrió un error al intentar almacenar el registro" );
    }


    public function edit($id)
    {
        $galeria = Galeria::find($id);
        $producto = Producto::find($galeria->producto_id);

        return view('adm.productos.galeria.edit', compact('galeria', 'producto'));
    }

    public function update(Request $request, $id)
    {
        $galeria   = Galeria::find($id);

        $datos     = $request->all();
        $file_save = Helpers::saveImage($request->file('file_image'), 'galeria_productos');
        $file_save ? $datos['file_image'] = $file_save : false;

        $galeria->fill($datos);

        if($galeria->save())
            return  redirect()->back()->with('alert', "Registro actualizado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar actualizar el registro" );
    }

    public function eliminar($id)
    {
        $galeria = Galeria::find($id);
        $producto = Producto::find($galeria->producto->id);
        $path = $galeria->file_image;

        \File::exists(public_path('images/galeria_productos/' . $galeria->file_image));

        if ($galeria->delete()) {
            \File::delete(public_path('images/galeria_productos/' . $path));
            $galeria = Galeria::where('producto_id', $producto->id)->get();
            return redirect()->back()->with('alert', "Registro eliminado exitósamente");
        } else {
            return redirect()->back()->with('errors', "Ocurrió un error al intentar eliminar el registro");
        }
    }
}
