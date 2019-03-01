@extends('layouts.app')

@section('style')
	<style>

		.efecto{
			position: absolute;
			opacity: 0;
			background-color: transparent;
			height: 100%;
			z-index: 6;
			mix-blend-mode: multiply;
		}

		.efecto:hover{
			opacity: 1;
			transition: 1s;
		}
	</style>
@stop
@section('content')
	<div class="container container-fluid" style="padding-top: 5%">
		<div class="row">

			@forelse($resultado as $s)
				<div class="col s12 m12 l4 center" >
					<div class="subfamilia-productos center">
						<div class=" ">
							<a href="{{ action('SeccionProductoController@show', ['id' => $s->id]) }}">
								<img class="subfamilia-img" src="{{ asset('images/productos/'.$s->file_image) }}">
							</a>
						</div>

					</div>
					<p style="font-size: 14px;"> {{ $s->nombre }} </p>
				</div>
			@empty
				<p>
					No conseguimos productos relacionados a esta categoría
				</p>
			@endforelse
		</div>
	</div>


@endsection


