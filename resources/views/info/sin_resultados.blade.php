@extends('eusalud2')
@section('content')
<div class="container container-fluid">
    <h1>{{ $headerTitle }}</h1>
    <hr/>
    <div class="row">

        <h3>No se encontraron resultados para los datos ingresados</h3>
        <a href="{{ url('/info') }}">Regresar</a>
    </div>
</div>
@stop
