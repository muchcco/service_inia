@extends('layout.layout')

@section('estilo')

 <!--DataTables [ OPTIONAL ]-->
 <link href="{{ asset('//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css')}}" rel="stylesheet">

@endsection

@section('script')

<script>

function ajaxRequest(url, type, data, successFunction){
    $.ajax({
        url: url,
        method: type,
        data: data,
        success: successFunction
    });
}



$(document).ready(function() {
    TablaUsuario();    
});

// CARGA LOS DATOS DEL DATABLE
var TablaUsuario = () => { 
    $('#TablaUsuario').DataTable({
        "language": {"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"},
        processing: true,
        serverSide: true,
        stateSave: true,
        "bDestroy": true,
        ajax: "{{ route('intranet.usuarios.listar') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nombres', name: 'nombres'},
            {data: 'email', name: 'email'},
            {data: 'denominacion', name: 'denominacion'},           
            {data: 'nombre_sede', name: 'nombre_sede'},    
            {
                data: 'flag',
                    render: function(data, type, row){
                        return data == '1' ? '<p class="label label-table label-success">Activo</p>' : '<p style="color:red">No Activo</p>'
                    }
            },
           {data: 'action', name: 'action'},
        ]
    });
 }


// CARGA DATOS DEL FOERMULARIO CREAR
var agregarUsuario = () => {
    $.ajax({
        type:'get',
        url:"{{ route('intranet.usuarios.modal.create') }}",
        dataType: "json",
        data:{},
        success:function(data){
            $("#modal_agregar_usuario").html(data.html);
            
            $("#modal_agregar_usuario").modal('show');
        }
    });
};

//EJECUTA EL BOTON GUARDAR DEL FORMULARIO
$(document).on('click', '#btn_guardar_usuario', function(){
    var createForm = $("#UserForm");
    ajaxRequest(
        "{{ route('intranet.usuarios.store') }}",
        'POST',
        createForm.serializeArray(),
        function(response){
            console.log(response);            
            TablaUsuario()
            $("#modal_agregar_usuario").modal('hide');

    });
})

var MayusculaGuiones = (valor) => {
    valor.value = valor.value.toUpperCase();
    valor.value = valor.value.replace(/\s/g," ");
    console.log(valor);

    //javascript:this.value=this.value.toUpperCase();
}



</script>

 <!--DataTables [ OPTIONAL ]-->
 <script src="{{ asset('//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js')}}"></script>



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
            <button type="button" class="btn btn-purple btn-elevate btn-icon-sm" data-toggle="modal" onclick="agregarUsuario()">
                <i class="demo-pli-plus"></i> Añadir Nuevo
              </button>
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
            </table>
        </div>
    </div>
</div>

<!--begin: Modal crear usuario-->
<div class="modal fade" id="modal_agregar_usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

</div>
<!--end: Modal crear usuario-->
<!--begin: Modal crear usuario-->
<div class="modal fade" id="modal_editar_subtipo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

</div>
<!--end: Modal crear usuario-->

@endsection

