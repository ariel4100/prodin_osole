<?php

namespace App\Http\Controllers;

use App\Logos;
use Illuminate\Http\Request;

class LogosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logos = Logos::all();

        return view('adm.logos.index', compact('logos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $logo      = Logos::find($id);
        $secciones = ['navbar' => 'Barra Principal', 'footer' => 'Pie de Página', 'favicon' => 'Favicon'];

        return view('adm.logos.edit', compact('secciones', 'logo'));
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
        $logo = Logos::find($id);
        if ($request->hasFile('file_image'))
        {
            $file = $request->file('file_image');
            $imagename = uniqid().'_'.$file->getClientOriginalName();
            if (!file_exists('images/logos'))
            {
                mkdir('images/logos',0777,true);
            }
            $file->move('images/logos',$imagename);
        }else{
            $imagename = "no-image.jpg";
        }

        if($logo->save())
            return redirect('adm/logos')->with('alert', "Registro actualizado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar actualizar el registro" );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
