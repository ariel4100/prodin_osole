@extends('adm.layouts.app')

@section('content')
<div class="container" id="container-fluid">
    <div class="row">
        <div class="col s12">
            <nav>
                <div class="nav-wrapper grey">
                    <div class="col s12">
                        <a href="#!" class="breadcrumb">Home</a>
                        <a href="#!" class="breadcrumb">Editar Informacion</a>
                    </div>
                </div>
            </nav>
            <h5>Editar Información en HOME</h5>
            <div class="divider"></div>
            <form method="POST"  enctype="multipart/form-data" action="{{action('HomeController@update', $informacion->id)}}" class="col s12 m8 offset-m2 xl10 offset-xl1">
                {{ csrf_field() }}
                {{ method_field('PUT')}}
                <div class="row">
                    <h5>Editar</h5>

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

                        <div class="input-field col s12">

                            <i class="material-icons prefix">keyboard_arrow_right</i>
                            <textarea id="titulo1" name="titulo1"> {{ $informacion->titulo1 }} </textarea>

                            <label for="icon_prefix">Título 1</label>

                        </div>

                    </div>

                    <div class="row">



                        <div class="col s12">

                            <h6 for="textarea1">Título 2</h6>

                        </div>

                        <div class="input-field col s12">

                            <textarea id="titulo2" name="titulo2"> {{ $informacion->titulo4 }} </textarea>

                        </div>

                    </div>

                    <div class="right">

                        <a href="{{ action('HomeController@indexInformacion') }}" class="waves-effect waves-light btn btn-color">Cancelar</a>

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
        CKEDITOR.replace('titulo1');

        CKEDITOR.config.height = '150px';

        CKEDITOR.config.width = '100%';

        CKEDITOR.replace('titulo2');

        CKEDITOR.config.height = '150px';

        CKEDITOR.config.width = '100%';

    </script>

@stop