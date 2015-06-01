@extends('eusalud2')
@section('content')

<div class="container container-fluid">
    <h1>CERTIFICADO DE RETENCION INDUSTRIA Y COMERCIO (ICA)</h1>
    <hr/>
    <div class="row">
        <form target="_blanck" class="form-horizontal" role="form" method="post" id="form_cert_pag" action="{{ url('info/certificado_ica') }}">

        @include('partials.form_profesionales_proveedores')    
@stop
