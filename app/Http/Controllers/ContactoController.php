<?php

namespace App\Http\Controllers;

use App\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{

    public function contacto()
    {
        $telefono_1 = Contacto::where('tipo', 'telefono_1')->first();
        $telefono_2 = Contacto::where('tipo', 'telefono_2')->first();
        $telefono_3 = Contacto::where('tipo', 'telefono_3')->first();
        $email      = Contacto::where('tipo', 'email')->first();
        $direccion  = Contacto::where('tipo', 'direccion')->first();
        $mapa       = Contacto::where('tipo', 'mapa')->first();
        return view('adm.contacto.index', compact('mapa', 'email',  'telefono_1',  'telefono_2',  'telefono_3',  'direccion'));
    }

    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function editContacto($id)
    {
        $datos = Contacto::find($id);
        return view('adm.contacto.edit', compact('datos'));
    }

    public function update(Request $request, $id){
        $datos = Contacto::find($id);
        $datos->fill($request->all());

        if($request->action=='contacto')
            $path = 'adm/datos/contacto';
        elseif($request->action=='redes')
            $path = 'adm/datos/redes';

        if($datos->save())
            return redirect($path)->with('alert', "Registro actualizado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar actualizar el registro" );
    }
}
