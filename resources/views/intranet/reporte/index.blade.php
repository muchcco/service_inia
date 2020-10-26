@extends('layout.layout')

@section('estilo')

 <!--DataTables [ OPTIONAL ]-->
 <link href="{{ asset('//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css')}}" rel="stylesheet">
 <link rel="stylesheet" href="{{ asset('//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css')}}">
 

@endsection

@section('content')

<div id="page-head">
                    
    <!--Page Title-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div id="page-title">
        <h1 class="page-header text-overflow">Ingreso</h1>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End page title-->


    <!--Breadcrumb-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <ol class="breadcrumb">
    <li><a href=" {{ url('/') }} "><i class="fas fa-home"></i></a></li>
    <li><a href="#">Detalle</a></li>
    </ol>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End breadcrumb-->

</div>

<div id="page-content">
    <!-- Add Row -->
    <!--===================================================-->
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Elija la carpeta donde guardará el archivo</h3>
        </div>

        <div id="demo-custom-toolbar2" class="table-toolbar-left" style="padding-left:1.5em; width:70%;">
            <div class="col-md-4">
                <input type="date" name="from_date" id="from_date" class="form-control" placeholder="From Date"  />
            </div>
            <div class="col-md-4">
                <input type="date" name="to_date" id="to_date" class="form-control" placeholder="To Date"  />
            </div>
            <div class="col-md-4">
                <button type="button" name="filter" id="filter" class="btn btn-primary" onclick="execute_filter_date();" >Filter</button>
                <button type="button" name="refresh" id="refresh" class="btn btn-default">Refresh</button>
            </div>
        </div>
        
        <br/>
    
        <div class="panel-body">
            <table id="TableIngreso" class="table table-striped data-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Sede</th>
                        <th>Servicio</th>
                        <th>Analisis</th>
                        <th>Caracteristica</th>
                        <th>Cantidad</th>
                        <th>Monto en S/.</th>
                        <th>total</th>
                        <th class="min-desktop">Acciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>


@endsection

@section('script')
  
<script>
    
$(document).ready(function() {
   
    execute_filter_date();
    $('#refresh').on('click', function(){
		location.reload();
	});
    console.log(execute_filter_date);
});


var filter_date = ( from_date = '' , to_date = ''  ) => { 
    $('#TableIngreso').DataTable({
        "language": {"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"},
        processing: true,
        serverSide: true,
        stateSave: true,
        "bDestroy": true,
        ajax: {
            url: "{{ route('intranet.reporte.prueba') }}",
            type: 'get',
            data:{
                from_date: from_date ,to_date: to_date 
            }
        },
        columns: [
            {data: 'denominacion', name: 'denominacion'},
            {data: 'servicio', name: 'servicio'},
            {data: 'analisis', name: 'analisis'},
            {data: 'caracteristica', name: 'caracteristica'},           
            {data: 'cantidad', name: 'cantidad'},            
            {data: 'monto', name: 'monto'},
            {data: 'total', name: 'total'},
           {data: 'action', name: 'action'},
        ]
    });
 }

 var execute_filter_date = () =>{
       var from_date =  $('#from_date').val();
       var to_date = $('#to_date').val();
       filter_date(from_date, to_date ); 
        
    }


   
</script>



 <!--DataTables [ OPTIONAL ]-->
 <script src="{{ asset('//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js')}}"></script>
 <script src="{{ asset('https://code.jquery.com/ui/1.12.1/jquery-ui.js')}}"></script>



@endsection