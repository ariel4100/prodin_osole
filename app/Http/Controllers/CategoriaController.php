<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $familias = Categoria::orderBy('orden')->get();
        $nivel    = '1';
        return view('adm.productos.categoria.index', compact('familias', 'nivel'));
    }

    public function create()
    {
        $nivel = '1';
        return view('adm.productos.categoria.create', compact('nivel'));
    }

    public function store(Request $request)
    {
        if ($request->hasFile('file_image'))
        {
            $file = $request->file('file_image');
            $imagename = uniqid().'_'.$file->getClientOriginalName();
            if (!file_exists('images/categoria'))
            {
                mkdir('images/categoria',0777,true);
            }
            $file->move('images/categoria',$imagename);
        }else{
            $imagename = "no-image.jpg";
        }
        $familia = new Categoria();
        $familia->nombre = $request->nombre;
        $familia->orden = $request->orden;
        $familia->file_image = $imagename;
        if($familia->save())
            return redirect()->route('categorias.index')->with('alert', "Registro almacenado exitósamente" );
        else
            return redirect()->with('errors', "Ocurrió un error al intentar almacenar el registro" );
    }


    public function edit($id)
    {
        $familia = Categoria::find($id);

        return view('adm.productos.categoria.edit', compact('familia', 'nivel', 'familia_padre'));
    }

    public function update(Request $request, $id)
    {
        $datos     = $request->all();
        $familia   = Categoria::find($id);
        $file_save = Helpers::saveImage($request->file('file_image'), 'familias');
        $file_save ? $datos['file_image'] = $file_save : false;
        $familia->fill($datos);

        if($familia->save())
            return redirect('adm/productos/familias')->with('alert', "Registro actualizado exitósamente" );
        else
            return redirect('adm/productos/familias')->with('errors', "Ocurrió un error al intentar actualizar el registro" );
    }

    public function destroy($id){
        $familia = Categoria::find($id);

        if($familia->delete())
            return redirect()->back()->with('alert', "Registro eliminado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar eliminar el registro" );
    }

}
