@extends('eusalud_pdf')
@section('content')

<table>
    <tr>
        <th>CODIGO PABELLÓN</th>
        <th>NOMBRE PABELLÓN</th>
        <th>TIPO SERVICIO</th>
        <th>BODEGA</th>
        <th>SEDE</th>
        <th>FACTURA POS</th>
        <th>VIGENCIA</th>
        <th>SEPARADOR1</th>
        <th>NÚMERO CAMA</th>
        <th>DISPONIBILIDAD</th>
        <th>FECHA INGRESO</th>
        <th>IDENTIFICACIÓN PACIENTE</th>
        <th>TIPO IDENTIFICACIÓN</th>
        <th>NOMBRE 1</th>
        <th>NOMBRE 2</th>
        <th>APELLIDO 1</th>
        <th>APELLIDO 2</th>
        <th>FECHA NACIMIENTO</th>
        <th>SEXO</th>
        <th>CONSECUTIVO DE INGRESO</th>
        <th>DX</th>
        <th>NOMBRE DX</th>
        <th>CAMA ACTIVA</th>
        <th>SEPARADOR2</th>
        <th>COD CONTRATO</th>
        <th>NOMBRE CONTRATO</th>
    </tr>
    @foreach($info as $row)
    <tr>
        <th>{{$row->MPCodP}}</th>
        <th>{{$row->MPNomP}}</th>
        <th>{{$row->MPCLAPRO}}</th>
        <th>{{$row->MPbodega}}</th>
        <th>{{$row->MPMCDpto}}</th>
        <th>{{$row->MPInFaPOS}}</th>
        <th>{{$row->MPVigPres}}</th>
        <th>{{$row->SEPARADOR1}}</th>
        <th>{{$row->MPNumC}}</th>
        <th>{{$row->MPDisp}}</th>
        <th>{{$row->MPFchI}}</th>
        <th>{{$row->MPUced}}</th>
        <th>{{$row->MPUDoc}}</th>
        <th>{{$row->MPNom1}}</th>
        <th>{{$row->MPNom2}}</th>
        <th>{{$row->MPApe1}}</th>
        <th>{{$row->MPApe2}}</th>
        <th>{{$row->MPFchN}}</th>
        <th>{{$row->MPSexo}}</th>
        <th>{{$row->MPCtvIn}}</th>
        <th>{{$row->MPUdx}}</th>
        <th>{{$row->DMNomb}}</th>
        <th>{{$row->MPActCam}}</th>
        <th>{{$row->SEPARADOR2}}</th>
        <th>{{$row->IngNit}}</th>
        <th>{{$row->MENOMB}}</th>
    </tr>
    @endforeach
</table>

@stop