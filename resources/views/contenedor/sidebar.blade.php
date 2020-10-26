<nav id="mainnav-container">
    <div id="mainnav">


        <!--OPTIONAL : ADD YOUR LOGO TO THE NAVIGATION-->
        <!--It will only appear on small screen devices.-->
       



        <!--Menu-->
        <!--================================-->
        <div id="mainnav-menu-wrap">
            <div class="nano">
                <div class="nano-content">

                    <!--Profile Widget-->
                    <!--================================-->
                    <div id="mainnav-profile" class="mainnav-profile">
                        <div class="profile-wrap text-center">
                            <div class="pad-btm">
                                <img class="img-circle img-md" src="{{ asset('img\profile-photos\1.png')}}" alt="Profile Picture">
                            </div>
                            <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                                <span class="pull-right dropdown-toggle">
                                    <i class="dropdown-caret"></i>
                                </span>
                                <p class="mnp-name"> {{  auth()->user()->name }} </p>
                                <span class="mnp-desc">{{  auth()->user()->email }}</span>
                            </a>
                        </div>
                        <div id="profile-nav" class="collapse list-group bg-trans">
                            <a href="#" class="list-group-item">
                                <i class="fas fa-user"></i> Ver Perfil
                            </a>
                            <a href="#" class="list-group-item">
                                <i class="fas fa-cog"></i> Configuración
                            </a>
                            <a href="#" class="list-group-item">
                                <i class="fas fa-sign-out-alt"></i> Salir
                            </a>
                        </div>
                    </div>



                    <ul id="mainnav-menu" class="list-group">
            
                        <!--Category name-->
                        <li class="list-header">Dashboard</li>
            
                        <!--Menu list item-->
                        <li class="@if (Request::is('intranet')) active-sub @endif">
                            <a href=" {{ route('intranet.index') }}">
                                <i class="fas fa-home"></i>
                                <span class="menu-title">Panel de Control</span>
                            </a>
                        </li>    
                        
                        <!--Category name-->
                        <li class="list-header">Modulos</li>
            
                        <!--Menu list item-->
                        <li class="@if (Request::is('intranet/ingreso')) active-sub @endif">
                            <a href=" {{ route('intranet.ingreso.index') }} ">
                                <i class="fa fa-database text-orange"></i>
                                <span class="menu-title">Ingreso</span>
                            </a>
                        </li> 
                        <li class="@if (Request::is('intranet/almacen')) active-sub @endif">
                            <a href=" {{ route('intranet.almacen.index') }} ">
                                <i class="fa fa-database text-orange"></i>
                                <span class="menu-title">Almacen</span>
                            </a>
                        </li> 
                        <li class="@if (Request::is('intranet/proveedor')) active-sub @endif">
                            <a href=" {{ route('intranet.proveedor.index') }} ">
                                <i class="fa fa-database text-orange"></i>
                                <span class="menu-title">Proveedor</span>
                            </a>
                        </li> 
                        <li class="@if (Request::is('intranet/reporte')) active-sub @endif">
                            <a href=" {{ route('intranet.reporte.index') }} ">
                                <i class="fa fa-database text-orange"></i>
                                <span class="menu-title">Reporte</span>
                            </a>
                        </li> 
                        @if( auth()->user()->hasRoles(['admin', 'moderador']))
                        <!--Category name-->
                        <li class="list-header">Catalogo</li>
            
                        <!--Menu list item-->
                        <li class="@if (Request::is('intranet/catalogo')) active-sub @endif">
                            <a href=" {{ route('intranet.catalogo.index') }} ">
                                <i class="fa fa-database text-orange"></i>
                                <span class="menu-title">Catalogo</span>
                            </a>
                        </li> 
                        <li class="@if (Request::is('intranet/catalogo/servicio')) active-sub @endif">
                            <a href=" {{ route('intranet.catalogo.servicio.index') }} ">
                                <i class="fa fa-database text-orange"></i>
                                <span class="menu-title">Servicio</span>
                            </a>
                        </li> 
                        <li class="@if (Request::is('intranet/catalogo/analisis')) active-sub @endif">
                            <a href=" {{ route('intranet.catalogo.analisis.index') }} ">
                                <i class="fa fa-database text-orange"></i>
                                <span class="menu-title">Analisis</span>
                            </a>
                        </li> 
                        @endif

                        @if( auth()->user()->hasRoles(['admin']))
                            <!--Users name-->
                            <li class="list-header">Usuario</li>

                            <li class="@if (Request::is('intranet/usuarios')) active-sub @endif">
                                <a href=" {{ route('intranet.usuarios.index') }} ">
                                    <i class="fa fa-database text-orange"></i>
                                    <span class="menu-title">Usuarios</span>
                                </a>
                            </li>
                        @endif


                </div>
            </div>
        </div>
        <!--================================-->
        <!--End menu-->

    </div>
</nav>