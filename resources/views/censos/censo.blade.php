@extends('eusalud2')
@section('content')
<div class="content no_border">
    <h1 style="text-align: center">CENSO MATERNO INFANTIL HOSPITALIZACIÓN PISO {{ $piso }}</h1>

    <table class="table-striped green">
        <tr>
            <th style="width:2%"><b>Número de cama</b></th>		
            <th style="width:3.25%"><b>ID</b></th>
            <th style="width:2%"><b>Tipo Id</b></th>
            <th style="width:3.25%">Primer Nombre</th>
            <th style="width:3%">Segundo Nombre</th>
            <th style="width:3%">Primer Apellido</th>
            <th style="width:3%">Segundo Apellido</th>
            <th style="width:10%">Fecha de Ingreso</th>
            <th style="width:10%">Fecha de nacimiento</th>
            <th style="width:2%">Edad</th>
            <th style="width:2%">Sexo</th>
            <th style="width:2%">Consecutivo de Ingreso</th>
            <!--<th style="width:2%">Código de diagnostico</th>-->
            <!--<th style="width:29%">Diagnóstico</th>-->
            <th style="width:3%">Código de contrato</th>
            <th style="width:20%">Nombre del Contrato</th>
        </tr>
        @foreach($info as $row)
        <tr>
            <td>{{$row->MPNumC}}</td>
            <td>{{$row->MPUced}}</td>
            <td>{{$row->MPUDoc}}</td>
            <td>{{$row->MPNom1}}</td>
            <td>{{$row->MPNom2}}</td>
            <td>{{$row->MPApe1}}</td>
            <td>{{$row->MPApe2}}</td>
            <td>{{str_replace( "00:00:00.000", "", $row->MPFchI )}}</td>
            <td>{{str_replace( "00:00:00.000", "", $row->MPFchN )}}</td>
            <td>{{$row->EDAD}}</td>
            <td>{{$row->MPSexo}}</td>
            <td>{{$row->MPCtvIn}}</td>
            <!--<td>{{$row->MPUdx}}</td>-->
            <!--<td style="font-size: 0.8em">{{ substr($row->DMNomb, 0, 40) . "..."}}</td>-->
            <td>{{$row->IngNit}}</td>
            <td style="font-size: 0.8em">{{ substr($row->MENOMB, 0, 50) . "..." }}</td>
        </tr>
        @endforeach
    </table> 
</div>

@stop


