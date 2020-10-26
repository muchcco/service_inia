@extends('layout.layout-front')

@section('estilo')

 <!--DataTables [ OPTIONAL ]-->
 <link href="{{ asset('//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css')}}" rel="stylesheet">

 

@endsection

@section('content')

<div class="row">
    <table id="TableIngreso" class="table table-striped data-table" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th></th>
                <th>Servicio</th>
                <th>Analisis</th>
                <th>Caracteristica</th>
                <th>Costo Analisis:</th>
                <th>Forma de Pago</th>
                <th>Plazo de Entrega</th>
                <th>Cantidad</th>
                
            </tr>
        </thead>
    </table>
</div>

@endsection


@section('script')
<script>    
   
   $(document).ready(function() {

        //cargar valores al datatable
        // Para que carguen la data por ajax ==  agregar datatable en:
        // composer.json - actualizar composer update/comando/
        // agregar datable al controlador

        var table = $('#TableIngreso').DataTable({
            "language": {"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"},
            processing: true,
            serverSide: true,
            ajax: "{{ route('estacion.index') }}",
            type: 'GET',
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'servicio', name: 'servicio'},
                {data: 'analisis', name: 'analisis'},
                {data: 'caracteristica', name: 'caracteristica'},
                {data: 'costo_analisis', name: 'costo_analisis'},
                {data: 'forma_pago', name: 'forma_pago'},
                {data: 'plazo_entrega', name: 'plazo_entrega'},
                {data: 'stock', name: 'stock'},
               // {data: 'action', name: 'action'},
                
            ]
        });console.log(table);
        

    });
</script>

<!--DataTables [ OPTIONAL ]-->
<script src="{{ asset('//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js')}}"></script>

@endsection