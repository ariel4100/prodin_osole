<nav>
    <div class="col s12" id="seccion-active">
        <div class="col s3">
            <a href="/" class="brand-logo">
                <img src="{{ asset('images/logo.png') }}" alt="">
            </a>
        </div>
        <div class="col s9 right" style="margin-right: 85px">
            <ul class="hide-on-med-and-down" style="display: flex; justify-content: right; align-items: center; height: 0;">
                <li style="float: left;"><i class="fab fa-whatsapp fs14" style="font-size: 15px; color: #25d366; line-height: unset; padding-right: 5px"></i>15 6528 - 0542</li>
                <li style="float: left;"><i class="material-icons" style="font-size: 15px; float: left; color: #2DC5EE; line-height: unset; padding-right: 5px" >phone_in_talk</i>011 2062 - 1307</li>
                <li style="float: left;"><i class="material-icons" style="font-size: 15px; float: left;  line-height: unset; padding-right: 5px; color: #2DC5EE;">mail_outline</i>prodin@prodinautamocion.com.ar</li>
            </ul>
        </div>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <div class="col s9" style="width: 95%">
            <ul class="right hide-on-med-and-down ">
                <li><a href="{{ route('empresa.page') }}" >EMPRESA</a></li>
                <li><a href="{{ route('productos.page') }}">PRODUCTOS</a></li>
                <li><a href="{{ route('servicios.page') }}">SERVICIOS</a></li>
                <li><a href="{{ route('presupuesto.page') }}">SOLICITUD DE PRESUPUESTO</a></li>
                <li><a href="{{ route('contacto.index') }}">CONTACTO</a></li>
                <li>
                    <a href="/" class="btn-floating btn-large waves-effect waves-light" style="background-color: #2DC5EE;width: 35px;height: 35px;">
                        <i style="line-height:37px;" class="material-icons">search</i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<ul class="sidenav" id="mobile-demo">
    <li><a href="{{ route('empresa.page') }}">EMPRESA</a></li>
    <li><a href="{{ route('productos.page') }}">PRODUCTOS</a></li>
    <li><a href="{{ route('servicios.page') }}">SERVICIOS</a></li>
    <li><a href="{{ route('presupuesto.page') }}">SOLICITUD DE PRESUPUESTO</a></li>
    <li><a href="{{ route('contacto.index') }}">CONTACTO</a></li>
</ul>
