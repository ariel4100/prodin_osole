@extends('adm.layouts.app')

@section('content')
<div class="container" id="container-fluid">
    <div class="row">
        <div class="col s12">
            <form method="POST"  enctype="multipart/form-data" action="{{action('SliderController@store', ['seccion' => $seccion])}}" class="col s12 m8 offset-m2 xl10 offset-xl1">
                {{ csrf_field() }}

                <div class="row">
                    <h5>Crear Slider</h5>
                    <div class="divider"></div>
                    <div class="file-field input-field s12">
                        <div class="btn">
                            <span>Imagen</span>
                            <input type="file" name="file_image">

                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                            <span class="helper-text" data-error="wrong" data-success="right">Tamaño recomendado: 1400x450</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12">
                            <h6 for="textarea1">Título</h6>
                        </div>
                        <div class="input-field col s12">
                            <textarea id="titulo" name="titulo">  </textarea>
                        </div>
                    </div>
                    <div class="input-field col s6">
                        <select name="seccion" disabled>
                            <option value="{{$seccion}}" >{{ strtoupper($seccion) }}</option>
                        </select>
                        <label>Seccion</label>
                    </div>

                    <div class="input-field col s6">
                        <i class="material-icons prefix">text_rotation_none</i>
                        <input id="icon_prefix" type="text" class="validate" name="orden">
                        <label for="icon_prefix">Orden</label>
                    </div>
                </div>

                <div class="row">
                    <div class="right">
                        <a href="{{ action('SliderController@index', ['seccion' => $seccion]) }}" class="waves-effect waves-light btn btn-color">Cancelar</a>
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
        CKEDITOR.replace('titulo');

        CKEDITOR.config.height = '150px';

        CKEDITOR.config.width = '100%';


    </script>
@stop