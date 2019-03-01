@extends('layouts.app')

@section('content')
<div class="cont ainer">
    <div class="r ow">
        <div class="container container-fluid">
            <div class="row">
                @foreach($servicios as $s)
                    <div class="col s12" >
                        @if($s->id%2 == 0)
                            <div class="col s10  m10 l6" id="descripcion-servicios" style="border-right: 1px solid #BBBBBB; padding-bottom: 10px; text-align: right;">
                                <p class="nombre-servicios" style="text-align: right;">{{ $s->nombre }}</p>
                                <p class="descripcion_breve-servicios" style="text-align: right;">{{ $s->descripcion_breve }}</p>
                                <span   class="descripcion-servicios"style="text-align: right;">{!! $s->descripcion !!}</span>
                            </div>
                            <div class="col s2  m2 l6" id="image-servicios" style="padding-top: 5%">
                                <img src="{{ asset('images/servicios/'.$s->file_image) }}" class="responsive-img">
                            </div>
                        @else
                            <div class="col s2  m2 l1 offset-l5" id="image-servicios" style="padding-top: 5%">
                                <img src="{{ asset('images/servicios/'.$s->file_image) }}" class="responsive-img">
                            </div>
                            <div class="col s10  m10 l6" id="descripcion-servicios" style="border-left: 1px solid #BBBBBB; padding-bottom: 25px">
                                <p class="nombre-servicios">{{ $s->nombre }}</p>
                                <p class="descripcion_breve-servicios">{{ $s->descripcion_breve }}</p>
                                <span class="descripcion-servicios" >{!! $s->descripcion !!}</span>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>

        </div>


    </div>
</div>

@endsection
