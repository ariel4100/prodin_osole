
	<ul id="slide-out" class="sidenav sidenav-fixed">
		<div class="logo-admin">
			<a href="{{ url('adm/home') }}">
				<img class="responsive-img" src='{{ asset("images/logo_negro.png") }}' alt="">
			</a>
		</div>

		<div class="divider"></div>

			<li class="no-padding">
				<ul class="collapsible collapsible-accordion">
					<li class="bold"><a class="collapsible-header waves-effect waves-grey {{ (\Request::is('adm/home/*'))?"seccion-activa":"" }}" tabindex="0"  ><i class="material-icons">home</i>Home</a>
						<div class="collapsible-body" {{ (\Request::is('adm/home/*'))?"style=display:block;":"" }}>
							<ul>
								<li><a href="{{ route('home.info') }}"><i class="material-icons">navigate_next</i>Información</a></li>
								<li><a href="{{ route('destacado.productos') }}"><i class="material-icons">navigate_next</i>Productos Destacados</a></li>
								<li><a href="{{ route('destacado.categoria') }}"><i class="material-icons">navigate_next</i>Categorias Destacados</a></li>
								<li><a href="{{ action('EnlaceController@index') }}"><i class="material-icons">navigate_next</i>Ver Enlaces</a></li>
								<li><a href="{{ action('SliderController@create', ['seccion' => 'home']) }}"><i class="material-icons">navigate_next</i>Crear Sliders</a></li>
								<li><a href="{{ action('SliderController@index', ['seccion' => 'home']) }}"><i class="material-icons">navigate_next</i>Ver Sliders</a></li>
							</ul>							
						</div>
					</li>
				</ul>
				<ul class="collapsible collapsible-accordion">
					<li class="bold"><a class="collapsible-header waves-effect waves-grey {{ (\Request::is('adm/empresa*'))?"seccion-activa":"" }}" tabindex="0"  ><i class="material-icons">business</i>Empresa</a>
						<div class="collapsible-body"  {{ (\Request::is('adm/empresa*'))?"style=display:block;":"" }}>
							<ul>
								<li><a href="{{ route('empresa') }}"><i class="material-icons">navigate_next</i>Datos de la Empresa</a></li>
								<li><a href="{{ action('SliderController@create', ['seccion' => 'empresa']) }}"><i class="material-icons">navigate_next</i>Crear Sliders</a></li>
								<li><a href="{{ action('SliderController@index', ['seccion' => 'empresa']) }}"><i class="material-icons">navigate_next</i>Ver Sliders</a></li>
							</ul>
						</div>
					</li>
				</ul>
			 	<ul class="collapsible collapsible-accordion">
					<li class="bold"><a class="collapsible-header waves-effect waves-grey {{ (\Request::is('adm/producto*'))?"seccion-activa":"" }}" tabindex="0" ><i class="material-icons">shopping_cart</i>Productos</a>
						<div class="collapsible-body"  {{ (\Request::is('adm/producto*'))?"style=display:block;":"" }}>
							<ul>
								<li><a href="{{ route('productos.create') }}" ><i class="material-icons">navigate_next</i>Crear Producto</a></li>
								<li><a href="{{ route('productos.index') }}" ><i class="material-icons">navigate_next</i>Ver Productos</a></li>
								<li><a href="{{ route('categorias.create') }}" ><i class="material-icons">navigate_next</i>Crear Familias</a></li>
								<li><a href="{{ route('categorias.index') }}" ><i class="material-icons">navigate_next</i>Ver Familias</a></li>
							</ul>
						</div>
					</li>
				</ul>
				<ul class="collapsible collapsible-accordion">
					<li class="bold"><a class="collapsible-header waves-effect waves-grey {{ (\Request::is('adm/servicios*'))?"seccion-activa":"" }}" tabindex="0"  ><i class="fas fa-hand-holding-heart"></i> Servicios</a>
						<div class="collapsible-body"  {{ (\Request::is('adm/servicios*'))?"style=display:block;":"" }}>
							<ul>
								<li><a href="{{ route('servicio.create') }}"><i class="material-icons">navigate_next</i>Crear Servicios</a></li>
								<li><a href="{{ route('servicio.index') }}"><i class="material-icons">navigate_next</i>Ver Servicios</a></li>
							</ul>
						</div>
					</li>
				</ul>
				<ul class="collapsible collapsible-accordion">
					<li class="bold"><a class="collapsible-header waves-effect waves-grey {{ (\Request::is('adm/contactos*'))?"seccion-activa":"" }}" tabindex="0"  ><i class="material-icons">phone</i> Contactos</a>
						<div class="collapsible-body"  {{ (\Request::is('adm/contactos*'))?"style=display:block;":"" }}>
							<ul>
								<li><a href="{{ action('ContactoController@contacto') }}"><i class="material-icons">navigate_next</i>Datos de Contacto</a></li>
							</ul>
						</div>
					</li>
				</ul>
				<ul class="collapsible collapsible-accordion">
					<li class="bold"><a class="collapsible-header waves-effect waves-grey {{ (\Request::is('adm/marcas*'))?"seccion-activa":"" }}" tabindex="0"  ><i class="fab fa-bandcamp"></i>Marcas</a>
						<div class="collapsible-body"  {{ (\Request::is('adm/marcas*'))?"style=display:block;":"" }}>
							<ul>
								<li><a href="{{ action('MarcaController@create') }}"><i class="material-icons">navigate_next</i>Crear Marcas</a></li>
								<li><a href="{{ action('MarcaController@index') }}"><i class="material-icons">navigate_next</i>Ver Marcas</a></li>
							</ul>
						</div>
					</li>
				</ul>
				<!--
				<ul class="collapsible collapsible-accordion">
					<li class="bold"><a class="collapsible-header waves-effect waves-grey {{ (\Request::is('adm/logos*'))?"seccion-activa":"" }}" tabindex="0"  ><i class="fab fa-delicious"></i>Logos</a>
						<div class="collapsible-body"  {{ (\Request::is('adm/logos*'))?"style=display:block;":"" }}>
							<ul>
								<li><a href="{{ action('LogosController@index') }}"><i class="material-icons">navigate_next</i>Ver Logos</a></li>
							</ul>
						</div>
					</li>
				</ul>-->
				<ul class="collapsible collapsible-accordion">
					<li class="bold"><a class="collapsible-header waves-effect waves-grey {{ (\Request::is('adm/general*'))?"seccion-activa":"" }}" tabindex="0"  ><i class="fas fa-sliders-h"></i>General</a>
						<div class="collapsible-body"  {{ (\Request::is('adm/general*'))?"style=display:block;":"" }}>
							<ul>
								<li><a href="{{ action('CondicionController@edit', '1') }}"><i class="material-icons">navigate_next</i>Términos y Condiciones</a></li>
							</ul>
						</div>
					</li>
				</ul>
				<ul class="collapsible collapsible-accordion">
					<li class="bold"><a class="collapsible-header waves-effect waves-grey {{ (\Request::is('adm/metadatos*'))?"seccion-activa":"" }}" tabindex="0"  ><i class="material-icons">data_usage</i>Metadatos</a>
						<div class="collapsible-body"  {{ (\Request::is('adm/metadatos*'))?"style=display:block;":"" }}>
							<ul>
								<li><a href="{{ action('MetadatoController@index') }}"><i class="material-icons">navigate_next</i>Ver Metadatos</a></li>
							</ul>
						</div>
					</li>
				</ul>
				@if (Auth::user()->tipo_usuario == 'Administrador')
					<ul class="collapsible collapsible-accordion">
						<li class="bold"><a class="collapsible-header waves-effect waves-grey {{ (\Request::is('adm/usuarios/*'))?"seccion-activa":"" }}" tabindex="0"  ><i class="material-icons">people</i>Usuarios</a>
							<div class="collapsible-body"  {{ (\Request::is('adm/usuarios/*'))?"style=display:block;":"" }}>
								<ul>
									<li><a href="{{ route('user.create') }}"><i class="material-icons">navigate_next</i>Crear Usuario</a></li>
									<li><a href="{{ route('user.index') }}"><i class="material-icons">navigate_next</i>Editar Usuarios</a></li>
								</ul>
							</div>
						</li>
					</ul>
				@endif

			</li>
		</div>
	</ul>
<a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
