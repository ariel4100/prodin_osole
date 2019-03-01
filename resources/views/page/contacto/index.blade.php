@extends('layouts.app')

@section('content')

	<!-- Mapa  -->
	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13123.13333881303!2d-58.4107403!3d-34.6854174!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd5cef8cb390231a1!2sprodin!5e0!3m2!1ses!2sar!4v1551191801551" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
	<!-- Formulario  -->
	<div class="container container-fluid">
		@if ($errors->any())
			<div class="card-panel alert-error" style="background-color: red; color: white">
				<ul><li>ALERTA:
						@foreach ($errors->all() as $error)
							{{ $error }}
						@endforeach
					</li>
				</ul>
			</div>
		@endif

		@if (session('alert'))
			<div class="card-panel alert-success">
				<ul><li>ALERTA:
						{{ session('alert') }}
					</li>
				</ul>
			</div>
		@endif
		<div class="row" >
			<div class="col l3 s12" style="margin-top: 5%">
				<div class="flex-column-center">
					<img src="{{ asset('images/contacto/logo_direc.png') }} " class="responsive-img" alt="" >
					@if($email)
						<p>
							<a href="mailto:{{ $email->descripcion }}">{{ $direccion->descripcion }}</a>
						</p>
					@endif
					<img src="{{ asset('images/contacto/logo_llamado.png') }} " class="responsive-img" alt="" >

					@if($telefono_1 || $telefono_2 )
						<p>
							<a href="tel:{{ $telefono_1->descripcion }}">{{ $telefono_1->descripcion }}</a>
							<br>
							<a href="tel:{{ $telefono_2->descripcion }}">{{ $telefono_2->descripcion }}</a>
						</p>
					@endif
					<img src="{{ asset('images/contacto/logo_email.png') }} " class="responsive-img" alt="" >
					<p><a href="mailto:{{ $email->descripcion }}">{{ $email->descripcion }}</a></p>

				</div>
			</div>
			<div class="col l9 s12">

				<form method="POST"  enctype="multipart/form-data" action="{{action('SeccionContactoController@store')}}" >
					{{ csrf_field() }}

					<div class="row">
						<div class="input-field col s12 m6 ">
							<input id="icon_prefix" type="text" class="validate" name="nombre"  value="{{ old('nombre') }}">
							<label class="label-form-contact" for="icon_prefix">Nombre</label>
						</div>
						<div class="input-field col s12 m6 ">
							<input id="icon_prefix" type="text" class="validate" name="apellido"  value="{{ old('apellido') }}">
							<label class="label-form-contact" for="icon_prefix">Apellido</label>
						</div>
						<div class="input-field col s12 m6 ">
							<input id="telefono" type="text"  name="telefono" class="validate"  value="{{ old('telefono') }}">
							<label class="label-form-contact" for="telefono">Telefono</label>
						</div>
						<div class="input-field col s12 m6 ">
							<input id="email" type="email"  name="email" class="validate"  value="{{ old('email') }}">
							<label class="label-form-contact" for="email">Email</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m6 l12">
							<input style="height: 150px;" id="mensaje" type="text" name="mensaje" class="validate"  @if($mensaje!='') value="{{$mensaje}}" @else value="{{ old('mensaje') }}" @endif>
							<label class="label-form-contact" for="mensaje">Mensaje</label>
						</div>
						<div class="input-field col s12 m6 l6">
							<div class="g-recaptcha" data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}"></div>
						</div>
						<div class="input-field col s12 m6 l6">
							<p>
								<label>
									<input type="checkbox" required name="condiciones" />
									<span>Acepto los términos y condiciones</span>
								</label>
							</p>
						</div>
					</div>
					<div class="center">
						<button class="btn button-enviar-mas z-depth-0 center" type="submit" style="background-color: #094984; width: 132px; color: #FFFFFF;" name="action">Enviar</button>
					</div>
				</form>
			</div>
		</div>

	</div>

@endsection
@section('script')
	<script>
		$(document).ready(function(){
			$('.slider').slider({
				height: 485,
			})
		});


	</script>
@stop



