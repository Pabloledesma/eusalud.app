@extends('eusalud_pdf')
@section('content')
<div class="container container-fluid">
    <h1 style="text-align: center">{{ $headerTitle }}</h1>
    <hr/>

    <table class="tercero">
        <tr>
            <th>Tercero</th>
            <th>Nombre del Tercero</th>

        </tr>
        <tr>
            <td>{{ $info[0]->TrcCod }}</td>
            <td>{{ $info[0]->TrcRazSoc }}</td>
        </tr>

    </table>

    <hr>
    <table class="principal">
        <tr>
            <th>Documento Contable</th>
            <th>Numero de documento contable</th>      
            <th>Fecha</th>
            <th>Naturaleza</th>
            <th>Tipo de Cuenta</th>
            <th>Cuenta</th>
            <th>Nombre de cuenta</th>
            <th>Valor</th>
            <th>Referencia 1</th>
            <th>Referencia 2</th>
            <th>Detalle</th>
            <th>Base</th>
            <th>Impuesto</th>
        </tr> 
        @foreach($info as $row)
        <tr>
            <td>{{ $row->DOCCOD }}</td>    
            <td>{{ $row->MvCNro }}</td>
            <td>{{ $row->MvCFch }}</td>
            <td>{{ $row->MvCNat }}</td>
            <td>{{ $row->CntInt }}</td>
            <td>{{ $row->CntCod }}</td>
            <td>{{ $row->CntDsc }}</td>
            <td>{{ '$' . number_format( $row->MvCVlr ) }}</td>
            <td>{{ $row->MvCDocRf1 }}</td>
            <td>{{ $row->MvCDocRf2 }}</td>
            <td>{{ $row->MvCDet }}</td>
            <td>{{ '$' . number_format( $row->MvCBse ) }}</td>
            <td>{{ $row->MvCImpCod }}</td>
        </tr>
        @endforeach

    </table>
    <hr>
    <div class="footer">
        <p>Informe generado el día {{ date('Y-m-d h:i:s A') }} para el periodo comprendido entre {{ $input['fecha_inicio'] }} y {{ $input['fecha_final'] }}.</p>
    </div>
</div>
@stop
