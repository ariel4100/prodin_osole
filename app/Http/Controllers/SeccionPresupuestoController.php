<?php

namespace App\Http\Controllers;

use App\Contacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class SeccionPresupuestoController extends Controller
{
    public function index(){

        return view('page.presupuesto.index');
    }


    public function store(Request $request)
    {
        if($request->file('archivo') != null)
        {
            $path           = Storage::putFileAs('presupuesto', $request->file('archivo'),'presupuesto_temp'.'.'.$request->file('archivo')->getClientOriginalExtension());
            $rutaNombre     = 'presupuesto_temp'.'.'.$request->file('archivo')->getClientOriginalExtension();

            $data = array(['nombre'   => $request->get('nombre'),
                'localidad' => $request->get('localidad'),
                'email'    => $request->get('email'),
                'telefono'    => $request->get('telefono'),
                'mensaje'  => $request->get('mensaje')]);
            Mail::send('page.presupuesto.email.presupuesto', $data[0], function($message){
                $dato = Contacto::where('tipo', 'email')->first();
                $message->subject('Te han enviado un mensaje desde la web');
                $message->to($dato->descripcion);
                $message->attach(storage_path('app/presupuesto/presupuesto_temp.pdf'));
            }
            );
        }else{

            $data = array(['nombre'   => $request->get('nombre'),
                'localidad' => $request->get('localidad'),
                'email'    => $request->get('email'),
                'telefono'    => $request->get('telefono'),
                'mensaje'  => $request->get('mensaje')]);
            Mail::send('page.presupuesto.email.presupuesto', $data[0], function($message){
                $dato = Contacto::where('tipo', 'email')->first();
                $message->subject('Te han enviado un mensaje desde la web');
                $message->to($dato->descripcion);
            }
            );
        }


        return redirect()->back()->with('alert', '¡Gracias por contactarnos!');
    }
}
