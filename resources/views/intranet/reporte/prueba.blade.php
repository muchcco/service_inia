@extends('layout.layout')

@section('estilo')

  <!--DataTables [ OPTIONAL ]-->
  <link href="{{ asset('//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css')}}">
@endsection

@section('content')

<div id="page-content">
    <!-- Add Row -->
    <!--===================================================-->
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Elija la carpeta donde guardará el archivo</h3>
        </div>

     <br />
     <h3 align="center">Laravel 5.8 - Daterange Filter in Datatables with Server-side Processing</h3>
     <br />
            <br />
            <div class="row input-daterange">
                <div class="col-md-4">
                    <input type="date" name="from_date" id="from_date" class="form-control" placeholder="From Date"  />
                </div>
                <div class="col-md-4">
                    <input type="date" name="to_date" id="to_date" class="form-control" placeholder="To Date"  />
                </div>
                <div class="col-md-4">
                    <button type="button" name="filter" id="filter" class="btn btn-primary">Filter</button>
                    <button type="button" name="refresh" id="refresh" class="btn btn-default">Refresh</button>
                </div>
            </div>
            <br />
   <div class="table-responsive">
    <table class="table table-bordered table-striped" id="order_table">
           <thead>
            <tr>
                th>Sede</th>
                        <th>Servicio</th>
                        <th>Analisis</th>
                        <th>Caracteristica</th>
                        <th>Cantidad</th>
                        <th>Monto en S/.</th>
                        <th>total</th>
            </tr>
           </thead>
       </table>
   </div>
</div>
</div>
  @endsection

  @section('script')

<script>

$(document).ready(function(){
    
    var table = $('#TableIngreso').DataTable({
        "language": {"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"},
        processing: true,
        serverSide: true,
        ajax: "{{ route('intranet.reporte.prueba') }}",
        columns: [
            {data: 'denominacion', name: 'denominacion'},
            {data: 'servicio', name: 'servicio'},
            {data: 'analisis', name: 'analisis'},
            {data: 'caracteristica', name: 'caracteristica'},           
            {data: 'cantidad', name: 'cantidad'},            
            {data: 'monto', name: 'monto'},
            {data: 'total', name: 'total'},
            //{data: 'action', name: 'action'},
        ]
    });
});



</script>

@endsection

