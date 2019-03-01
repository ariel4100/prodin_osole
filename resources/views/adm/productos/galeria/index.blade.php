@extends('adm.layouts.app')

@section('content')
<div class="container" id="container-fluid">
    <div class="row">
        <div class="col s12">
        <h5>Galeria de Imágenes | Producto: {!! $producto->nombre !!}</h5>
            <div class="row">
                <div class="right">
                    <a href=" {{ action('GaleriaController@create', $producto->id)}} " class="btn waves-effect waves-light orange"><i style="font-size: 15px" class="fas fa-plus-circle"></i>AGREGAR</a>
                </div>
            </div>

            <div class="divider"></div>

            <div class="col s12" style="margin-top: 5%">
                <table class="index-table responsive-table ">
                    <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($producto->galerias as $g)

                        <tr>
                            <td style="width: 350px"><img src=" {{ asset('images/productos/galeria/'.$g->file_image)}} " alt=""></td>
                            <td>
                                <a href=" {{ action('GaleriaController@edit', $g->id)}} " class="btn-floating btn waves-effect waves-light orange"><i style="font-size: 15px" class="fas fa-pencil-alt"></i></a>
                                <a onclick="return confirm('¿Realmente desea eliminar este registro?')"  href="{{ action('GaleriaController@eliminar', $g->id)}}" class="btn-floating btn waves-effect waves-light teal"><i class="material-icons">delete</i></a>
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="3">No se consiguieron registros</td>
                        </tr>

                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="right" style="padding: 2%">
                    <a href="{{ action('ProductoController@index', $producto->id)}}" class="waves-effect waves-light btn">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
