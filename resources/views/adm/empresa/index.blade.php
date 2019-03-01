@extends('adm.layouts.app')

@section('content')
<div class="container" id="container-fluid">
    <div class="row">
        <div class="col s12">
            <nav>
                <div class="nav-wrapper grey">
                    <div class="col s12">
                        <a href="#!" class="breadcrumb">Home</a>
                        <a href="{{ route() }}" class="breadcrumb">Empresa</a>
                    </div>
                </div>
            </nav>
            <h5>Información EMPRESA</h5>
            <div class="divider"></div>
            <table class="index-table responsive-table ">
                <tbody>
                @if($empresa)
                    <tr>
                        <td><b>Imagen</b></td>
                        <td><img src="{{ asset('images/empresa/'.$empresa->file_image) }}"></td>
                    </tr>
                    <tr>
                        <td><b>Título 1</b></td>
                        <td>{{ $empresa->titulo1 }}</td>
                    </tr>
                    <tr>
                        <td><b>Descripcion</b></td>
                        <td>{!! $empresa->descripcion !!}</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <a href=" {{ action('EmpresaController@edit', $empresa->id)}} " class="btn-floating btn-large waves-effect waves-light orange right"><i class="fas fa-pencil-alt"></i></a>
                        </td>
                    </tr>
                @else
                    <tr>
                        <td colspan="2">No existen registros</td>
                    </tr>
                @endif
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
