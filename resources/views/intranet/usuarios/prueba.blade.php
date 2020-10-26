@extends('layout.layout')

@section('estilo')

 <!--DataTables [ OPTIONAL ]-->
 <link href="{{ asset('//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css')}}" rel="stylesheet">

@endsection

@section('content')

<div id="page-head">
                    
    <!--Page Title-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div id="page-title">
        <h1 class="page-header text-overflow">USUARIOS</h1>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End page title-->


    <!--Breadcrumb-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <ol class="breadcrumb">
    <li><a href=" {{ url('/intranet') }} "><i class="fas fa-home"></i></a></li>
    <li><a href="#">Usuarios</a></li>
    </ol>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End breadcrumb-->

</div>

<div id="page-content">
    <!-- Add Row -->
    <!--===================================================-->
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Lista de usuarios registrados</h3>
        </div>

        <div id="demo-custom-toolbar2" class="table-toolbar-left" style="padding-left:1.5em;">
            <a href=" {{ route('intranet.ingreso.create') }} " id="demo-dt-addrow-btn" class="btn btn-purple"><i class="demo-pli-plus"></i> Añadir Nuevo</a>
        </div>
        
        <br/>
    
        <div class="panel-body">
            <table id="TablaUsuario" class="table table-striped data-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th></th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Estacion</th>
                        <th>Rol</th>
                        <th>Estado</th>
                        <th class="min-desktop">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($usuarios as $usuario)
                    <tr>                       
                        <td> {{ $usuario->id }} </td>
                        <td> {{ $usuario->name }} </td>
                        <td> {{ $usuario->email }} </td>
                        <td> {{ $usuario->role->descripcion }} </td>
                        <td> {{ $usuario->id_sede }} </td>
                        <td> {{ $usuario->flag }} </td>
                        <td> </td>   
                    </tr>
                     @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection

@section('script')

<script>

</script>

 <!--DataTables [ OPTIONAL ]-->
 <script src="{{ asset('//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js')}}"></script>



@endsection