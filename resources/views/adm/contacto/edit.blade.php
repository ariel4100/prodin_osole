@extends('adm.layouts.app')

@section('content')
<div class="container" id="container-fluid">
    <div class="row">
        <div class="col s12">
            <nav>
                <div class="nav-wrapper grey">
                    <div class="col s12">
                        <a href="{{ route('home') }}" class="breadcrumb">Home</a>
                        <a href="{{ route('contacto.index') }}" class="breadcrumb">Contacto</a>
                        <a href="#" class="breadcrumb">Editar</a>
                    </div>
                </div>
            </nav>
            <h5>Información de Contacto</h5>
            <div class="divider" style="margin-bottom: 10px"></div>
            <form method="POST"  enctype="multipart/form-data" action="{{action('ContactoController@update', $datos->id)}}" class="col s12 m8 offset-m2 xl10 offset-xl1">
                {{ csrf_field() }}
                {{ method_field('PUT')}}

                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">keyboard_arrow_right</i>
                        <input id="icon_prefix" type="text" class="validate" name="descripcion" value="{{$datos->descripcion}}" >
                        <label for="icon_prefix">{{ mb_strtoupper($datos->tipo) }}</label>
                    </div>
                    <div class="right">
                        <a href="{{ action('ContactoController@contacto') }}" class="waves-effect waves-light btn">Cancelar</a>
                        <button class="btn waves-effect waves-light" type="submit" name="action" value="contacto">Submit
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
