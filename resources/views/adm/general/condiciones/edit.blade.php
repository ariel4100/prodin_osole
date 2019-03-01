@extends('adm.layouts.app')

@section('content')
	<div class="container" id="container-fluid">
		<div class="row">
			<div class="col s12">

				<h5>Informacion</h5>
				<div class="divider"></div>

				<form method="POST"  enctype="multipart/form-data" action="{{action('CondicionController@update', $condicion->id)}}" class="col s12 m8 offset-m2 xl10 offset-xl1">
					{{ csrf_field() }}
					{{ method_field('PUT')}}

					<div class="row">

						<div class="row">

							<div class="col s12">
								<h6 for="textarea1">Descripción</h6>
							</div>
							<div class="input-field col s12">
								<textarea id="descripcion" name="descripcion"> {{ $condicion->descripcion }} </textarea>
							</div>

						</div>
						<div class="right">
							<a href="{{ action('CondicionController@edit', '1') }}" class="waves-effect waves-light btn btn-color">Cancelar</a>
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
		CKEDITOR.replace('descripcion');

		CKEDITOR.config.height = '150px';

		CKEDITOR.config.width = '100%';


	</script>
@stop