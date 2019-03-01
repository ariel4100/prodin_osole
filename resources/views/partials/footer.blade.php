<footer class="page-footer" style="background-color: #094984">
    <div class="container">
        <div class="row">
            <div class="col l4 s12 footer-logo">
                <img src="{{ asset('images/logo.png') }}" alt="">
            </div>
            <div class="col l4 m6 s12 mt10">
                <div class="container">
                    <div class="row mb10" style="margin-bottom: 0px;">
                        <h5 class="" style="color: #2CC5ED">Mapa de Sitio</h5>
                    </div>
                    <div class="row mb10" style="margin-bottom: 0px;">
                        <div class="col s6">
                            <a href="/" style="color: white">Home</a>
                        </div>
                        <div class="col s6">
                            <a href="{{ route('presupuesto.page') }}" style="color: white">Solicitud de Presupuesto</a>
                        </div>
                    </div>
                    <div class="row mb10">
                        <div class="col s6">
                            <a href="{{ route('empresa.page') }}" style="color: white">Empresa</a>
                        </div>

                    </div>
                    <div class="row mb10">
                        <div class="col s6">
                            <a href="{{ route('productos.page') }}" style="color: white">Productos</a>
                        </div>
                        <div class="col s6">
                            <a href="{{ route('contacto.index') }}" style="color: white">Contacto</a>
                        </div>
                    </div>
                    <div class="row mb10">
                        <div class="col s6">
                            <a href="{{ route('servicios.page') }}" style="color: white">Servicios</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col l4 m6 s12 mt10">
                <h5 class="" style="color: #2CC5ED">Prodin Automacion</h5>
                <div class="row mb10">
                    <div class="col s1">
                        <i class="material-icons main-red">
                            location_on
                        </i>
                    </div>
                    <div class="col s11">

                        <a href=" " style="color: white">Liniers 2139 - Lanús Oeste
                            Prov. Buenos Aires</a>
                    </div>
                </div>
                <div class="row mb10">
                    <div class="col s1">
                        <i class="material-icons main-red">
                            phone_in_talk
                        </i>
                    </div>
                    <div class="col s11">
                        <a href="{{ route('servicios.page') }}" style="color: white">011 2062 - 1307
                            15 6528 - 0542</a>
                    </div>
                </div>
                <div class="row mb10">
                    <div class="col s1">
                        <i class="material-icons main-red">
                            mail_outline
                        </i>
                    </div>
                    <div class="col s6">
                        <a href="{{ route('servicios.page') }}" style="color: white">prodin@prodinautomacion.com.ar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="divider"  ></div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © 2019
            <a class="grey-text text-lighten-4 right" href="osole.es">BY OSOLE</a>
        </div>
    </div>
</footer>