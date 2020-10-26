<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Servicios de los Laboratorios de Aguas y Suelos del Instituto Nacional de Innovación Agraria</title>

    <link rel="canonical" href="{{ asset('https://getbootstrap.com/docs/4.5/examples/album/')}}">
    @yield('estilo')
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css')}}" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

     <!--fontasowome Stylesheet [ REQUIRED ]-->
     <link href="{{ asset('vendor/fontawesome/css/all.min.css')}}" rel="stylesheet">
     <script src="{{ asset('vendor/fontawesome/js/all.min.js')}}"></script>

     
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .jumbotron{
        background-image: url("{{ asset('img/img-soft.png')}}") ;
        background-repeat: no-repeat;
        background-position: center;

      }

      .album{
        background: linear-gradient(rgba(255,255,255,.8), rgba(255,255,255,.8)), url("{{ asset('img/web-site.jpg')}}");
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="album.css" rel="stylesheet">
  </head>
  <body>
    <header>
      <!-- A grey horizontal navbar that becomes vertical on small screens -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Servicios de los Laboratorios de Aguas y Suelos del INIA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
          </ul>
          <div class="form-inline my-2 my-lg-0">
            <a href=" {{ url('login') }} " class="btn btn-outline-light my-2 my-sm-0" type="submit"><i class="fas fa-lock"></i> INICIAR SESION</a>
          </div>
        </div>
      </nav>
</header>

<main role="main">

  <section class="jumbotron text-center" >
    <div class="container" style="height: 15em;">
      <h1></h1>
      <p class="lead text-muted"></p>
      
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

        @yield('content')
      
    </div>
  </div>

</main>

<footer class="text-muted">
  <div class="container">
    <p class="float-right">
      <a href="#">Subir</a>
    </p>
    <p>Instituto Nacional de Innovación Agraria &copy; 2020 - Unidad de Informática.</p>
   
  </div>
</footer>
<script src="{{ asset('vendor/js/jquery.min.js')}}"></script>
<script src="{{ asset('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js')}}" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<!--Begin::style-->
@yield('script')
<!--End::style-->
</html>
