@extends('adm.layouts.app')

@section('content')
<div class="container" id="container-fluid">
    <div class="row">
        <div class="col s12">
            <nav>
                <div class="nav-wrapper grey">
                    <div class="col s12">
                        <a href="{{ route('home') }}" class="breadcrumb">Home</a>
                        <a href="{{ route('contacto.index') }}" class="breadcrumb">Contacto</a>
                    </div>
                </div>
            </nav>
            <h5>Información de Contacto</h5>
            <div class="divider"></div>
            <table class="index-table responsive-table ">
                <thead>
                <tr>
                    <th>
                        Tipo
                    </th>
                    <th>
                        Descripción
                    </th>
                    <th>
                        Opciones
                    </th>
                </tr>
                </thead>
                <tbody>
                @if($telefono_1)
                    <tr>
                        <td><b>N° de Teléfono 1</b></td>
                        <td>{{ $telefono_1->descripcion }}</td>
                        <td >
                            <a href=" {{ action('ContactoController@editContacto', $telefono_1->id)}} " class="btn-floating btn-large waves-effect waves-light orange right"><i class="fas fa-pencil-alt"></i></a>
                        </td>
                    </tr>
                @endif
                @if($telefono_2)
                    <tr>
                        <td><b>N° de Teléfono 2</b></td>
                        <td>{{ $telefono_2->descripcion }}</td>
                        <td >
                            <a href=" {{ action('ContactoController@editContacto', $telefono_2->id)}} " class="btn-floating btn-large waves-effect waves-light orange right"><i class="fas fa-pencil-alt"></i></a>
                        </td>
                    </tr>
                @endif
                @if($telefono_3)
                    <tr>
                        <td><b>N° de Teléfono 3</b></td>
                        <td>{{ $telefono_3->descripcion }}</td>
                        <td >
                            <a href=" {{ action('ContactoController@editContacto', $telefono_3->id)}} " class="btn-floating btn-large waves-effect waves-light orange right"><i class="fas fa-pencil-alt"></i></a>
                        </td>
                    </tr>
                @endif
                @if($email)
                    <tr>
                        <td><b>Correo Electrónico</b></td>
                        <td>{{ $email->descripcion }}</td>
                        <td >
                            <a href=" {{ action('ContactoController@editContacto', $email->id)}} " class="btn-floating btn-large waves-effect waves-light orange right"><i class="fas fa-pencil-alt"></i></a>
                        </td>
                    </tr>
                @endif
                @if($direccion)
                    <tr>
                        <td><b>Dirección</b></td>
                        <td>{{ $direccion->descripcion }}</td>
                        <td >
                            <a href=" {{ action('ContactoController@editContacto', $direccion->id)}} " class="btn-floating btn-large waves-effect waves-light orange right"><i class="fas fa-pencil-alt"></i></a>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
