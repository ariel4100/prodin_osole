@extends('layouts.app')

@section('style')
    <style>
        .ion-active{
            width: 200px;
            height: 200px;
            background-color: #094984;
            border-radius: 50%;
            border: 2px solid #094984;

        }


    </style>
@stop
@section('content')
    <div class="carousel carousel-slider  ">
        @foreach($sliders as $s)
            <div class="carousel-item   white-text" href="#one!" style="background-image: url({{ asset('images/sliders/'.$s->file_image) }})">
                @if ($s->titulo)
                    <div class="left" style="padding: 0px 50px 10px 50px; background-color: #2DC5EE; margin-top: 100px;" >
                        {!! $s->titulo !!}
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    <div class="row " style="background-color: #094984; padding:  3rem; font-family: 'Open Sans'">
        <div class="col s6 offset-s3 center" style="color: white">
            @if ($informacion)
                <h6>{{ $informacion->titulo1 }}</h6>
            @endif
        </div>
    </div>
    @if($destacados2)
        <div class="container">
            <h4 class="center" style="color: #2CC5ED; margin-bottom: 3rem; margin-top: 3rem">CATEGORIAS DESTACADAS</h4>
            <div class="row">
                @foreach($destacados2 as $f)
                        <div class="col s3 center">
                            <a href="{{ route('listar.page', $f->categoria->id) }}">
                                <div class="">
                                    <img src= "{{ asset('images/categoria/'. $f->categoria->file_image) }}" class="responsive-img"   alt="smaple image">
                                </div>
                                <p class=" center" style="color: #2CC5ED;">{{ $f->categoria->nombre }}</p>
                            </a>
                        </div>
                @endforeach
            </div>
        </div>
    @endif
    @if($destacados)
        <div class="container">
            <h4 class="center" style="color: #2CC5ED; margin-bottom: 3rem; margin-top: 3rem">PRODUCTOS DESTACADAS</h4>
            <div class="row">
                @foreach($destacados as $f)
                        <div class="col s3 center">
                            <a href="{{ route('show.page', $f->producto->id) }}">
                            <div class="">
                                <img src= "{{ asset('images/productos/'. $f->producto->file_image) }}" class="responsive-img"   alt="smaple image">
                            </div>
                            <p class=" center" style="color: #2CC5ED;">{{ $f->producto->nombre }}</p>
                            </a>
                        </div>
                @endforeach
            </div>
        </div>
    @endif
    <div class="row center" style="background-color: #D6D6D6; height: 100%; font-family: 'Open Sans'; padding: 3rem">
        <div class="col s6 offset-s3">
            <h5 style="color: #2CC5ED">CONOZCA LO QUE TENEMOS PARA OFRECERLE</h5>
            <div class="row">
                <form  method="get"  class="col s12" action="{{ action('SeccionHomeController@buscador') }}">
                    <div class="input-field">
                        <i class="material-icons prefix">search</i>
                        <input placeholder="Buscar producto..." id="first_name" type="text" name="nombre" class="validate">
                    </div>
                </form>
            </div>
            @foreach($enlaces as $e)
                <div class="col s6 center " style="margin-top: 3rem">
                    <img src="{{ asset('images/enlace/'.$e->file_image) }}" class="responsive-img ion-active" alt="">
                    <h6 class="center" style="color: #2CC5ED">{{ $e->nombre }}</h6>
                </div>
            @endforeach
        </div>
    </div>

    <div style="   padding: 50px 0px">
        <div class="container hide-on-med-and-down ">
            <div class="slick-marcas">
                @foreach ($marcas as $m)
                    <img src="{{ asset('images/marcas/'.$m->file_image) }}" class="img-responsive" style="height: auto !important; width: auto !important; padding-right: 60px">
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('#slider-home').slider({
                height: 479,
            })
        });

    </script>
@stop