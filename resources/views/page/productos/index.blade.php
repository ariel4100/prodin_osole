@extends('layouts.app')

@section('content')


<div class="container" style="margin-top: 4rem">
    <div class="row" >
        @foreach($familias as $f)
            <a href="{{ route('listar.page', $f->id) }}">
                <div class="col s3">
                    <div class="">
                        <img src= "{{ asset('images/categoria/'. $f->file_image) }}" class="responsive-img"   alt="smaple image">
                    </div>
                    <p class=" center">{{ $f->nombre }}</p>
                </div>
            </a>
        @endforeach
    </div>
</div>

@endsection
