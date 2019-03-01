@extends('adm.layouts.app')

@section('content')
<div class="container" id="container-fluid">
    <div class="row">
        <div class="col s12">
            <h5>Crear Usuario</h5>
            <div class="divider" style="margin-bottom: 5%"></div>
            <form method="POST"  enctype="multipart/form-data" action="{{action('UserController@store')}}" class="col s12 m8 offset-m2 xl10 offset-xl1">
                {{ csrf_field() }}

                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">keyboard_arrow_right</i>
                        <input id="icon_prefix" type="text" class="validate" name="username">
                        <label for="icon_prefix">Username</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">keyboard_arrow_right</i>
                        <input id="icon_prefix" type="text" class="validate" name="name" >
                        <label for="icon_prefix">Nombre</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">keyboard_arrow_right</i>
                        <input id="icon_prefix" type="password" class="validate" name="password">
                        <label for="icon_prefix">Contraseña</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">keyboard_arrow_right</i>

                        <select name="tipo_usuario" required>
                            <option>::Seleccione Tipo de Usuario::</option>
                            @foreach($tipo_usuario as $index=>$tipo)
                                <option value="{{ $index }}">  {{$tipo}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="right">
                        <a href="{{action('UserController@index')}}"  class="waves-effect waves-light btn">Cancelar</a>
                        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
