@extends('eusalud2')
@section('content')

<div class="container container-fluid">
    <h1>Informe de pago a proveedores</h1>
    <hr/>
    <div class="row">
        <form class="form-horizontal" role="form" method="post" id="form_cert_pag" action="{{ url('info/pago_proveedores') }}">

        @include('partials.form_profesionales_proveedores')    
@stop

