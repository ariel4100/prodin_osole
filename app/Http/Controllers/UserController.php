<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::paginate(7);
        return view('adm.usuarios.index', ['usuarios' => $usuarios]);
    }

    public function create()
    {
        $tipo_usuario = ['admin' => 'Administrador', 'user' => 'Usuario'];
        return view('adm.usuarios.create' , compact('tipo_usuario'));
    }

    public function store(Request $request)
    {

        $user = new User ($request->all());
        $user->password= bcrypt($request->password);

        if($user->save())
            return redirect('adm/usuarios/user')->with('alert', "Usuario registrado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar almacenar el registro" );
    }

    public function edit($id){
        $user         = User::find($id);
        $tipo_usuario = ['admin' => 'Administrador', 'user' => 'Usuario'];
        return view('adm.usuarios.edit', ['user' => $user, 'tipo_usuario' => $tipo_usuario]);
    }

    public function update(Request $request, $id){
        $user = User::find($id);
        $user->fill($request->all());
        $user->password= bcrypt($request->password);

        if($user->save())
            return redirect('adm/usuarios/user')->with('alert', "Usuario actualizado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar actualizar el registro" );
    }

    public function eliminar($id){
        $user = User::find($id);

        if($user->delete())
            return redirect()->back()->with('alert', "Usuario eliminado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar eliminar el registro" );
    }
}
