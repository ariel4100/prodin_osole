@extends('adm.layouts.app')

@section('content')
<div class="container" id="container-fluid">
    <div class="row">
        <div class="col s12">
            <nav>
                <div class="nav-wrapper grey">
                    <div class="col s12">
                        <a href="#!" class="breadcrumb">Home</a>
                        <a href="#!" class="breadcrumb">Categoria Destacados</a>
                    </div>
                </div>
            </nav>
            <h5>Categoria Destacados</h5>
            <div class="divider"></div>
            <table class="index-table-logos responsive-table ">
                <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Orden</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                @forelse($destacados as $d)
                    <tr>
                        <td style="width: 200px;"><img src="{{ asset('images/categoria/'.$d->categoria->file_image) }}"></td>
                        <td style="width: 100px;">{{ $d->categoria->nombre }}</td>
                        <td>{{ $d->orden }}</td>
                        <td>
                            <a href=" {{ action('CategoriaDestacadoController@edit', $d->id)}} " class="btn-floating btn-large waves-effect waves-light orange"><i class="material-icons">autorenew</i></a>
                            <a href=" {{ action('CategoriaDestacadoController@create')}} " class="btn-floating btn-large waves-effect waves-light orange"><i class="material-icons">add</i></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No existen registros</td>
                        <td>
                            <a href=" {{ action('CategoriaDestacadoController@create')}} " class="btn-floating btn-large waves-effect waves-light orange"><i class="material-icons">add</i></a>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
