@extends('layouts.app')

@section('content')

	<div class="container" style="margin-bottom: 100px;">
		<form action="{{route('enviarpresupuesto')}}" method="post" enctype="multipart/form-data" >
			{{ csrf_field() }}
			<div class="row" style="margin-top: 100px;">
				<div id="estado1" class="col s12 center">
					<div class="row hide-on-med-and-down ">
						<div class="col l6 center icon-active">
							<i class="fas fa-file-signature"></i>
							<div style="height: 4px; width: 70%; margin: 0 auto;"></div>
						</div> 
						<div class="col l6 center icon-desactive" id="elDiv2">
							<i class="fas fa-comments"></i>
							<div style="height: 4px; width: 70%; margin: 0 auto;"></div>
						</div>
					</div>
					<div class="row hide-on-med-and-down " >
						<div class="col l6 center" style="margin-top: -20px" id="elDiv1">
							<img src="{{ asset('images/presupuesto/linea1.png')}}" >
						</div>
						<div class="col l6 center" style="margin-top: -20px" id="elDiv2">
							<img src="{{ asset('images/presupuesto/linea2.png')}}" >
						</div>
					</div>
					<div class="row">
						<div class="col l6 center">
							<h1 class="titulo-presupuesto-active">TUS DATOS</h1>
						</div> 
						<div class="col l6 center" id="elDiv2">
							<h1 class="titulo-presupuesto">TU CONSULTA</h1>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m12 l5 offset-l1">
							<input id="icon_prefix" type="text" class="validate" name="nombre"  value="{{ old('nombre') }}">
							<label class="label-form-contact" for="icon_prefix">Nombre</label>
						</div>
						<div class="input-field col s12 m12 l5 offset-l1">
							<input id="icon_prefix" type="text" class="validate" name="localidad"  value="{{ old('localidad') }}">
							<label class="label-form-contact" for="icon_prefix">Localidad</label>
						</div>
						<div class="input-field col s12 m12 l5 offset-l1">
							<input id="icon_prefix" type="email" class="validate" name="email"  value="{{ old('email') }}">
							<label class="label-form-contact" for="icon_prefix">Email</label>
						</div>
						<div class="input-field col s12 m12 l5 offset-l1">
							<input id="icon_prefix" type="text" class="validate" name="telefono"  value="{{ old('telefono') }}">
							<label class="label-form-contact" for="icon_prefix">Teléfono</label>
						</div>
						<div class="col l5 pull-l1 right">
							<button type="button" id="siguiente" class="btn right z-depth-0" style="background-color: #094984">Siguiente</button>
						</div>
					</div>

				</div>
			</div>
			<div class="row">
				<div id="estado2" class="col s12" style="display: none;">
					<div class="row">
						<div class="col l6 center icon-desactive">
							<i class="fas fa-file-signature"></i>
							<div style="height: 4px; width: 70%; margin: 0 auto;"></div>
						</div> 
						<div class="col l6 center  icon-active" id="elDiv2">
							<i class="fas fa-comments"></i>
							<div style="height: 4px; width: 70%; margin: 0 auto;"></div>
						</div>
					</div>
					<div class="row">
						<div class="col l6 center" style="margin-top: -20px" id="elDiv1">
							<img src="{{ asset('images/presupuesto/linea2.png')}}" >
						</div>
						<div class="col l6 center" style="margin-top: -20px" id="elDiv2">
							<img src="{{ asset('images/presupuesto/linea1.png')}}" >
						</div>
					</div>
					<div class="row">
						<div class="col l6 center">
							<h1 class="titulo-presupuesto">TUS DATOS</h1>
						</div> 
						<div class="col l6 center" id="elDiv2">
							<h1 class="titulo-presupuesto-active">TU CONSULTA</h1>
						</div>
					</div>
					<div class="row">
						<div class="col l6">
							<label >Mensaje</label>
							<textarea id="detalles" cols="30" rows="10" name="detalles" class="materialize-textarea" placeholder="Mensaje"></textarea>
						</div>

						<div class="col l6">								
							<div class="file-field input-field l6">
								<div class="btn z-depth-0" style="background-color:#094984; color:white; font-weight: 400; text-transform: uppercase;font-weight: 400;">
									<span>Examinar</span>
									<input type="file" name="archivo">            

								</div>
								<div class="file-path-wrapper">
									<input class="file-path validate" type="text">
									<span class="helper-text" data-error="wrong" data-success="right">Formato aceptado: PDF</span>
								</div>
							</div>
						</div>
					</div>

					<div class="row">						
						<div class="col l6 offset-l6">
							<button type="button" id="atras" class="btn center z-depth-0" style="margin-top: 20px; background-color:white; color:#094984; border:1px solid #094984; text-transform: uppercase; font-weight: 400;">Anterior</button>
							<button type="submit" id="botonSiguienteAnterior" class="btn right z-depth-0" style="margin-top: 20px; color:white; font-weight: 400; text-transform: uppercase;font-weight: 400; background-color: #094984">Enviar</button>
						</div>
					</div>

				</div>
			</div>
		</form>


	</div>

@endsection
	@section('script')

		<script>

			$(document).ready(function() {

				$('#siguiente').click(function(event) {

					if($('input[name=nombre]').val()!=''||$('input[name=localidad]').val()!=''||$('input[name=telefono]').val()!=''||$('input[name=email]').val()!='')

					{

						document.getElementById("estado1").className = "animated bounceOutLeft";

						setTimeout(function(){

							$("#estado1").hide('fast', function() {});

							$("#estado2").show('fast', function() {});

							document.getElementById("estado2").className = "animated bounceInRight";

						}, 1000);

						$('#presupuesto').removeClass('gris');

						$('#datos').addClass('gris');

					}

				});



				$('#atras').click(function(event) {

					document.getElementById("estado2").className = "animated bounceOutRight";



					setTimeout(function(){

						$("#estado2").hide('fast', function() {});

						$("#estado1").show('fast', function() {});

						document.getElementById("estado1").className = "animated bounceInLeft";

					}, 1000);



					$('#datos').removeClass('gris');

					$('#presupuesto').addClass('gris');

				});



				function animacion(id, clase) {

					$(id).removeClass("animated "+clase).addClass(clase + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){

						$(this).removeClass("animated "+clase);

					});

				};
			});

		</script>
	@stop




