@extends('layouts.app')

@section('content')

    <div class="carousel carousel-slider center" >
        @foreach($sliders as $s)
            <div class="carousel-item   white-text" href="#one!" style="background-image: url({{ asset('images/sliders/'.$s->file_image) }}); align-items: center">
               @if ($s->titulo )
                    <div class="row" style="margin-top: 100px;">
                        <div class="col s4 offset-s4" style="   background-color: #2DC5EE;">
                            <h2 class=" ">{!! $s->titulo !!}</h2>
                        </div>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
<div class="container" style="margin-top: 4rem; font-family: 'open sans'">
    <div class="row">
        <div class="col l6 s12">
            <h5 style="color: #2DC5EE">{{ $empresa->titulo1 }}</h5>
            <p class="">
                {!! $empresa->descripcion !!}
            </p>
        </div>
        <div class="col l6 s12">
            <img src="{{ asset('images/empresa/'.$empresa->file_image) }}" alt="img" class="responsive-img">
        </div>
    </div>
</div>

@endsection
