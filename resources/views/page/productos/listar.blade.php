@extends('layouts.app')

@section('style')
	<style>
		.collapsible {
			border: none;
			box-shadow: none;
		}
		.collapsible-header {
		}
		.collapsible-body {
			padding: 8px;
		}
		a{
			color: #747484;
		}

		.hover {
			background-color: rgba(0,0,0,0.7);


		}
	</style>
@stop
@section('content')
	<div class="container" style=" ">
		<div class="row">
			<div class="breadcrumb-productos" style="padding: 3%">
				<a href="{{ action('SeccionProductoController@index') }}">Productos</a> | <a href="{{ route('listar.page', $familia->id) }}">{{$familia->nombre}}</a>
			</div>
			<div class="col s3">
				<ul class="collapsible">
					@foreach($familias as $f)
						<li @if($f->id == $familia->id)  style="color: #2DC5EE;" @endif>
							<div class="collapsible-header"
								 style="display:flex; justify-content:space-between; align-items:center; padding:8px">
								<a href="{{ route('listar.page', $f->id) }}" @if($f->id == $familia->id) style="color: #2DC5EE;" @endif  class="gra ysillo">
									{{ $f->nombre }}
								</a>
								<i class="material-icons">keyboard_arrow_right</i>
							</div>
							<div class="collapsible-body" style="padding:0">
								@foreach($f->productos as $p)
									<ul class="collapsible">
										<li class="active">
											<div class="collapsible-header">
												<a href="{{ route('show.page', $p->id) }}" class="graysillo"

												>{{$p->nombre }}</a>
											</div>
										</li>
									</ul>
								@endforeach
							</div>
						</li>
					@endforeach
				</ul>
			</div>
			<div class="col s9">
				@foreach($productos as $p)
					<div class="row">
						<div class="col s4 ">
							<a href="{{ route('show.page', $p->id) }}">
								<div class="" style="">
									<img src= "{{ asset('images/productos/'. $p->file_image) }}" class="responsive-img"   alt="smaple image">
								</div>
								<p class=" center">{{ $p->nombre }}</p>
							</a>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
@stop