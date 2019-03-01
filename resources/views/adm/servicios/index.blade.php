@extends('adm.layouts.app')

@section('content')
<div class="container" id="container-fluid">
    <div class="row">
        <div class="col s12">
            <nav>
                <div class="nav-wrapper grey">
                    <div class="col s12">
                        <a href="{{ route('home') }}" class="breadcrumb">Home</a>
                        <a href="{{ route('servicio.index') }}" class="breadcrumb">Servicios</a>
                    </div>
                </div>
            </nav>
            <h5>Servicios</h5>
            <div class="divider"></div>
            <table class="index-table responsive-table ">
                <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Orden</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                @forelse($servicios as $m)

                    <tr>
                        <td style="width: 350px"><img src="{{ asset('images/servicios/'.$m->file_image) }}"></td>
                        <td>{!! $m->nombre !!}</td>
                        <td>{{ $m->orden }}</td>
                        <td>
                            <a href=" {{ action('ServicioController@edit', $m->id)}} " class="btn-floating btn-large waves-effect waves-light orange"><i class="fas fa-pencil-alt"></i></a>
                            <a onclick="return confirm('¿Realmente desea eliminar este registro?')"  href=" {{ action('ServicioController@eliminar', ['id' => $m->id])}} " class="btn-floating btn-large waves-effect waves-light deep-orange"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No existen registros</td>
                    </tr>
                @endforelse
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
