<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Servicios de los Laboratorios de Aguas y Suelos del Instituto Nacional de Innovación Agraria</title>


    <!--STYLESHEET-->
    <!--=================================================-->

    <!--Open Sans Font [ OPTIONAL ]-->
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700')}}" rel='stylesheet' type='text/css'>
    


    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="{{ asset('css\bootstrap.min.css')}}" rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="{{ asset('css/nifty.min.css')}}" rel="stylesheet">

     <!--fontasowome Stylesheet [ REQUIRED ]-->
     <link href="{{ asset('vendor/fontawesome/css/all.min.css')}}" rel="stylesheet">
     <script src="{{ asset('vendor/fontawesome/js/all.min.js')}}"></script>

    <!--=================================================-->

    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="{{ asset('plugins\pace\pace.min.css')}}" rel="stylesheet">
    <script src="{{ asset('plugins\pace\pace.min.js')}}"></script>

    
    <!--Demo [ DEMONSTRATION ]-->
    <link href="{{ asset('css/demo/nifty-demo.min.css')}}" rel="stylesheet">

    @yield('estilo')

    <style>
        .form-control{
            border:1px solid #909090;
        }
    </style>


</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->
<body>
    <div id="container" class="effect aside-float aside-bright mainnav-lg">
        
        <!--NAVBAR-->
        <!--===================================================-->
        <header id="navbar">
            <div id="navbar-container" class="boxed">

                <!--Brand logo & name-->
                <!--================================-->
                <div class="navbar-header">
                    <a href="index.html" class="navbar-brand">
                        <img src="{{ asset('img\logo.png')}}" alt="Nifty Logo" class="brand-icon">
                        <div class="brand-title">
                            <span class="brand-text">INIA</span>
                        </div>
                    </a>
                </div>
                <!--================================-->
                <!--End brand logo & name-->


                <!--Navbar Dropdown-->
                <!--================================-->
                <div class="navbar-content">
                    <ul class="nav navbar-top-links">

                        <!--Navigation toogle button-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li class="tgl-menu-btn">
                            <a class="mainnav-toggle" href="#">
                                <i class="fas fa-bars"></i>
                            </a>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End Navigation toogle button-->


                    </ul>
                    <ul class="nav navbar-top-links">
                   
                        <!--User dropdown-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li id="dropdown-user" class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                <span class="ic-user pull-right">
                                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                    <!--You can use an image instead of an icon.-->
                                    <img class="img-circle img-user media-object" src="{{ asset('img/profile-photos/1.png')}}" alt="Profile Picture">
                                    <!--<i class="fas fa-user"></i>-->
                                    
                                </span>
                                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                <!--You can also display a user name in the navbar.-->
                                <!--<div class="username hidden-xs">Aaron Chavez</div>-->
                                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            </a>


                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right panel-default">
                                <ul class="head-list">
                                    <li>
                                        <a href="#"><i class="fas fa-user"></i> Perfil</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fas fa-cog"></i> Configuración</a>
                                    </li>
                                    <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                <i class="fas fa-sign-out-alt"></i> Salir
                                            </a>
        
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End user dropdown-->
 
                        
                    </ul>
                </div>
                <!--================================-->
                <!--End Navbar Dropdown-->

            </div>
        </header>
        <!--===================================================-->
        <!--END NAVBAR-->

        <div class="boxed">

            <!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                
                 @yield('content')
                

            </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->


            
            <!--MAIN NAVIGATION-->
            <!--===================================================-->
            @include('contenedor.sidebar')
            <!--===================================================-->
            <!--END MAIN NAVIGATION-->

        </div>

        

        <!-- FOOTER -->
        <!--===================================================-->
            @include('contenedor.footer')
        <!--===================================================-->
        <!-- END FOOTER -->


        <!-- SCROLL PAGE BUTTON -->
        <!--===================================================-->
        <button class="scroll-top btn">
            <i class="pci-chevron chevron-up"></i>
        </button>
        <!--===================================================-->
    </div>
    <!--===================================================-->
    <!-- END OF CONTAINER -->


   
    
    
    <!--JAVASCRIPT-->
    <!--=================================================-->

    <!--jQuery [ REQUIRED ]-->
    <script src="{{ asset('vendor/js/jquery.min.js')}}"></script>


    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="{{ asset('js\bootstrap.min.js')}}"></script>

    <!--=================================================-->
    
    <!--Flot Chart [ OPTIONAL ]-->
    <script src="{{ asset('plugins\flot-charts\jquery.flot.min.js')}}"></script>
	<script src="{{ asset('plugins\flot-charts\jquery.flot.resize.min.js')}}"></script>
	<script src="{{ asset('plugins\flot-charts\jquery.flot.tooltip.min.js')}}"></script>


    <!--Sparkline [ OPTIONAL ]-->
    <script src="{{ asset('plugins\sparkline\jquery.sparkline.min.js')}}"></script>


    <!--Specify page [ SAMPLE ]-->
    <script src="{{ asset('js\demo\dashboard.js')}}"></script>

    <!--Begin::style-->
    @yield('script')
    <!--End::style-->

    <script>
        
        console.log("auth: Kevin Muchcco");
            
        </script>
        

</body>
</html>
