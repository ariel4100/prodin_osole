@extends('adm.layouts.app')

@section('content')
<div class="container" id="container-fluid">
    <div class="row">
        <div class="col s12">
            <nav>
                <div class="nav-wrapper grey">
                    <div class="col s12">
                        <a href="{{ route('home') }}" class="breadcrumb">Home</a>
                        <a href="{{ route('categorias.index') }}" class="breadcrumb">Familia</a>
                    </div>
                </div>
            </nav>
            <h5>Familias</h5>
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
                @forelse($familias as $f)
                    <tr>
                        <td style="width: 350px;"><img src="{{ asset('images/categoria/'.$f->file_image) }}"></td>
                        <td >{{ $f->nombre }}</td>
                        <td>{{ $f->orden }}</td>
                        <td>
                            <a href=" {{ route('categorias.edit', $f->id)}} " class="btn-floating btn-large waves-effect waves-light orange"><i class="fas fa-pencil-alt"></i></a>
                            <form action="{{ route('categorias.destroy', $f->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('¿Realmente desea eliminar este registro?')" type="submit" class="btn-floating btn-large waves-effect waves-light red">
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
