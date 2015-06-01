@extends('eusalud_pdf')
@section('content')
<style>
    #head {
        line-height: 1;
    }
    
    #tr_top {border-bottom: 1px solid black}
    
    .total { font-weight: bold; font-size: 1.2em }
    th { padding: 10px }
</style>
    <div class="container-fluid">
        <div class="row-fluid">
            <table>
                <tr>
                    <th colspan="5">{{ $headerTitle }}</th>
                </tr>
                <tr id="tr_top">
                    <td colspan="3"><img src="{{ asset('img/logo_colores.png') }}" width="300"></td>
                    <td colspan="2" style="text-align: center" id="head">
                        <p><b>EUSALUD S.A</b> <br>
                            NIT  800227072-8 <br>
                        CARRERA 9. N0. 66-10</p>
                    </td>
                </tr>
                
                
                <tr>
                    <td colspan="2">CONTRIBUYENTE: </td>
                    <td>{{ $info[0]->TrcRazSoc }}</td>
                    <td>NIT: </td>
                    <td>{{ $info[0]->TrcCod }}</td>
                <tr>
                <tr>
                    <th>CONCEPTO</th>
                    <th>NOMBRE CONCEPTO</th>
                    <th>NATURALEZA</th>
                    <th>VALOR RETENIDO</th>
                    <th>VALOR BASE</th>  
                </tr>
                
                @foreach($info as $row)
                <tr>
                    <td>{{ $row->CntCod }}</td>             <!-- Concepto -->
                    <td>{{ $row->CntDsc }}</td>             <!-- Nombre del Concepto -->
                    <td>{{ $row->MvCNat }}</td>
                    <td>{{ '$' . number_format($row->SumaDeMvCVlr) }}</td>             <!-- Valor Retenido -->
                    <td>{{ '$' . number_format($row->SumaDeMvCBse) }}</td>             <!-- Valor Base -->
                </tr>
                @endforeach
                <tr>
                    <td colspan="3" style="text-align:right; font-weight: bold">TOTALES</td>
                    <td><p class="total">{{ '$' . number_format($valor_base[0]->VALOR) }}</p></td>
                    <td><p class="total">{{ '$' . number_format($valor_base[0]->BASE) }}</p></td>
                </tr>
            </table>
        </div>
<!--        <hr>-->
        <div class="row-fluid">
            <h3>VALOR RETENIDO EN LETRAS</h3>
            <p>{{ $valor_en_letras }}</p>
            <br>
            <h3>CIUDAD DONDE SE CONSIGNO LA RETENCIÓN: Bogotá D.C</h3>
        </div>

    </div>
<hr>
    <div class="footer">
        <p>Informe generado el día {{ date('Y-m-d h:i:s A') }} para el periodo comprendido entre {{ $input['fecha_inicio'] }} y {{ $input['fecha_final'] }}.</p>
    </div>
    
<script>
    $().ready(function(){
        alert("Para imprimir presione Ctrl + p");
    });
</script>
    
    

@stop
