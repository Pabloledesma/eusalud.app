    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-inverse navbar-static-top">


                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="http://www.eusalud.com">Inicio</a></li>
                        <!-- Esta información esta repetida en el portal de Joomla
                        <li><a href="{{ url('quienes-somos') }}">Quienes somos</a></li>
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Servicios <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Clínica Materno Infantil(CMI)</a></li>
                                <li><a href="#">Traumatología y Ortopedia</a></li>
                                <li><a href="#">Clínica de pacientes crónicos</a></li>
                            </ul>

                        </li>


                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Nuestras Clinicas <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('nuestras-clinicas/traumatologia') }}">Traumatología y Ortopedia</a></li>
                                <li><a href="{{ url('nuestras-clinicas/materno_infantil') }}">Materno Infantil</a></li>
                                <li><a href="{{ url('nuestras-clinicas/pacientes_cronicos') }}">Pacientes Crónicos</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ url('contacto') }}">Contacto</a></li>-->
                        @if( Auth::guest() )
                        <li><a href="{{ url('/auth/login') }}">Iniciar Sesión</a></li>

                        @else
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Informes <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                @if( \Auth::user()->user_type == 'Provider' || \Auth::user()->user_type == 'Super Admin' )
                                    <li><a href="{{ url('info/form_certificado_pagos_profesionales') }}">Certificado de pagos a profesionales de la salud</a></li>
                                    <li><a href="{{ url('info/form_certificado_ica') }}">Certificado de retensión industria y comercio (ICA)</a></li>
                                @endif
                                @if( \Auth::user()->user_type != 'User' )
                                    <li><a href="{{ url('info/form_pago_proveedores') }}">Informe de pago a proveedores</a></li>
                                @endif
                                <li><a href="{{ url('info/censo') }}">Censo</a></li>
                                <!--<li><a href="#">Facturación bruta</a></li>
                                <li><a href="#">Radicación</a></li>
                                <li><a href="#">Ordenes de Compra</a></li>
                                <li><a href="#">Consulta y entrega</a></li>
                                <li><a href="#">Egresos</a></li>
                                <li><a href="#">Ingresos</a></li>
                                <li><a href="#">Movimientos de bodega</a></li>
                                <li><a href="#">Procedimientos</a></li>
                                <li><a href="#">Tiempo de atención</a></li>
                                <li><a href="#">Censo</a></li>
                                <li><a href="#">Bodega inventario</a></li>
                                <li><a href="#">Cuentas 4, 5 y 6</a></li>
                                <!--                        <li class="divider"></li>-->

                            </ul>
                        </li>

                        <li class='user-menu'>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ \Auth::user()->name }}</a>
                            <ul class="dropdown-menu" role="menu">
                                @if( \Auth::user()->user_type == "Super Admin" )
                                <li>
                                    <a href="{{ url('usuarios') }}">Usuarios</a>             
                                </li>
                                @endif

                                <li><a href="{{ url('/auth/logout') }}">Cerrar Sesión</a></li>
                            </ul>
                        </li>    

                        @endif

                    </ul>
                </div>
            </nav>
        </div>
    </div>
