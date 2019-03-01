@extends('adm.layouts.app')

@section('content')
<div class="container" id="container-fluid">
    <div class="row">
        <div class="col s12">
            <nav>
                <div class="nav-wrapper grey">
                    <div class="col s12">
                        <a href="{{ route('home') }}" class="breadcrumb">Home</a>
                        <a href="{{ route('productos.index') }}" class="breadcrumb">Productos</a>
                        <a href="#" class="breadcrumb">Editar</a>
                    </div>
                </div>
            </nav>
            <h5>Productos</h5>
            <div class="divider"></div>
            <form method="POST"  enctype="multipart/form-data" action="{{ route('productos.update',$producto->id) }}" class="col s12 m8 offset-m2 xl10 offset-xl1">
                @csrf
                @method('PUT')
                <div class="row">

                    <h5>Crear</h5>

                    <div class="divider"></div>

                    <div class="row">

                        <div class="file-field input-field s6">

                            <div class="btn">

                                <span>Imagen</span>

                                <input type="file" name="file_image">

                            </div>

                            <div class="file-path-wrapper">

                                <input class="file-path validate" type="text">

                                <span class="helper-text" data-error="wrong" data-success="right">Tamaño recomendado: 1400x334</span>

                            </div>

                        </div>

                    </div>
                    <div class="row">

                        <div class="file-field input-field s6">

                            <div class="btn">

                                <span>Dibujo tecnico</span>

                                <input type="file" name="file_plano">

                            </div>

                            <div class="file-path-wrapper">

                                <input class="file-path validate" type="text">

                                <span class="helper-text" data-error="wrong" data-success="right">Tamaño recomendado: 1400x334</span>

                            </div>

                        </div>

                    </div>
                    <div class="row">

                        <div class="file-field input-field s6">

                            <div class="btn">

                                <span>Ficha</span>

                                <input type="file" name="file_ficha">

                            </div>

                            <div class="file-path-wrapper">

                                <input class="file-path validate" type="text">

                                <span class="helper-text" data-error="wrong" data-success="right">Subir PDF</span>

                            </div>

                        </div>

                    </div>
                    <div class="row">

                        <div class="input-field col s12">

                            <i class="material-icons prefix">keyboard_arrow_right</i>

                            <input id="icon_prefix" type="text" class="validate" name="nombre" value="{{ $producto->nombre }}">

                            <label for="icon_prefix">Nombre</label>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col s12">
                            <h6 for="textarea1">Descripcion</h6>
                        </div>
                        <div class="input-field col s12">
                            <textarea  name="descripcion" class="validate">{!! $producto->descripcion !!} </textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <h6 for="textarea1">Caracteriticas</h6>
                        </div>
                        <div class="input-field col s12">
                            <textarea  name="caracteristicas" class="validate">{!! $producto->caracteristicas !!} </textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <h6 for="textarea1">Especificaciones</h6>
                        </div>
                        <div class="input-field col s12">
                            <textarea  name="especificaciones" class="validate">{!! $producto->especificaciones !!} </textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <select class="materialSelect" id="familia" name="categoria_id">
                                @foreach ($familias as $f )
                                    <option value="{{ $f->id }}" @if($f->id == $producto->categoria_id) selected @endif >{{ ucwords($f->nombre) }} </option>
                                @endforeach
                            </select>
                        </div>


                    </div>
                    <div class="row">

                        <div class="input-field col s6">

                            <i class="material-icons prefix">keyboard_arrow_right</i>

                            <input id="icon_prefix" type="text" class="validate" name="link_mercadolibre" value="{{ $producto->link_mercadolibre }}">

                            <label for="icon_prefix">Link Mercadolibre</label>

                        </div>

                        <div class="input-field col s6">

                            <i class="material-icons prefix">keyboard_arrow_right</i>

                            <input id="icon_prefix" type="text" class="validate" name="orden" value="{{ $producto->orden }}">

                            <label for="icon_prefix">Orden</label>

                        </div>
                    </div>
                    <div class="right">

                        <a href="{{ route('productos.index') }}" class="waves-effect waves-light btn btn-color">Cancelar</a>

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
@section('script')
    <script>
        CKEDITOR.replace('descripcion');

        CKEDITOR.config.height = '150px';

        CKEDITOR.config.width = '100%';

        CKEDITOR.replace('especificaciones');

        CKEDITOR.config.height = '150px';

        CKEDITOR.config.width = '100%';

        CKEDITOR.replace('caracteristicas');

        CKEDITOR.config.height = '150px';

        CKEDITOR.config.width = '100%';

    </script>
@stop