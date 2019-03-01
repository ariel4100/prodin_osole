<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('auth.login');
});
*/
Route::get('/', 'SeccionHomeController@index');
Route::get('/search', 'SeccionHomeController@buscador');

Route::get('/empresa', 'SeccionEmpresaController@index')->name('empresa.page');
Route::get('/productos', 'SeccionProductoController@index')->name('productos.page');
Route::get('/productos/listar/{id}', 'SeccionProductoController@listar')->name('listar.page');
Route::get('/productos/show/{id}', 'SeccionProductoController@show')->name('show.page');
Route::get('/presupuesto', 'SeccionPresupuestoController@index')->name('presupuesto.page');
Route::post('enviarpresupuesto', 'SeccionPresupuestoController@store')->name('enviarpresupuesto');
Route::get('/servicios', 'SeccionServicioController@index')->name('servicios.page');
Route::resource('/contacto', 'SeccionContactoController');

//Producto-Descarga
Route::get('/productoDown/{file}', function ($file) {
    return Storage::download("productos/$file");
})->name('producto-down');

Route::prefix('adm')->group(function (){
    Route::get('/', function () {
        return view('auth.login');
    });
    Auth::routes();
});
//Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->prefix('adm')->group(function (){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/home/informacion', 'HomeController@indexInformacion')->name('home.info');
    Route::get('/home/informacion/{id}/edit', 'HomeController@editInformacion')->name('home.info.edit');
    Route::put('home/informacion/{id}', 'HomeController@update');
    //Route::get('/home/slider', 'SliderController@index')->name('slider.index');
    // Admin Destacados
    Route::get('home/destacados/productos', 'ProductoDestacadoController@index')->name('destacado.productos');
    Route::get('home/destacados/productos/crear', 'ProductoDestacadoController@create')->name('destacado.productos.create');
    Route::post('home/destacados/productos/store', 'ProductoDestacadoController@store')->name('destacado.productos.store');
    Route::get('home/destacados/productos/{id}/edit', 'ProductoDestacadoController@edit')->name('destacado.productos.edit');


    Route::get('home/destacados/categorias', 'CategoriaDestacadoController@index')->name('destacado.categoria');
    Route::get('home/destacados/categorias/crear', 'CategoriaDestacadoController@create')->name('destacado.categoria.create');
    Route::post('home/destacados/categoria/store', 'CategoriaDestacadoController@store')->name('destacado.categoria.store');
    Route::post('home/destacados/categorias/{id}/edit', 'CategoriaDestacadoController@edit')->name('destacado.categoria.edit');


    //Ruta para la seccion Empresa
    Route::get('/empresa', 'EmpresaController@index')->name('empresa');
    Route::get('/empresa/{id}/edit', 'EmpresaController@edit')->name('empresa.edit');
    Route::put('/empresa/{id}', 'EmpresaController@update');


    //Ruta para la seccion Productos
    Route::resource('/productos', 'ProductoController')->except([
        'show',
    ]);
    Route::prefix('producto')->group(function ()
    {

        //Ruta para la seccion Categoria
        Route::resource('/categorias', 'CategoriaController')->except([
            'show',
        ]);

        //Ruta para la seccion Galeria
        Route::prefix('galerias/')->group(function () {
            Route::get('index/{id}', 'GaleriaController@index');
            Route::get('create/{id}', 'GaleriaController@create');
            Route::post('store', 'GaleriaController@store');
            Route::get('edit/{id}', 'GaleriaController@edit');
            Route::put('update/{id}', 'GaleriaController@update');
            Route::get('delete/{id}', 'GaleriaController@eliminar');
        });
    });


    Route::resource('servicio', 'ServicioController')->except(['show']);
    Route::get('delete/{id}', 'ServicioController@eliminar');

    //Ruta para la gestión de contacto y redes
    Route::prefix('datos')->group(function () {
        Route::get('contacto', 'ContactoController@contacto')->name('contacto.index.adm');
        Route::get('contacto/edit/{id}', 'ContactoController@editContacto');
        Route::put('update/{id}', 'ContactoController@update');
    });

    // Admin Marcas
    Route::prefix('marcas/')->group(function () {
        Route::resource('marca', 'MarcaController')->except(['show']);
        Route::get('delete/{id}', 'MarcaController@eliminar');
    });
    //Ruta para la gestión de sliders
    Route::get('{seccion}/slider/', 'SliderController@index');
    Route::get('{seccion}/slider/crear/', 'SliderController@create');
    Route::post('{seccion}/slider/guardar', 'SliderController@store');
    Route::get('{seccion}/slider/edit/{id}', 'SliderController@edit');
    Route::put('{seccion}/slider/update/{id}', 'SliderController@update');
    Route::get('slider/delete/{id}', 'SliderController@eliminar');

    // Admin Marcas
    Route::prefix('home/')->group(function () {
        Route::get('enlace', 'EnlaceController@index')->name('enlace');
        Route::get('enlace/editar/{id}', 'EnlaceController@edit')->name('enlace.edit');
        Route::put('enlace/{id}/edit', 'EnlaceController@update')->name('enlace.update');

        Route::get('delete/{id}', 'EnlaceController@eliminar');
    });

    //Ruta para la gestión de logos
    Route::resource('logos', 'LogosController');
    //Ruta para la gestión de términos y condiciones
    Route::resource('general/condiciones', 'CondicionController');
    //Ruta para la gestión de metadatos
    Route::resource('metadatos', 'MetadatoController');

    // Admin Usuarios
    Route::prefix('usuarios/')->group(function () {
        Route::resource('user', 'UserController')->except(['show']);
        Route::get('delete/{id}', 'UserController@eliminar');
    });

});