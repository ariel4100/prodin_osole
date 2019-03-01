@extends('adm.layouts.app')

@section('content')
<div class="container" id="container-fluid">
    <div class="row">
        <div class="col s12">
            <nav>
                <div class="nav-wrapper grey">
                    <div class="col s12">
                        <a href="#!" class="breadcrumb">Home</a>
                        <a href="#!" class="breadcrumb">Informacion</a>
                    </div>
                </div>
            </nav>
            <h5>Información en HOME</h5>
            <div class="divider"></div>
            <table class="index-table responsive-table ">
                <tbody>
                @if($informacion)
                    <tr>
                        <td><b>Título 1</b></td>
                        <td>{!! $informacion->titulo1 !!}</td>
                    </tr>
                    <tr>
                        <td><b>Título 2</b></td>
                        <td>{!! $informacion->titulo4 !!}</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <a href=" {{ action('HomeController@editInformacion', $informacion->id)}} " class="btn-floating btn-large waves-effect waves-light orange right"><i class="fas fa-pencil-alt"></i></a>
                        </td>
                    </tr>
                @else
                    <tr>
                        <td  >No existen registros</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
