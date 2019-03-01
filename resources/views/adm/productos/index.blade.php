@extends('adm.layouts.app')

@section('content')
<div class="container" id="container-fluid">
    <div class="row">
        <div class="col s12">
            <nav>
                <div class="nav-wrapper grey">
                    <div class="col s12">
                        <a href="{{ route('home') }}" class="breadcrumb">Home</a>
                        <a href="{{ route('productos.index') }}" class="breadcrumb">Productos</a>
                    </div>
                </div>
            </nav>
            <h5>Productos</h5>
            <div class="divider"></div>
            <table class="index-table-logos responsive-table ">
                <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Familia</th>
                    <th>Orden</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                @forelse($productos as $p)
                    <tr>
                        <td style="width: 150px;"><img src="{{ asset('images/productos/'.$p->file_image) }}"></td>
                        <td >{{ $p->nombre }}</td>
                        <td>
                            @if ($p->categoria)
                                {{ $p->categoria->nombre }}
                            @else
                                no tiene categoria
                            @endif
                        </td>
                        <td>{{ $p->orden }}</td>
                        <td>
                            <a href="{{ action('ProductoController@edit', $p->id)}}" class="btn-floating btn waves-effect waves-light orange"><i style="font-size: 15px" class="fas fa-pencil-alt"></i></a>
                            <a href="{{ action('GaleriaController@index', $p->id)}}" class="btn-floating btn waves-effect waves-light pink"><i style="font-size: 15px" class="fas fa-images"></i></a>
                            <form action="{{ route('productos.destroy', $p->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('¿Realmente desea eliminar este registro?')" type="submit" class="btn-floating btn  waves-effect waves-light red">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>

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
