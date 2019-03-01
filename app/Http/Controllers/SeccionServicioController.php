<?php

namespace App\Http\Controllers;

use App\Servicio;
use Illuminate\Http\Request;

class SeccionServicioController extends Controller
{
    public function index(){
        $servicios = Servicio::orderBy('orden')->get();

        return view('page.servicios.index', compact('servicios'));
    }
}
