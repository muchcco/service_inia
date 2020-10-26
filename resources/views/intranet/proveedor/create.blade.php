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
        <h1 class="page-header text-overflow">Proveedor</h1>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End page title-->


    <!--Breadcrumb-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <ol class="breadcrumb">
    <li><a href=" {{ url('/') }} "><i class="fas fa-home"></i></a></li>
    <li><a href=" {{ route('intranet.proveedor.index') }}">Lista de Proveedores</a></li>
    <li><a href="#">Nuevo Proveedor</a></li>
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
        <div class="col-sm-6 ">       
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">
                    Nuevo Proveedor</h3>
                </div>

                <form class="form" action="  " method="post">
                    {{ csrf_field() }}
                    <div class="panel-body">                        
                        <div class="row center">
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <label class="control-label">DNI: </label><br/>
                                    <input type="text" class="form-control" name="DNI" id="DNI" value="">
                                    <div class="">
                                        <button class="btn btn-success "  onclick="cargarDatos()" name="buscar" id="buscar"  style="color: #fff">Buscar</button>
        
                                    </div>
                                </div>
                            </div>  
                        </div>
                        <div class="row center">
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <label>Nombres</label>
						            <input type="text" class="form-control" id="Nombres" name="Nombres" readonly="readonly">
                                </div>
                            </div>  
                        </div>
                        <div class="row center">
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <label>Apellido Paterno</label>
						            <input type="text" class="form-control" id="ApePat" name="ApePat"  readonly="readonly">
                                </div>
                            </div>  
                        </div>
                        <div class="row center">
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <label>Apellido Materno</label>
					            	<input type="text" class="form-control" id="ApeMat" name="ApeMat"  readonly="readonly">
                                </div>
                            </div>  
                        </div>
                        <div class="row center">
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <label>Dirección</label>
					            	<input type="text" class="form-control" id="direccion" name="direccion"  readonly="readonly">
                                </div>
                            </div>  
                        </div>
                        <div class="row center">
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <label>Apellido Materno</label>
					            	<input type="text" class="form-control" id="email" name="email">
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
        
        //$( document ).ready(function() {
       // cargarDependencia()
    //cargar datos al al encontrar el dni

   // });

   function ajaxRequest(url, type, data, successFunction){
                        $.ajax({
                            url: url,
                            method: type,
                            data: data,
                            success: successFunction
                        });
                    }
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

    var  cargarDatos = () =>{

            DNI = document.getElementById("DNI").value;
            document.getElementById("buscar").innerHTML = "Buscando ";
            document.getElementById("buscar").disabled = true;
            ajaxRequest(
                "{{ route('intranet.proveedor.buscar') }}",
                'GET',
                {dni : DNI},
                function(response){
                    if (response[0]["codigo"] == null) {
                        document.getElementById("alerta_DNI").innerHTML = `<div class="alert alert-solid-danger alert-bold" role="alert">
                             <div class="alert-text">A ocurrido un error al buscar el DNI</div>
                         </div>`
                        document.getElementById("guardar_personal").disabled = true;
                        document.getElementById("buscar").innerHTML = "Buscar ";
                        document.getElementById("buscar").disabled = false;
                    }
                    if (response[0]["codigo"] == 1){
                        document.getElementById("alerta_DNI").innerHTML = `<div class="alert alert-solid-warning alert-bold" role="alert">
                             <div class="alert-text">El usuario ${response[0]["Nombres"]} ya fue registrado </div>
                         </div>`
                        document.getElementById("Nombres").value = response[0]["Nombres"];
                        document.getElementById("ApePat").value = response[0]["ApePat"];
                        document.getElementById("ApeMat").value = response[0]["ApeMat"];
                        document.getElementById("direccion").value = response[0]["direccion"];
                        document.getElementById("Email").value = response[0]["Email"];
                        document.getElementById("guardar_personal").disabled = true;
                        document.getElementById("buscar").innerHTML = "Buscar ";
                        document.getElementById("buscar").disabled = false;
                        return true;
                    }else {
                        if (response[0]["codigo"] == "0000"){
                            document.getElementById("alerta_DNI").innerHTML = ``;
                            document.getElementById("Nombres").value = response[0]["Nombres"];
                            document.getElementById("ApePat").value = response[0]["ApePat"];
                            document.getElementById("ApeMat").value = response[0]["ApeMat"];
                            document.getElementById("direccion").value = response[0]["direccion"];
                            document.getElementById("Email").value = "";
                            document.getElementById("guardar_personal").disabled = false;
                            document.getElementById("buscar").innerHTML = "Buscar ";
                            document.getElementById("buscar").disabled = false;
                            return true;
                        }
                    }


            });




        //console.log(document.getElementById("dni").value);
        //alert("!3")
    }

//VALIDAR FORMULARIO PERSONAL

    var validar_formulario_personal = () => {

        var personal = document.forms["crear_personal"]["Nombres"].value;

        if (personal == "") {

            document.getElementById('valid_personal').innerHTML = "Debe buscar un personal por su DNI"
            return false;
        }
        var dependencia = document.forms["crear_personal"]["IdDependencia"].value;



    }
        
        
</script>

@endsection
