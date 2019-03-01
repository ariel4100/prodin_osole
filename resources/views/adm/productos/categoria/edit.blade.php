@extends('adm.layouts.app')

@section('content')
<div class="container" id="container-fluid">
    <div class="row">
        <div class="col s12">
            <nav>
                <div class="nav-wrapper grey">
                    <div class="col s12">
                        <a href="{{ route('home') }}" class="breadcrumb">Home</a>
                        <a href="{{ route('categorias.index') }}" class="breadcrumb">Familia</a>
                        <a href="#" class="breadcrumb">Editar</a>
                    </div>
                </div>
            </nav>
            <form method="POST"  enctype="multipart/form-data" action="{{action('CategoriaController@update', $familia->id)}}" class="col s12 m8 offset-m2 xl10 offset-xl1">
                {{ csrf_field() }}
                {{ method_field('PUT')}}

                <div class="row">

                    <h5>Editar</h5>
                    <div class="divider"></div>


                    <div class="file-field input-field s12">
                        <div class="btn">
                            <span>Imagen</span>
                            <input type="file" name="file_image">

                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                            <span class="helper-text" data-error="wrong" data-success="right">Tamaño recomendado: 266x279</span>
                        </div>
                    </div>

                    <div class="input-field col s6">
                        <i class="material-icons prefix">keyboard_arrow_right</i>
                        <input id="icon_prefix" type="text" class="validate" name="nombre"  value="{{$familia->nombre}}" >
                        <label for="icon_prefix">Nombre</label>
                    </div>

                    <div class="input-field col s6">
                        <i class="material-icons prefix">keyboard_arrow_right</i>
                        <input id="icon_prefix" type="text" class="validate" name="orden"   value="{{$familia->orden}}" >
                        <label for="icon_prefix">Orden</label>
                    </div>


                    <div class="right">
                        <a href="{{ action('CategoriaController@index') }}" class="waves-effect waves-light btn btn-color">Cancelar</a>
                        <button class="btn waves-effect waves-light btn-color" type="submit" name="action">Submit
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
