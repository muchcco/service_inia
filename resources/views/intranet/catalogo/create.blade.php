@extends('layout.layout')

@section('estilo')
<link href="{{ asset('https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css')}}" rel="stylesheet" />

    <style>
        .center{
            display: flex;
            justify-content: center
        }
        .panel-heading{
            border-bottom: 1px solid #25476a;
        }
        
    </style>

@endsection

@section('content')
    
<div id="page-head">
                    
    <!--Page Title-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div id="page-title">
        <h1 class="page-header text-overflow">CREAR CARPETA</h1>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End page title-->


    <!--Breadcrumb-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <ol class="breadcrumb">
    <li><a href=" {{ url('/') }} "><i class="fas fa-home"></i></a></li>
    <li><a href="#">Crear Carpeta</a></li>
    </ol>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End breadcrumb-->

</div>

<div id="page-content">
    <!-- mensjaje -->
        @if(\Session::has('warnign'))
        <div class=" alert alert-danger " style="margin-top: 1em;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @if(\Session::has('success'))
        <div class=" alert alert-success " style="margin-top: 1em;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>

            <p> {{ \Session::get('success') }} </p>
        </div>
        @endif
    {{-- fin de mensaje --}}



    <!-- Add Row -->
    <!--===================================================-->
    <div class="row center"> 
        <div class="col-sm-10 ">       
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">
                    Crear Nueva Carpeta</h3>
                </div>

                <form class="form" action=" {{ route('intranet.catalogo.store') }} " method="post">
                    {{ csrf_field() }}
                    <div class="panel-body">
                        <div class="row center">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">Servicio:</label>
                                    <select class="servicio form-control" name="state" id="IdTipo">
                                        <option value="" selected="selected" disabled="true">-- Seleccione una opción --</option>
                                        @foreach( $tipos as $tipo )
                                            <option value=" {{ $tipo->id_tipo }} "> {{ $tipo->nombre }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">Analisis:</label>
                                    <select class="analisis form-control" name="id_subtipo" id="IdSubTipo">
                                        <option value="" selected="selected" disabled="true"> No ha seleccionado un servicio </option>
                                    
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">Caracteristica: </label><br/>
                                    <input type="text" name="caracteristica" class="form-control" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer text-right">
                        <button class="btn btn-danger" type="submit">Guardar</button>
                    </div>
                </form>
                

            </div>
        </div>
    </div>
</div>

   

@endsection


@section('script')
<script src="{{ asset('https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js')}}"></script>

<script>
    
    $(document).ready(function () {   
        //select 2
            var $disabledResults = $(".servicio");
            $disabledResults.select2();

            var $disabledResults = $(".analisis");
            $disabledResults.select2();

        //Cargar combo de subtipos
            $("#IdTipo").change(function(){
                $.ajax({
                    url: "{{ route('intranet.catalogo.subtipos') }}?id=" + $(this).val(),
                    method: 'GET',
                    success: function(data) {
                        console.log(data);
                        
                        var opciones = "";
                        for (let i = 0; i < data.length; i++) {                            
                            data[i].id_subtipo;
                            console.log(data[i].id_subtipo);
                            opciones = `${opciones}<option value="${data[i].id_subtipo}" > ${ data[i].nombre} </option>`
                        }
                        $('#IdSubTipo').html(opciones);
                    }
                });
            });


    })    
        
</script>

@endsection
