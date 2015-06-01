@extends('eusalud2')
@section('content')

<div class="container container-fluid">
    <div class='row col-md-8 col-md-offset-2'>
        <div class="panel panel-default">
            <div class="panel-heading">Informes</div>
            <div class="panel-body">
                
                <ul>
                    <li><a href="{{ url('info/form_certificado_pagos_profesionales') }}">Certificado de pagos a profesionales de la salud</a></li>
                    <li><a href="{{ url('info/form_pago_proveedores') }}">Formulario de pago a proveedores</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@stop
