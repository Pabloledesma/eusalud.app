<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
//use Barryvdh\DomPDF\PDF;
use DB;
use Maatwebsite\Excel\Excel;
use Psy\Util\String;
use Vsmoraes\Pdf\Pdf;
use function view;

class InfoController extends Controller {

    private $pdf;
    private $excel; 

    public function __construct(Pdf $pdf, Excel $excel) {
        $this->middleware('auth');
        $this->pdf = $pdf;
        $this->excel = $excel;
    }
    /**
    * Muestra una lista con los formularios disponibles
    ***/
    public function index() {
        return view('info.index');
    }

    /*
     * Muestra el formulario para generar el Certificado de pagos a profesionales de la salud
     * La variable $formato indica si esta disponible esta funcionalidad
     */
    public function form_certificado_pagos_profesionales() {
        $formato_de_salida = true; // Esta variable sera false mientras no esten disponibles los formatos pdf y excel
        $formato = array( 'pdf' => true, 'excel' => true );
        return view('info.certificado_pagos', compact('formato', 'formato_de_salida'));
    }
    
     /**
    * Muestra el formulario para generar el informe de certificado ica
    ***/ 
    public function form_certificado_ica()
    {
        $formato_de_salida = false; // Esta variable sera false mientras no esten disponibles los formatos pdf y excel
        $formato = array( 'pdf' => false, 'excel' => false );
        return view('info.certificado_ica', compact('formato', 'formato_de_salida'));
    }


    /**
    * Muestra el formulario para generar el informe de Pago a proveedores
    * La variable $formato indica si esta disponible esta funcionalidad
    ***/
    public function form_pago_proveedores() {
        $formato_de_salida = true; // Esta variable sera false mientras no esten disponibles los formatos pdf y excel
        $formato = array( 'pdf' => true, 'excel' => false ); 
        return view('info.pago_proveedores', compact('formato', 'formato_de_salida'));
    }

    /**
    * Muestra el formulario para generar el informe de Pago a proveedores en excel
    ***/
    public function form_certificado_pagos_profesionales_excel()
    {
        return view('info.certificado_pagos_excel');
    }

    public function pago_proveedores(Requests\Certificado_de_pagos $request) {
        $input = $request->all();
        if (isset($input['num_id'])) {
            $num_id = $input['num_id'];
        } else {
            $num_id = \Auth::user()->num_id;
        }
        $headerTitle = 'Informe de pago a proveedores';
        $query = "SELECT 
            dbo.MOVCONT3.DOCCOD, 
            dbo.MOVCONT3.MvCNro,            
            dbo.MOVCONT3.MvCFch, 
            dbo.MOVCONT2.MvCNat, 
            dbo.CUENTAS.CntInt, 
            dbo.MOVCONT2.CntCod, 
            dbo.CUENTAS.CntDsc, 
            dbo.MOVCONT2.TrcCod, 
            dbo.TERCEROS.TrcRazSoc, 
            dbo.MOVCONT2.MvCVlr, 
            dbo.MOVCONT2.MvCDocRf1, 
            dbo.MOVCONT2.MvCDocRf2, 
            dbo.MOVCONT2.MvCDet, 
            dbo.MOVCONT2.MvCBse, 
            dbo.MOVCONT2.MvCImpCod
        FROM 
            ((dbo.MOVCONT3 INNER JOIN dbo.MOVCONT2 ON 
            (dbo.MOVCONT3.MCDpto = dbo.MOVCONT2.MCDpto) AND 
            (dbo.MOVCONT3.MvCNro = dbo.MOVCONT2.MvCNro) AND 
            (dbo.MOVCONT3.DOCCOD = dbo.MOVCONT2.DOCCOD) AND 
            (dbo.MOVCONT3.EMPCOD = dbo.MOVCONT2.EMPCOD)) 
            LEFT JOIN dbo.CUENTAS ON (dbo.MOVCONT2.CntCod = dbo.CUENTAS.CntCod) AND 
            (dbo.MOVCONT2.CntVig = dbo.CUENTAS.CntVig)) 
            LEFT JOIN dbo.TERCEROS ON dbo.MOVCONT2.TrcCod = dbo.TERCEROS.TrcCod
        WHERE (((dbo.MOVCONT3.MvCFch) Between convert(datetime, '" . $input['fecha_inicio'] . "' ,101) And 
        convert(datetime,'" . $input['fecha_final'] . "', 101)) AND ((dbo.MOVCONT3.MvCEst)<>'N') AND 
        ((dbo.MOVCONT2.TrcCod)= '" . $num_id . "')) ORDER BY dbo.MOVCONT3.MvCFch";

        $info = DB::connection('sqlsrv_info')->select($query);



        if (isset($info) && count($info) > 0) {
            $html = view('info.informe', compact('info', 'input', 'headerTitle'))->render();
            return $this->pdf->load($html, array(0, 0, 1300, 800))
                            ->filename('informe_de_pago_a_proveedores_' . date('Y-m-d H:i:s') . '.pdf')
                            ->download();
        }
        return view('info.sin_resultados', compact('input'));
    }

    /**
    * Genera el certificado de pagos a profesionales de la salud segun los parametros establecidos en el formulario
    * @return xls || pdf
    ***/
    public function certificado_pagos_profesionales(Requests\Certificado_de_pagos $request) {
        $input = $request->all();
        if (isset($input['num_id'])) {
            $num_id = $input['num_id'];
        } else {
            $num_id = \Auth::user()->num_id;
        }
        $headerTitle = 'Certificado de pagos a profesionales de la salud';
        $fileTitle = 'certificado_de_pagos_profesionales_';
        $query = "SELECT 
            dbo.MOVCONT3.DOCCOD, 
            dbo.MOVCONT3.MvCNro,            
            dbo.MOVCONT3.MvCFch, 
            dbo.MOVCONT2.MvCNat, 
            dbo.CUENTAS.CntInt, 
            dbo.MOVCONT2.CntCod, 
            dbo.CUENTAS.CntDsc, 
            dbo.MOVCONT2.TrcCod, 
            dbo.TERCEROS.TrcRazSoc, 
            dbo.MOVCONT2.MvCVlr, 
            dbo.MOVCONT2.MvCDocRf1, 
            dbo.MOVCONT2.MvCDocRf2, 
            dbo.MOVCONT2.MvCDet, 
            dbo.MOVCONT2.MvCBse, 
            dbo.MOVCONT2.MvCImpCod
        FROM 
            ((dbo.MOVCONT3 INNER JOIN dbo.MOVCONT2 ON 
            (dbo.MOVCONT3.MCDpto = dbo.MOVCONT2.MCDpto) AND 
            (dbo.MOVCONT3.MvCNro = dbo.MOVCONT2.MvCNro) AND 
            (dbo.MOVCONT3.DOCCOD = dbo.MOVCONT2.DOCCOD) AND 
            (dbo.MOVCONT3.EMPCOD = dbo.MOVCONT2.EMPCOD)) 
            LEFT JOIN dbo.CUENTAS ON (dbo.MOVCONT2.CntCod = dbo.CUENTAS.CntCod) AND 
            (dbo.MOVCONT2.CntVig = dbo.CUENTAS.CntVig)) 
            LEFT JOIN dbo.TERCEROS ON dbo.MOVCONT2.TrcCod = dbo.TERCEROS.TrcCod
        WHERE (((dbo.MOVCONT3.MvCFch) Between convert(datetime, '" . $input['fecha_inicio'] . "' ,101) And 
        convert(datetime,'" . $input['fecha_final'] . "', 101)) AND ((dbo.MOVCONT3.MvCEst)<>'N') AND 
        ((dbo.MOVCONT2.TrcCod)= '" . $num_id . "')) AND dbo.MOVCONT2.CntCod NOT LIKE '6%' ORDER BY dbo.MOVCONT3.MvCFch";

        $info = DB::connection('sqlsrv_info')->select($query);

        //Seleccion de formato

        if( $input['formato'] == 'pdf' ){

            if (isset($info) && count($info) > 0) {
            $html = view('info.informe', compact('info', 'input', 'headerTitle'))->render();
            return $this->pdf->load($html, array(0, 0, 1300, 800))
                            ->filename($fileTitle . date('Y-m-d H:i:s') . '.pdf')
                            ->download();
            }
        } else {

            $this->excel->create('Certificado de pagos a profesionales de la salud', function($excel) use($info, $input, $headerTitle) {
            $excel->sheet('Sheetname', function($sheet) use($info, $input, $headerTitle) {
                 
                /*

                Con esta opción renderiza el archivo de excel directamente desde el html
                
                $sheet->loadview('info.informe', compact('info', 'headerTitle', 'input'));
                $sheet->setFontFamily('Comic Sans MS');
                $sheet->setStyle(array(
                    'font' => array(
                        'name'      =>  'Calibri',
                        'size'      =>  12,
                        'bold'      =>  true
                    )
                ));
                */
                $sheet->mergeCells('A1:M1');
                $sheet->mergeCells('A2:M2');
                $sheet->setAutoSize(true);
                $data = [];

                /*** Cabecera ***/
                
                array_push($data, array('Clínica EuSalud'));
                array_push($data, array('Certificado de pagos a profesionales de la salud'));
                array_push($data, array('Tercero', 'Nombre del Tercero'));
                array_push($data, array( $info[0]->TrcCod, $info[0]->TrcRazSoc));
                array_push($data, array(
                    'Documento Contable',
                    'Numero de documento contable',
                    'Fecha',
                    'Naturaleza',
                    'Tipo de Cuenta',
                    'Cuenta',
                    'Nombre de cuenta',
                    'Valor',
                    'Referencia 1',
                    'Referencia 2',
                    'Detalle',
                    'Base',
                    'Impuesto',
                ));
                
                /*** Información ***/
                          
                    foreach( $info as $row ){
                        array_push($data, array(
                            $row->DOCCOD,
                            $row->MvCNro,
                            $row->MvCFch,
                            $row->MvCNat,
                            $row->CntInt,
                            $row->CntCod,
                            $row->CntDsc,
                            '$' . number_format( $row->MvCVlr ),
                            $row->MvCDocRf1,
                            $row->MvCDocRf2,
                            $row->MvCDet,
                            '$' . number_format( $row->MvCBse ),
                            $row->MvCImpCod,
                        ));
                    }
                               
                $sheet->fromArray($data, null, 'A1', false, false);
                
                /*** ESTILOS ***/
                
                $sheet->cells('A1:M1', function($cells) {

                    $cells->setFontColor('#ffffff');
                    $cells->setFontFamily('Calibri');
                    $cells->setFontSize(16);
                    $cells->setFontWeight('bold');
                    $cells->setAlignment('center');
                    $cells->setValignment('middle');
                    $cells->setBackground('#1E7F74');
                });
                $sheet->cells('A2:M2', function($cells) {

                    $cells->setFontColor('#ffffff');
                    $cells->setFontFamily('Calibri');
                    $cells->setFontSize(12);
                    $cells->setFontWeight('bold');
                    $cells->setAlignment('center');
                    $cells->setValignment('middle');
                    $cells->setBackground('#1E7F74');
                });

                $sheet->cells('A3:M3', function($cells) {
                    $cells->setFontColor('#000000');
                    $cells->setFontFamily('Calibri');
                    $cells->setFontSize(10);
                    $cells->setFontWeight('bold');
                    $cells->setAlignment('center');
                    $cells->setValignment('middle');
                    $cells->setBackground('#FFFFFF');
                  });
                });
            })->download('xlsx');

        } // fin de condicional de seleccion de formato

        
        return view('info.sin_resultados', compact('input', 'headerTitle'));
    }
    
   
    /**
    * Muestra el informe de certificado ica
    ***/ 
    public function certificado_ica(Requests\Certificado_de_pagos $request)
    {
        $input = $request->all();
        if (isset($input['num_id'])) {
            $num_id = $input['num_id'];
        } else {
            $num_id = \Auth::user()->num_id;
        }

        $headerTitle = "CERTIFICADO DE RETENCION INDUSTRIA Y COMERCIO (ICA)";
        $fileTitle = "certificado_de_retencion_industria_y_comercio_ica";

        $query3 = "SELECT 
            dbo.MOVCONT3.MvCFch, 
            dbo.MOVCONT3.MvCEst, 
            '====' AS Expr1, 
            dbo.MOVCONT2.CntCod, 
            dbo.CUENTAS.CntDsc, 
            dbo.MOVCONT2.TrcCod, 
            dbo.TERCEROS.TrcRazSoc, 
            dbo.MOVCONT2.MvCVlr, 
            dbo.MOVCONT2.MvCDocRf1, 
            dbo.MOVCONT2.MvCDocRf2, 
            dbo.MOVCONT2.MvCNat, 
            dbo.MOVCONT2.MvCDet, 
            dbo.MOVCONT2.MvCBse, 
            dbo.MOVCONT2.MvCImpCod, 
            dbo.MOVCONT2.MvCCFch, 
            dbo.MOVCONT2.MvCMes, 
            dbo.MOVCONT2.MvCAnio, 
            dbo.MOVCONT2.MvCSedOrg
            FROM ((dbo.MOVCONT3 INNER JOIN dbo.MOVCONT2 ON (dbo.MOVCONT3.EMPCOD = dbo.MOVCONT2.EMPCOD) AND 
                (dbo.MOVCONT3.DOCCOD = dbo.MOVCONT2.DOCCOD) AND (dbo.MOVCONT3.MvCNro = dbo.MOVCONT2.MvCNro) AND 
                (dbo.MOVCONT3.MCDpto = dbo.MOVCONT2.MCDpto)) 
                LEFT JOIN dbo.CUENTAS ON (dbo.MOVCONT2.CntVig = dbo.CUENTAS.CntVig) AND 
                (dbo.MOVCONT2.CntCod = dbo.CUENTAS.CntCod)) LEFT JOIN dbo.TERCEROS ON dbo.MOVCONT2.TrcCod = dbo.TERCEROS.TrcCod
            WHERE (((dbo.MOVCONT3.MvCFch) Between convert(datetime, '" . $input['fecha_inicio'] . "' ,101) And 
                    convert(datetime,'" . $input['fecha_final'] . "', 101)) AND ((dbo.MOVCONT3.MvCEst)<>'N') AND 
                    ((dbo.MOVCONT2.CntCod) Like '2368%') AND ((dbo.MOVCONT2.TrcCod)='".$num_id."'))";
        
        $query2 = "SELECT 
	dbo.MOVCONT2.CntCod, 
	dbo.CUENTAS.CntDsc, 
	dbo.MOVCONT2.TrcCod, 
	dbo.TERCEROS.TrcRazSoc, 
	dbo.MOVCONT2.MvCNat, 
	Sum(dbo.MOVCONT2.MvCVlr) AS SumaDeMvCVlr, 
	Sum(dbo.MOVCONT2.MvCBse) AS SumaDeMvCBse
FROM ((dbo.MOVCONT3 INNER JOIN dbo.MOVCONT2 ON (dbo.MOVCONT3.MCDpto = dbo.MOVCONT2.MCDpto) AND 
	(dbo.MOVCONT3.MvCNro = dbo.MOVCONT2.MvCNro) AND (dbo.MOVCONT3.DOCCOD = dbo.MOVCONT2.DOCCOD) AND 
	(dbo.MOVCONT3.EMPCOD = dbo.MOVCONT2.EMPCOD)) LEFT JOIN dbo.CUENTAS ON (dbo.MOVCONT2.CntCod = dbo.CUENTAS.CntCod) AND 
	(dbo.MOVCONT2.CntVig = dbo.CUENTAS.CntVig)) LEFT JOIN dbo.TERCEROS ON dbo.MOVCONT2.TrcCod = dbo.TERCEROS.TrcCod
WHERE (((dbo.MOVCONT3.MvCFch) Between convert(datetime, '". $input['fecha_inicio'] ."' ,101) And convert(datetime,'" . $input['fecha_final'] . "', 101)) AND ((dbo.MOVCONT3.MvCEst)<>'N')
		and ((dbo.MOVCONT2.CntCod) Like '2368%') AND ((dbo.MOVCONT2.TrcCod)='".$num_id."'))
		GROUP BY dbo.MOVCONT2.CntCod, dbo.MOVCONT2.MvCNat, dbo.CUENTAS.CntDsc, dbo.MOVCONT2.TrcCod, dbo.TERCEROS.TrcRazSoc
		ORDER BY dbo.MOVCONT2.CntCod DESC";

        $query = "SELECT 
                Sum( CASE WHEN mvcnat='D' THEN -1*(MvCVlr) ELSE MvCVlr END ) AS VALOR, 
                Sum( CASE WHEN mvcnat='D' THEN -1*(MvCbse) ELSE MvCbse END ) AS BASE
            FROM ((dbo.MOVCONT3 INNER JOIN dbo.MOVCONT2 ON (dbo.MOVCONT3.MCDpto = dbo.MOVCONT2.MCDpto) AND 
                (dbo.MOVCONT3.MvCNro = dbo.MOVCONT2.MvCNro) AND 
                (dbo.MOVCONT3.DOCCOD = dbo.MOVCONT2.DOCCOD) AND 
                (dbo.MOVCONT3.EMPCOD = dbo.MOVCONT2.EMPCOD)) LEFT JOIN dbo.CUENTAS ON 
                (dbo.MOVCONT2.CntCod = dbo.CUENTAS.CntCod) AND 
                (dbo.MOVCONT2.CntVig = dbo.CUENTAS.CntVig)) 
                LEFT JOIN dbo.TERCEROS ON dbo.MOVCONT2.TrcCod = dbo.TERCEROS.TrcCod
            WHERE (((dbo.MOVCONT3.MvCFch) Between convert(datetime, '" . $input['fecha_inicio'] . "' ,101) And 
                convert(datetime,'" . $input['fecha_final'] . "', 101)) AND ((dbo.MOVCONT3.MvCEst)<>'N') AND 
                ((dbo.MOVCONT2.CntCod) Like '2368%') AND ((dbo.MOVCONT2.TrcCod)='".$num_id."'))";

        $info = DB::connection('sqlsrv_info')->select($query2);
        $valor_base = DB::connection('sqlsrv_info')->select($query);
        //return $valor_base;
        if (isset($info, $valor_base) && count($info) > 0 && count($valor_base) > 0) {
            $valor_en_letras = $this->numerotexto( $valor_base[0]->VALOR );

//            PDF
//            $html = view('info.informe_ica_pdf', compact('info', 'input', 'headerTitle', 'valor_base', 'valor_en_letras'))->render();
//            return $this->pdf->load($html)
//                            ->filename($fileTitle . date('Y-m-d H:i:s') . '.pdf')
//                            
//                            ->download();
            
            //HTML
            return view('info.informe_ica_pdf', compact('info', 'input', 'headerTitle', 'valor_base', 'valor_en_letras'));
            
            
            //EXCEL
//            $this->excel->create('informe_ica', function($excel) use($info, $input, $headerTitle, $valor_base, $valor_en_letras) {
//                $excel->sheet('Sheetname', function($sheet) use($info, $input, $headerTitle, $valor_base, $valor_en_letras) {
//                    $sheet->mergeCells('A1:K1');
//                    $sheet->mergeCells('A2:K2');
//                    $sheet->mergeCells('A3:K3');
//                    $data = [];
//
//                    /*** Cabecera ***/
//
//                    array_push($data, array('Clínica EuSalud'));
//                    array_push($data, array('Certificado de pagos a profesionales de la salud'));
//                    array_push($data, array('Tercero', 'Nombre del Tercero'));
//                    array_push($data, array( $info[0]->TrcCod, $info[0]->TrcRazSoc));
//                });
//            })->download('xlsx');
        }
 
        return view('info.sin_resultados', compact('headerTitle'));
    }
        

    /**
    * Convierte un valor numérico a letras
    * @param $numero decimal que se quiere convertir
    * @return String
    **/
   function numerotexto ($numero) { 
    // Primero tomamos el numero y le quitamos los caracteres especiales y extras 
    // Dejando solamente el punto "." que separa los decimales 
    // Si encuentra mas de un punto, devuelve error. 
    // NOTA: Para los paises en que el punto y la coma se usan de forma 
    // inversa, solo hay que cambiar la coma por punto en el array de "extras" 
    // y el punto por coma en el explode de $partes 
     
    $extras= array("/[\$]/","/ /","/,/","/-/"); 
    $limpio=preg_replace($extras,"",$numero); 
    $partes=explode(".",$limpio); 
    if (count($partes)>2) { 
        return "Error, el n&uacute;mero no es correcto"; 
        exit(); 
    } 
     
    // Ahora explotamos la parte del numero en elementos de un array que 
    // llamaremos $digitos, y contamos los grupos de tres digitos 
    // resultantes 
     
    $digitos_piezas=chunk_split ($partes[0],1,"#"); 
    $digitos_piezas=substr($digitos_piezas,0,strlen($digitos_piezas)-1); 
    $digitos=explode("#",$digitos_piezas); 
    $todos=count($digitos); 
    $grupos=ceil (count($digitos)/3); 
     
    // comenzamos a dar formato a cada grupo 
     
    $unidad = array   ('un','dos','tres','cuatro','cinco','seis','siete','ocho','nueve'); 
    $decenas = array ('diez','once','doce', 'trece','catorce','quince'); 
    $decena = array   ('dieci','veinti','treinta','cuarenta','cincuenta','sesenta','setenta','ochenta','noventa'); 
    $centena = array   ('ciento','doscientos','trescientos','cuatrocientos','quinientos','seiscientos','setecientos','ochocientos','novecientos'); 
    $resto=$todos; 
     
    for ($i=1; $i<=$grupos; $i++) { 
         
        // Hacemos el grupo 
        if ($resto>=3) { 
            $corte=3; } else { 
            $corte=$resto; 
        } 
            $offset=(($i*3)-3)+$corte; 
            $offset=$offset*(-1); 
         
        // la siguiente seccion es una adaptacion de la contribucion de cofyman y JavierB 
         
        $num=implode("",array_slice ($digitos,$offset,$corte)); 
        $resultado[$i] = ""; 
        $cen = (int) ($num / 100);              //Cifra de las centenas 
        $doble = $num - ($cen*100);             //Cifras de las decenas y unidades 
        $dec = (int)($num / 10) - ($cen*10);    //Cifra de las decenas 
        $uni = $num - ($dec*10) - ($cen*100);   //Cifra de las unidades 
        if ($cen > 0) { 
           if ($num == 100) $resultado[$i] = "cien"; 
           else $resultado[$i] = $centena[$cen-1].' '; 
        }//end if 
        if ($doble>0) { 
           if ($doble == 20) { 
              $resultado[$i] .= " veinte"; 
           }elseif (($doble < 16) and ($doble>9)) { 
              $resultado[$i] .= $decenas[$doble-10]; 
           }else { 
              @$resultado[$i] .=' '. $decena[$dec-1]; 
           }//end if 
           if ($dec>2 and $uni<>0) $resultado[$i] .=' y '; 
           if (($uni>0) and ($doble>15) or ($dec==0)) { 
              if ($i==1 && $uni == 1) $resultado[$i].="uno"; 
              elseif ($i==2 && $num == 1) $resultado[$i].=""; 
              else $resultado[$i].=$unidad[$uni-1]; 
           } 
        } 

        // Le agregamos la terminacion del grupo 
        switch ($i) { 
            case 2: 
            $resultado[$i].= ($resultado[$i]=="") ? "" : " mil "; 
            break; 
            case 3: 
            $resultado[$i].= ($num==1) ? " mill&oacute;n " : " millones "; 
            break; 
        } 
        $resto-=$corte; 
    } 
     
    // Sacamos el resultado (primero invertimos el array) 
    $resultado_inv= array_reverse($resultado, TRUE); 
    $final=""; 
    foreach ($resultado_inv as $parte){ 
        $final.=$parte; 
    } 
    return $final; 
    }
    
    /**
     * Genera el reporte del censo en formato xlsx
     */
    public function censo()
    {
        $query = "SELECT MAEPAB.MPCodP, MAEPAB.MPNomP, MAEPAB.MPCLAPRO, MAEPAB.MPbodega, MAEPAB.MPMCDpto, MAEPAB.MPInFaPOS, MAEPAB.MPVigPres, '<<' AS SEPARADOR1, MAEPAB1.MPNumC, MAEPAB1.MPDisp, MAEPAB1.MPFchI, MAEPAB1.MPUced, MAEPAB1.MPUDoc, CAPBAS.MPNom1, CAPBAS.MPNom2, CAPBAS.MPApe1, CAPBAS.MPApe2, CAPBAS.MPFchN, CAPBAS.MPSexo, MAEPAB1.MPCtvIn, MAEPAB1.MPUdx, MAEDIA.DMNomb, MAEPAB1.MPActCam, '>>' AS SEPARADOR2, INGRESOS.IngNit, MAEEMP.MENOMB
FROM ((((MAEPAB INNER JOIN MAEPAB1 ON MAEPAB.MPCodP = MAEPAB1.MPCodP) LEFT JOIN CAPBAS ON (MAEPAB1.MPUDoc = CAPBAS.MPTDoc) AND (MAEPAB1.MPUced = CAPBAS.MPCedu)) LEFT JOIN MAEDIA ON MAEPAB1.MPUdx = MAEDIA.DMCodi) LEFT JOIN INGRESOS ON (MAEPAB1.MPCtvIn = INGRESOS.IngCsc) AND (MAEPAB1.MPUDoc = INGRESOS.MPTDoc) AND (MAEPAB1.MPUced = INGRESOS.MPCedu)) LEFT JOIN MAEEMP ON INGRESOS.IngNit = MAEEMP.MENNIT
WHERE (((MAEPAB1.MPActCam)='N'))
ORDER BY MAEPAB.MPCodP, MAEPAB1.MPNumC";
        $info = DB::connection('sqlsrv_censo')->select($query);
        if( isset($info) && count($info) > 0 ){
            $this->excel->create('censo' . date('Y-m-d_h:i:s_A'), function($excel) use($info) {
                $excel->sheet('Sheetname', function($sheet) use($info) {
                    $sheet->loadview('info.censo', compact('info'));
                    $sheet->setFontFamily('Comic Sans MS');
                    $sheet->setStyle(array(
                        'font' => array(
                            'name'      =>  'Calibri',
                            'size'      =>  12,
                            'bold'      =>  true
                        )
                    ));
                });
            })->download('xlsx');

        } else {
            return "no se encontraron resultados";
        }
    }
}
