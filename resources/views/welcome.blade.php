@extends('layout.layout-front')

@section('content')


<div class="row">
  @foreach( $sedes as $sede )
    <div class="col-md-4">
      <div class="card mb-4 shadow-sm">
        <svg class="bd-placeholder-img card-img-top" width="100%" height="125" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>{{  $sede->denominacion }}</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"> {{  $sede->denominacion }} </text></svg>
        <div class="card-body"><div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
              <a  href="{{ route('estacion.tabla', ['idsede' => $sede->idsede]) }}"  type="button" class="btn btn-sm btn-outline-secondary">Ingresar</a>
            </div>
            <small class="text-muted">{{ $sede->cantidad_registros }}  registros</small>
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div>



@endsection